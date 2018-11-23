<?php
/**
 * Interface IGridPlugin
 * @project   <Grid Data Providing for PHP language>
 * @package   App\lib\grid
 * @author    ArGabid <argabid@gmail.com>
 * @copyright 2018-2019, ArGabid, License MIT, All rights reserved
 */

namespace App\lib\grid\plugin
{
    interface IGridPlugin
    {
        public function setComponents(array $components);

        public function setComponent(string $name, string $class = null);

        public function setComponentFetchPath(array $componentPath);

        public function getComponentFetchPath(string $componentName = null);

        public function fetchComponent(string $componentName, callable $fetch);

        public function fetchComponents(array $components = []);

        public function hook(string $componentName, callable $hook);
    }
}
