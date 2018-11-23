<?php

/**
 * Class GridDataMysqlDriver
 * @project   <Grid Data Providing for PHP language>
 * @package   App\lib\grid\drv
 * @author    ArGabid <argabid@gmail.com>
 * @copyright 2018-2019, ArGabid, License MIT, All rights reserved
 */

namespace App\lib\grid\drv
{
    class GridDataMysqlDriver implements IGridDataDriver
    {
        /*
         * Prepared sql statements
         * */
        protected $sqlStatement = [

            'describe' => 'SHOW FULL COLUMNS FROM `:table`'

        ];

        /*
         * Indicates which database fields should be used to specify the grid input length attributes according to their type.
         * */
        protected $columnSizeByType = [

            'char', 'varchar', 'text', 'tinytext', 'longtext',

            'mediumtext', 'tinyint', 'smallint'

        ];

        /*
         * Indicates which database fields should be skipped to avoid retrieving their default values according to their type.
         * */
        protected $skipColumnDefaultByType = ['timestamp', 'date', 'time', 'datetime', 'year'];

        /**
         * @param string $name
         *
         * @return string
         */
        public function getSqlStatement(string $name): string
        {
            return $this->sqlStatement[$name];
        }

        /**
         * @param array $data
         * @param array $field
         */
        public function fetchColumnData(array & $data, array $field)
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
    }
}
