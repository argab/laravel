<?php
/**
 * Interface IGridProvider
 * @project   <Grid Data Providing for PHP language>
 * @package   App\lib\grid
 * @author    ArGabid <argabid@gmail.com>
 * @copyright 2018-2019, ArGabid, License MIT, All rights reserved
 */

namespace App\lib\grid
{
    interface IGridProvider
    {
        public function gridFields(): array;

        public function gridSafeFields(): array;
    }
}
