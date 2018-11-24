<?php
/**
 * Interface IGridDataProvider
 * @project   <Grid Data Providing for PHP language>
 * @package   App\lib\grid
 * @author    ArGabid <argabid@gmail.com>
 * @copyright 2018-2019, ArGabid, License MIT, All rights reserved
 */

namespace App\lib\grid\drv
{
    interface IGridDataDriver
    {
        public function getSqlStatement(string $name): string;

        public function fetchColumnData(array & $data, array $field);
    }
}
