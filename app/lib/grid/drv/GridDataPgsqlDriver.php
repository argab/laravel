<?php

/**
 * Class GridDataPgsqlDriver
 * @project   <Grid Data Providing for PHP language>
 * @package   App\lib\grid\drv
 * @author    ArGabid <argabid@gmail.com>
 * @copyright 2018-2019, ArGabid, License MIT, All rights reserved
 */

namespace App\lib\grid\drv
{
    class GridDataPgsqlDriver implements IGridDataDriver
    {
        /*
         * Prepared sql statements
         * */
        protected $sqlStatement = [

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

        ];

        /*
         * Indicates which database fields should be used to specify the Grid Input length attributes according to their type.
         * */
        protected $columnSizeByType = [

            'char', 'varchar', 'text', 'tinytext', 'longtext',

            'mediumtext', 'tinyint', 'smallint', 'character varying'

        ];

        /*
         * Indicates which database fields should be skipped to avoid retrieving their default values according to their type.
         * */
        protected $skipColumnDefaultByType = ['timestamp', 'date', 'time', 'datetime', 'year', 'timestamp with time zone'];

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
            $data['type'] = explode("\x20", $field['Type'])[0];

            $data['size'] = $field['Size'];

            $data['prompt'] = $field['Default'];

            if ($data['size'] && false == in_array($data['type'], $this->columnSizeByType))

                $data['size'] = null;

            if ($data['prompt'] === null)

                return;

            if (($data['type'] === 'integer' && false == is_numeric($field['Default'])) || in_array($data['type'], $this->skipColumnDefaultByType))

                $data['prompt'] = null;
        }
    }
}
