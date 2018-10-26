<?php
/**
 * Class GridData
 * @project   <Grid Data Providing for PHP language>
 * @package   App\lib\grid
 * @author    ArGabid <argabid@gmail.com>
 * @copyright 2018-2019, ArGabid, License MIT, All rights reserved
 */

namespace App\lib\grid
{
    use PDO;

    class GridData implements IGridData
    {
        /*
         * PDO instance
         * */
        protected $pdo = null;

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

        public function fetchFields(): array
        {
            $types = [];

            $sizes = [];

            $prompts = [];

            if ($data = $this->getPdo()->query('DESCRIBE ' . $this->getTable())->fetchAll(PDO::FETCH_ASSOC))
            {
                foreach ($data as $field)
                {
                    preg_match('|^([a-z]+)((\()([\d]+)(\)))?$|', $field['Type'], $match);

                    $type = $match[1] === 'text' ? 'textarea' : $match[1];

                    $name = $field['Field'];

                    $size = $match[4] ?? null;

                    $prompt = $field['Default'];

                    $types[$name] = $type;

                    $sizes[$name] = $size;

                    $prompts[$name] = $prompt;
                }
            }

            return [
                'types'   => $types,
                'sizes'   => $sizes,
                'prompts' => $prompts,
            ];
        }

        public function fetchCount(): int
        {
            return $this->getPdo()->query('SELECT COUNT(*) FROM (' . $this->getQuery() . ') AS count')->fetchColumn();
        }

        public function fetchItems(): array
        {
            // TODO

            return [];
        }
    }
}
