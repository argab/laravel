<?php
/**
 * Interface IGridTableProvider
 * @project   <Grid Data Providing for PHP language>
 * @package   App\lib\grid
 * @author    ArGabid <argabid@gmail.com>
 * @copyright 2018-2019, ArGabid, License MIT, All rights reserved
 */

namespace App\lib\grid
{
    interface IGridTableProvider extends IGridProvider
    {
        public function gridTableCellPrompts();
    }
}
