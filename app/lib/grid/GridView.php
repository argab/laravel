<?php
/**
 * Class GridView
 * @project   <Grid Data Providing for PHP language>
 * @package   App\lib\grid
 * @author    ArGabid <argabid@gmail.com>
 * @copyright 2018-2019, ArGabid, License MIT, All rights reserved
 */

namespace App\lib\grid
{
    class GridView extends Grid
    {
        protected $tag = 'table';

        protected $renderTemplate = 'grid-view/view.php';

        protected $fetch;

        public function fetch(callable $fetch)
        {
            $this->fetch = $fetch;

            return $this;
        }

        protected function fetchData($data, $index)
        {
            return call_user_func($this->fetch, $data, $index);
        }
    }
}
