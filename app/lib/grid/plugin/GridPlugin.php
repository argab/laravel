<?php
/**
 * Class GridPlugin
 * @project   <Grid Data Providing for PHP language>
 * @package   App\lib\grid
 * @author    ArGabid <argabid@gmail.com>
 * @copyright 2018-2019, ArGabid, License MIT, All rights reserved
 */

namespace App\lib\grid\plugin
{

    use App\lib\grid\Grid;

    use Exception;

    /**
     * show off @property, @property-read, @property-write
     * @property Grid $gridObject;
     * */
    class GridPlugin implements IGridPlugin
    {
        protected $components = [];

        protected $gridObject;

        protected $data = [];

        protected $config = [];

        protected $hook = [];

        protected $fetchPath = [];

        protected $fetched = [];

        public function __construct(array $components, Grid $instance)
        {
            $this->setComponents($components);

            $this->setGridObject($instance);
        }

        public function setComponents(array $components)
        {
            $this->components = [];

            foreach ($components as $name => $class)
            {
                $this->setComponent($name, $class);
            }
        }

        public function setComponent(string $name, string $class = null)
        {
            $this->components[$name] = $class;

            return $this;
        }

        public function getComponent(string $name)
        {
            return $this->components[$name] ?? null;
        }

        final function setGridObject(Grid $instance)
        {
            $this->gridObject = $instance;

            return $this;
        }

        public function gridObject()
        {
            return $this->gridObject;
        }

        public function setConfig(string $componentName, array $params)
        {
            $this->config[$componentName] = array_merge($params, $this->config[$componentName] ?? []);

            return $this;
        }

        public function getConfig(string $componentName, string $paramName = null)
        {
            return $paramName ? $this->config[$componentName][$paramName] : ($this->config[$componentName] ?? []);
        }

        public function checkConfig(string $componentName, string $paramName)
        {
            return (empty($this->config[$componentName])

                || false == array_key_exists($paramName, $this->config[$componentName])) ? false : true;
        }

        public function setData(string $componentName, array $data)
        {
            $this->data[$componentName] = array_merge($this->data[$componentName] ?? [], $data);

            return $this;
        }

        public function getData(string $componentName)
        {
            return $this->data[$componentName] ?? null;
        }

        protected function getComponentInstance(string $componentName)
        {
            $p = [];

            $r = new \ReflectionClass($this->components[$componentName]);

            if ($constructor = $r->getConstructor())
            {
                foreach ($constructor->getParameters() as $param)
                {
                    if (false == $param->isOptional() && false == $this->checkConfig($componentName, $param->name))

                        throw new \logicException

                        (sprintf('The `%s` config parameter have to be set at first in `%s` Grid plugin component.', $param->name, $componentName));

                    $p[] = (isset($this->config[$componentName]) && array_key_exists($param->name, $this->config[$componentName]))

                        ? $this->config[$componentName][$param->name]

                        : $param->getDefaultValue();
                }
            }

            return call_user_func_array([$r, 'newInstance'], $p);
        }

        public function fetchComponent(string $componentName, callable $fetch)
        {
            if (empty($this->getComponent($componentName)) || $this->checkFetched($componentName))

                return $this;

            $instance = $this->components[$componentName] === get_class($this->gridObject)

                ? $this->gridObject : $this->getComponentInstance($componentName);

            if (isset($this->hook[$componentName]))
            {
                foreach ($this->hook[$componentName] as $hook)
                {
                    call_user_func($hook, $instance);
                }
            }

            call_user_func($fetch, $instance);

            $this->setFetched($componentName, $instance);

            return $this;
        }

        public function fetchComponents(array $components = [])
        {
            foreach ($components ?: array_keys($this->components) as $component)
            {
                if ($path = $this->getComponentFetchPath($component))

                    include $path;
            }

            return $this;
        }

        public function setFetched(string $componentName, $instance)
        {
            if (false === $instance instanceof $this->components[$componentName])

                throw new Exception('The plugin component instance must be a valid class object.');

            $this->fetched[$componentName] = $instance;

            return $this;
        }

        public function getFetched(string $componentName)
        {
            return $this->fetched[$componentName];
        }

        public function checkFetched(string $componentName)
        {
            return (false == empty($this->fetched[$componentName]) && gettype($this->fetched[$componentName]) === 'object');
        }

        public function hook(string $componentName, callable $hook)
        {
            if (false == isset($this->hook[$componentName]))

                $this->hook[$componentName] = [];

            $this->hook[$componentName][] = $hook;

            return $this;
        }

        public function setComponentFetchPath(array $componentPath)
        {
            foreach ($componentPath as $componentName => $path)
            {
                $this->fetchPath[$componentName] = $path;
            }

            return $this;
        }

        public function getComponentFetchPath(string $componentName = null)
        {
            return $componentName ? ($this->fetchPath[$componentName] ?? null) : $this->fetchPath;
        }
    }
}
