<?php
/**
 * Class GridDataProvider
 * @project   <Grid Data Providing for PHP language>
 * @package   App\lib\grid
 * @author    ArGabid <argabid@gmail.com>
 * @copyright 2018-2019, ArGabid, License MIT, All rights reserved
 */

namespace App\lib\grid
{
    use PDO;

    class GridDataProvider implements IGridFormProvider, IGridTableProvider
    {
        /*
         * The fetching data
         * */
        private $data = [
            'items'            => null,
            'fields'           => [],
            'safeFields'       => [],
            'inputTypes'       => [],
            'inputSizes'       => [],
            'inputOptions'     => [],
            'inputPrompts'     => [],
            'inputErrors'      => [],
            'tableCellPrompts' => [],
        ];

        /*
         * PDO instance
         * */
        protected $pdo = null;

        /*
         * Data Object
         * */
        protected $entity = null;

        /*
         * The Entity's Database Table name
         * */
        protected $table = null;

        /*
         * The database Raw SQL query string for fetching entity's items from database table
         *
         * Example: 'SELECT * FROM `users`'
         * */
        protected $query = null;

        /*
         * The Total Number of Items fetched by PDO data object
         * */
        protected $count = null;

        /*
         * The Current Page
         * */
        protected $page = null;

        /*
         * Config Data
         *
         * Example: ['sort' => [
         *    'field_name_1' => SORT_ASC,
         *    'field_name_2' => SORT_DESC,
         * ]]
         * */
        protected $config = [
            'limit'     => 25, // The Number of items per page
            'pageCount' => 10, // The Number of pages at pagination
            'sort'      => []  // The sorting order of data table columns
        ];

        /**
         * GridDataProvider constructor.
         *
         * @param object|null $entity
         * @param array $data
         * @param array $config
         */
        public function __construct($entity = null, array $data = [], array $config = [])
        {
            $this->setEntity($entity);

            $this->setData($data);

            $this->setConfig($config);
        }

        /**
         * @param object|null $entity
         *
         * @return $this
         */
        protected function setEntity($entity)
        {
            if ($entity !== null && false == get_class($entity))

                throw new \logicException('The given entity is not a valid class instance.');

            $this->entity = $entity;

            return $this;
        }

        /**
         * @return object
         */
        public function getEntity()
        {
            return $this->entity;
        }

        private function checkData($key)
        {
            if (false == array_key_exists($key, $this->data))

                throw new \logicException(sprintf('The data key `%s` is not found in GridDataProvider.', $key));
        }

        public function setData(array $data)
        {
            foreach ($data as $key => $value)
            {
                $this->checkData($key);

                $this->data[$key] = $value;
            }

            return $this;
        }

        public function setConfig(array $config)
        {
            $this->config = array_merge($this->config, $config);

            return $this;
        }

        public function getConfig()
        {
            return $this->config;
        }

        /**
         * @param PDO $pdo
         * @param array $conn : PDO connection options
         *
         * @return $this
         */
        public function setPdo(PDO $pdo = null, array $conn = [])
        {
            $this->pdo = $pdo ?? new PDO($conn['dsn'], $conn['user'] ?? null, $conn['pass'] ?? null, $conn['options'] ?? null);

            return $this;
        }

        /**
         * @return PDO
         */
        public function getPdo()
        {
            if (null === $this->pdo)

                throw new \logicException('The pdo property is not defined.');

            return $this->pdo;
        }

        /**
         * @param string $table
         *
         * @return $this
         */
        public function setTable(string $table)
        {
            $this->table = $table;

            return $this;
        }

        /**
         * @return string
         */
        public function getTable()
        {
            if (null === $this->table)

                throw new \logicException('The table property is not defined.');

            return $this->table;
        }

        /**
         * @param string $query
         *
         * @return $this
         */
        public function setQuery(string $query)
        {
            $this->query = $query;

            return $this;
        }

        /**
         * @return string
         */
        public function getQuery()
        {
            return $this->query;
        }

        /**
         * @param int $count
         *
         * @return $this
         */
        public function setCount(int $count)
        {
            $this->count = $count;

            return $this;
        }

        /**
         * @return int
         */
        public function getCount()
        {
            return $this->count;
        }

        /**
         * @param int $page
         *
         * @return $this
         */
        public function setPage(int $page)
        {
            $this->page = $page;

            return $this;
        }

        /**
         * @return int
         */
        public function getPage()
        {
            return $this->page;
        }

        public function fetchData()
        {
            $this->fetchFields();

            if ($this->getQuery()) $this->fetchItems();
        }

        protected function setFieldName($key, $name)
        {
            $this->data['fields'][$key] = $name;
        }

        public function fetchFields()
        {
            if ($data = $this->getPdo()->query('DESCRIBE ' . $this->getTable())->fetchAll(PDO::FETCH_ASSOC))
            {
                $types = $this->gridInputTypes();

                $sizes = $this->gridInputSizes();

                $prompts = $this->gridInputPrompts();

                $cellPrompts = $this->gridTableCellPrompts();

                foreach ($data as $field)
                {
                    preg_match('|^([a-z]+)((\()([\d]+)(\)))?$|', $field['Type'], $match);

                    $type = $match[1] === 'text' ? 'textarea' : $match[1];

                    $name = $field['Field'];

                    $size = $match[4] ?? null;

                    $def = $field['Default'];

                    $types[$name] = $types[$name] ?? $type;

                    if (false == isset($this->gridFields()[$name]))

                        $this->setFieldName($name, $name);

                    if ($size && in_array($type, ['char', 'varchar', 'textarea', 'tinyint', 'smallint']))

                        $sizes[$name] = $sizes[$name] ?? $size;

                    if (null !== $def && false == in_array($type, ['timestamp', 'date', 'time', 'datetime', 'year']))
                    {
                        $prompts[$name] = $prompts[$name] ?? $def;

                        $cellPrompts[$name] = $cellPrompts[$name] ?? $def;
                    }
                }

                $this->setData([
                    'inputTypes'       => $types,
                    'inputSizes'       => $sizes,
                    'inputPrompts'     => $prompts,
                    'tableCellPrompts' => $cellPrompts,
                ]);
            }

            return $this;
        }

        public function fetchCount()
        {
            $this->count = $this->getPdo()->query('SELECT COUNT(*) FROM (' . $this->getQuery() . ') AS count')->fetchColumn();

            return $this;
        }

        public function fetchItems(IGridData $data)
        {
            // TODO

            return $this;
        }

        public function gridFields(): array
        {
            return $this->data['fields'];
        }

        public function gridSafeFields(): array
        {
            return $this->data['safeFields'];
        }

        public function gridInputTypes(): array
        {
            return $this->data['inputTypes'];
        }

        public function gridInputOptions(): array
        {
            return $this->data['inputOptions'];
        }

        public function gridInputSizes(): array
        {
            return $this->data['inputSizes'];
        }

        public function gridInputPrompts(): array
        {
            return $this->data['inputPrompts'];
        }

        public function gridInputErrors(): array
        {
            return $this->data['inputErrors'];
        }

        public function gridTableCellPrompts()
        {
            return $this->data['tableCellPrompts'];
        }

        public function getItems()
        {
            return $this->data['items'];
        }

    }
}
