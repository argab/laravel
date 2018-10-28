<?php
/**
 * Interface IGridData
 * @project   <Grid Data Providing for PHP language>
 * @package   App\lib\grid
 * @author    ArGabid <argabid@gmail.com>
 * @copyright 2018-2019, ArGabid, License MIT, All rights reserved
 */

namespace App\lib\grid
{
    interface IGridData
    {
        //TODO

        public function fetchFields(): array;

        public function fetchItems(): array;

        public function fetchCount(): int;
    }
}
