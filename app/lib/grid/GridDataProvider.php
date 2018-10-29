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
         * Data Object
         * */
        protected $entity = null;

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

        private function checkData(string $key)
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

        public function fetchFields(IGridData $data)
        {
            $fields = $data->fetchFields();

            //TODO

            return $this;
        }

        public function fetchCount(IGridData $data)
        {
            $this->count = $data->fetchCount();

            return $this;
        }

        public function fetchItems(IGridData $data)
        {
            $this->data['items'] = $data->fetchItems();

            return $this;
        }

        public function getItems()
        {
            return $this->data['items'];
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
    }
}
