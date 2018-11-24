<?php
/**
 * Interface IGrid
 * @project   <Grid Data Providing for PHP language>
 * @package   App\lib\grid
 * @author    ArGabid <argabid@gmail.com>
 * @copyright 2018-2019, ArGabid, License MIT, All rights reserved
 */

namespace App\lib\grid
{
    interface IGrid
    {
        /**
         * @param string $path Path to template parent folder
         *
         * @return mixed
         */
        public function setRenderPath(string $path);

        /**
         * @return mixed
         */
        public function render();
    }
}
