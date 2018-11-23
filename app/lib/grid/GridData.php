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

    use App\lib\grid\drv\IGridDataDriver;

    use App\lib\grid\drv\GridDataMysqlDriver;

    use App\lib\grid\drv\GridDataPgsqlDriver;

    /**
     * show off @property, @property-read, @property-write
     * @property IGridDataDriver $dataDriver
     * */
    class GridData implements IGridData
    {
        /*
         * PDO instance
         * */
        protected $pdo;

        /*
         * PDO driver name
         * */
        protected $driver;

        /*
         * Grid data driver components list
         * */
        protected $dataDrivers = [
            'mysql' => GridDataMysqlDriver::class,
            'pgsql' => GridDataPgsqlDriver::class,
        ];

        /*
         * Grid data driver`s instance
         * */
        protected $dataDriver;

        /*
         * Current Locale
         * */
        protected $locale = 'en';

        /*
         * The Database Table name
         * */
        protected $table;

        /*
         * The Database Table Columns info, retrieved by PDO Statement;
         * Notice: You can specify the field name for the current application locale name,
         * storing it in JSON format on the column comment.
         *
         * Example: [[
         *   "Field" => "username",
         *   "Type" => "varchar(255)",
         *   "Collation" => "utf8mb4_unicode_ci",
         *   "Null" => "NO",
         *   "Key" => "",
         *   "Default" => null,
         *   "Extra" => "",
         *   "Privileges" => "select,insert,update,references",
         *   "Comment" => "{{"name": {"en": "First Name"}}}"
         * ]]
         * */
        protected $tableData = [];

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

            if (null === $this->getDataDriver())

                $this->setDataDriver(new $this->dataDrivers[$this->driver]);

            return $this;
        }

        /**
         * @return PDO
         */
        public function getPdo()
        {
            return $this->pdo;
        }

        /**
         * @return string
         */
        public function getDriver()
        {
            return $this->driver;
        }

        /**
         * @param IGridDataDriver $dataDriver
         *
         * @return $this
         */
        final function setDataDriver(IGridDataDriver $dataDriver)
        {
            $this->dataDriver = $dataDriver;

            return $this;
        }

        /**
         * @return IGridDataDriver
         */
        public function getDataDriver()
        {
            return $this->dataDriver;
        }

        /**
         * @param string $name
         * @param array $bind
         *
         * @return string
         */
        protected function getSql(string $name, array $bind = [])
        {
            return strtr($this->getDataDriver()->getSqlStatement($name), $bind);
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
         */
        public function getTable()
        {
            return $this->table;
        }

        /**
         * @param string $tableName
         * @param array $data
         *
         * @return $this
         */
        public function setTableData(string $tableName, array $data)
        {
            $this->tableData[$tableName] = $data;

            return $this;
        }

        /**
         * @param string $tableName
         *
         * @return array
         */
        public function getTableData(string $tableName): array
        {
            return $this->tableData[$tableName] ?? [];
        }

        /**
         * The magic method for retrieving the Grid Data Driver`s SQL query, and execute it.
         *
         * @param string $method
         * @param array $arg
         *
         * @return array
         */
        public function __call(string $method, array $arg = [])
        {
            if (empty($this->getTableData($this->getTable())))

                $this->setTableData($this->getTable(),

                    $this->getPdo()->query($this->getSql($method, $arg[0] ?? []))->fetchAll(PDO::FETCH_ASSOC));

            return $this->getTableData($this->getTable());
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
            $fields = [];

            if ($desc = $this->describe([':table' => $this->getTable()]))
            {
                foreach ($desc as $field)
                {
                    $data = [];

                    $data['comment'] = $field['comment'] = $this->fetchColumnComment($field);

                    $data['field'] = $this->fetchColumnField($field);

                    $data['name'] = $this->fetchColumnName($field);

                    $data['required'] = $this->fetchColumnRequired($field);

                    $this->getDataDriver()->fetchColumnData($data, $field);

                    $fields[] = $data;
                }
            }

            return $fields;
        }

        protected function fetchColumnComment(array $field)
        {
            return json_decode($field['Comment'], true) ?: $field['Comment'];
        }

        protected function fetchColumnField(array $field)
        {
            return $field['Field'];
        }

        protected function fetchColumnName(array $field)
        {
            return $field['comment']['name'][$this->getLocale()] ?? ucfirst(str_replace(['_', '-'], "\x20", $field['Field']));
        }

        protected function fetchColumnRequired(array $field)
        {
            return ($field['Null'] === 'NO' && $field['Default'] === null);
        }
    }
}
