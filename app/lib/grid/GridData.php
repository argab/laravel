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
    use Exception;

    class GridData implements IGridData
    {
        /*
         * Current data provider's prepared sql statements
         * */
        const SQL_STATEMENT = [
            'mysql' => [
                'describe' => 'SHOW FULL COLUMNS FROM `:table`'
            ],
            'pgsql' => [
                'describe' =>
                #language=txt
                    'SELECT 
                        cols.column_name as "Field", 
                        cols.data_type as "Type", 
                        cols.character_maximum_length as "Size", 
                        cols.is_nullable as "Null", 
                        cols.column_default as "Default", (
                            SELECT
                                pg_catalog.col_description(c.oid, cols.ordinal_position::int)
                            FROM pg_catalog.pg_class c
                            WHERE
                                c.oid     = (SELECT cols.table_name::regclass::oid) AND
                                c.relname = cols.table_name
                        ) as "Comment"
                    FROM INFORMATION_SCHEMA.COLUMNS cols WHERE cols.table_name = \':table\''
            ],
        ];

        /*
         * PDO instance
         * */
        protected $pdo;

        /*
         * PDO driver
         * */
        protected $driver;

        /*
         * The Database Table name
         * */
        protected $table;

        /*
         * The Database Table Column info, retrieved by PDO Statement;
         * Notice: You can specify the field name for the locale, storing them in JSON format on the column comments.
         *
         * Example: [
         *  'users' => [
         *      0 => [
         *         "Field" => "username",
         *         "Type" => "varchar(191)",
         *         "Collation" => "utf8mb4_unicode_ci",
         *         "Null" => "NO",
         *         "Key" => "",
         *         "Default" => null,
         *         "Extra" => "",
         *         "Privileges" => "select,insert,update,references",
         *         "Comment" => "{{"name": {"en": "First Name"}}}"
         *      ], ...
         *   ],...
         * ]
         * */
        protected $tableColumnData = [];

        /*
         * Application Locale
         * */
        protected $locale = 'en';

        /*
         * Indicates which database fields should be used to specify the grid input length attributes according to their type.
         * */
        protected $columnSizeByType = ['char', 'varchar', 'text', 'tinytext', 'longtext', 'mediumtext', 'tinyint', 'smallint'];

        /*
         * Indicates which database fields should be skipped to avoid retrieving their default values according to their type.
         * */
        protected $skipColumnDefaultByType = ['timestamp', 'date', 'time', 'datetime', 'year'];

        /**
         * @param PDO $pdo
         * @param array $conn : PDO connection options
         *
         * @return $this
         * @throws Exception
         */
        public function setPdo(PDO $pdo = null, array $conn = [])
        {
            if ($pdo !== null)

                $this->pdo = $pdo;

            elseif (isset($conn['dsn'], $conn['user'], $conn['pass']))

                $this->pdo = new PDO($conn['dsn'], $conn['user'], $conn['pass'], $conn['options'] ?? null);

            else throw new Exception('The PDO Statement is not defined.');

            $this->driver = $this->pdo->getAttribute(PDO::ATTR_DRIVER_NAME);

            return $this;
        }

        /**
         * @return string
         */
        public function getDriver()
        {
            return $this->driver;
        }

        /**
         * @param string $sqlKey
         *
         * @return string
         */
        protected function getSql(string $sqlKey)
        {
            return strtr(static::SQL_STATEMENT[$this->driver][$sqlKey], [':table' => $this->getTable()]);
        }

        /**
         * @return PDO
         * @throws Exception
         */
        public function getPdo()
        {
            if (null === $this->pdo)

                throw new Exception('The `pdo` property in data grid object is empty.');

            return $this->pdo;
        }

        /**
         * @param string $table
         *
         * @return $this
         */
        public function setTable(string $table)
        {
            $this->table = preg_replace('#[^a-z_\-\s\d\\\'\\"]+#i', '', $table);

            return $this;
        }

        /**
         * @return string
         * @throws Exception
         */
        public function getTable()
        {
            if (null === $this->table)

                throw new Exception('The `table` property in data grid object is empty.');

            return $this->table;
        }

        /**
         * @param array $data
         *
         * @return $this
         */
        public function setTableColumnData(array $data)
        {
            $this->tableColumnData = $data;

            return $this;
        }

        /**
         * @return array
         */
        protected function fetchTableColumnData()
        {
            if (false == isset($this->tableColumnData[$this->getTable()]))

                $this->tableColumnData[$this->getTable()] = $this->getPdo()->query($this->getSql('describe'))->fetchAll(PDO::FETCH_ASSOC);

            return $this->tableColumnData[$this->getTable()];
        }

        /**
         * @param string $locale
         *
         * @return $this
         */
        public function setLocale(string $locale)
        {
            $this->locale = $locale;

            return $this;
        }

        /**
         * @return string
         */
        public function getLocale(): string
        {
            return $this->locale;
        }

        public function fetchFields(): array
        {
            $data = [];

            if ($fetch = $this->fetchTableColumnData())
            {
                foreach ($fetch as $field)
                {
                    $dataField = [];

                    $dataField['comment'] = json_decode($field['Comment'], true) ?: [];

                    $this->fetchColumnDataField($dataField, $field);

                    $this->fetchColumnDataName($dataField, $field);

                    $this->fetchColumnDataRequired($dataField, $field);

                    $this->{'fetch' . ucfirst($this->driver) . 'ColumnData'}($dataField, $field);

                    $data[] = $dataField;
                }
            }

            return $data;
        }

        protected function fetchColumnDataField(array & $data, array $field)
        {
            $data['field'] = $field['Field'];
        }

        protected function fetchColumnDataName(array & $data, array $field)
        {
            $data['name'] = $field['comment']['name'][$this->getLocale()]

                ?? ucfirst(str_replace(['_', '-'], "\x20", $field['Field']));
        }

        protected function fetchColumnDataRequired(array & $data, array $field)
        {
            $data['required'] = ($field['Null'] === 'NO' && $field['Default'] === null) ? true : false;
        }

        protected function fetchMysqlColumnData(array & $data, array $field)
        {
            preg_match('|^([a-z]+)\s*((\()([\d]+)(\)))?\s*([a-z]+)?$|', $field['Type'], $match);

            $data['type'] = $match[1] ?? null;

            $data['size'] = $match[4] ?? null;

            $data['prompt'] = $field['Default'];

            if ($data['size'] && false == in_array($data['type'], $this->columnSizeByType))

                $data['size'] = null;

            if ($data['prompt'] === null)

                return;

            if (in_array($data['type'], $this->skipColumnDefaultByType))

                $data['prompt'] = null;
        }

        protected function fetchPgsqlColumnData(array & $data, array $field)
        {
            $this->skipColumnDefaultByType[] = 'timestamp with time zone';

            $this->columnSizeByType[] = 'character varying';

            $data['type'] = $field['Type'];

            $data['size'] = $field['Size'];

            $data['prompt'] = $field['Default'];

            if ($data['size'] && false == in_array($data['type'], $this->columnSizeByType))

                $data['size'] = null;

            if ($data['prompt'] === null)

                return;

            if (($data['type'] === 'integer' && false == is_numeric($field['Default']))

                || in_array($data['type'], $this->skipColumnDefaultByType))

                $data['prompt'] = null;
        }
    }
}
