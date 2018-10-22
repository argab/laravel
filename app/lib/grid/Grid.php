<?php
/**
 * Class Grid
 *
 * @project <Grid Data Providing for PHP language>
 * @package App\lib\grid
 * @author ArGabid <argabid@gmail.com>
 * @copyright 2018-2019, ArGabid, License MIT, All rights reserved
 */

namespace App\lib\grid {

    /*
     * @property IGridProvider|GridDataProvider $provider
     * */
    abstract class Grid implements IGrid
    {
        const NO_DATA = '(no data)';

        protected $provider;

        protected $items = null;

        protected $field = [];

        protected $prompt = [];

        protected $row = [];

        protected $renderPath;

        protected $renderTemplate;

        protected $template = null;

        protected $rowTemplate = [];

        protected $layout;

        protected $bindLayout = [];

        protected $tag = '';

        protected $tagAttributes = [];

        protected $rowAttributes = [];

        protected $sortOrder = [];

        protected $plugins = [];

        protected $pluginData = [];

        protected $requiredPluginParams = [];

        protected $pluginConfig = [];

        protected $pluginHook = [];

        protected $pluginFetchPath = [];

        protected $pluginFetched = [];

        /**
         * Grid constructor.
         *
         * @param IGridProvider|GridDataProvider $provider
         */
        public function __construct(IGridProvider $provider)
        {
            $this->provider = $provider;

            $this->setFields($this->provider->gridFields());
        }

        public function getProvider()
        {
            return $this->provider;
        }

        public function getEntity()
        {
            return $this->provider instanceof GridDataProvider ? $this->provider->getEntity() : $this->provider;
        }

        public function getEntityName()
        {
            return substr(strrchr(get_class($this->getEntity()), "\\"), 1);
        }

        public function getEntityProp(string $property)
        {
            return $this->getEntity()->{$property} ?? null;
        }

        public function setItems(array $items = null)
        {
            $this->items = $items;

            return $this;
        }

        public function getItems()
        {
            return $this->items ?? ($this->provider instanceof GridDataProvider ? $this->provider->getItems() : null);
        }

        public function checkField(string $key)
        {
            return isset($this->field[$key]);
        }

        public function setFields(array $data)
        {
            $this->field = array_merge($this->field, array_diff_key($data, array_flip((array) $this->getProvider()->gridSafeFields())));

            return $this;
        }

        public function getFields()
        {
            return $this->field;
        }

        public function getField(string $key)
        {
            return $this->field[$key] ?? null;
        }

        public function setPrompt(string $key, $value)
        {
            $this->prompt[$key] = $value;

            return $this;
        }

        public function setPrompts(array $keyData = [], $prompt = null)
        {
            $prompt = $prompt ?? static::NO_DATA;

            foreach (array_keys($keyData) ?: $this->fetchSortOrder() as $k)
            {
                $this->setPrompt($k, $keyData[$k] ?? $prompt);
            }

            return $this;
        }

        public function getPrompt(string $key)
        {
            return $this->prompt[$key] ?? null;
        }

        public function setRow(string $key, $val, string $template = null)
        {
            $this->row[$key] = $val;

            if ($template !== null)

                $this->setTemplate($template, $key);

            return $this;
        }

        public function getRows()
        {
            return $this->row;
        }

        public function checkRow(string $key)
        {
            return isset($this->row[$key]);
        }

        public function getRow(string $key)
        {
            if (is_callable($this->row[$key]))

                return call_user_func($this->row[$key], $this->getEntity(), $this);

            return $this->row[$key];
        }

        public function unsetFields(array $keys)
        {
            foreach ($keys as $key)
            {
                if ($this->checkField($key))

                    unset($this->field[$key]);
            }

            return $this;
        }

        public function setRenderPath(string $path)
        {
            $this->renderPath = rtrim($path, '/..\\') . '/';

            return $this;
        }

        public function getRenderPath()
        {
            return $this->renderPath;
        }

        public function setRenderTemplate(string $template)
        {
            $this->renderTemplate = $template;

            return $this;
        }

        public function setTemplate(string $template, string $rowKey = null)
        {
            if ($rowKey !== null)
            {
                $this->rowTemplate[$rowKey] = $template;

                return $this;
            }

            $this->template = $template;

            return $this;
        }

        public function getTemplate()
        {
            return $this->template;
        }

        public function checkRowTemplate(string $key)
        {
            return isset($this->rowTemplate[$key]);
        }

        public function getRowTemplate(string $key)
        {
            return $this->rowTemplate[$key] ?? null;
        }

        public function setLayout(string $layout)
        {
            $this->layout = $layout;

            return $this;
        }

        public function getLayout()
        {
            return $this->layout;
        }

        /**
         * @param string $bindKey
         * @param array|callable $data
         *
         *  Example: bindLayout('{some-key}', ['<template></template>', '<{tag}']) - insert template before tag;
         *  Example: bindLayout('{some-key}', ['<template></template>', null, '</{tag}>']) - insert template after tag;
         *  Example: bindLayout('{some-key}', function($layout){return $layout;}) - set layout string;
         *
         * @return $this
         */
        public function bindLayout(string $bindKey, $data)
        {
            $this->bindLayout[$bindKey] = $data;

            return $this;
        }

        public function getLayoutBindings()
        {
            return $this->bindLayout;
        }

        protected function fetchLayout(string $layout): string
        {
            $bind = [];

            foreach ($this->bindLayout as $key => $data)
            {
                if (is_callable($data))
                {
                    $layout = call_user_func($data, $layout);

                    if ('string' !== gettype($layout))

                        throw new \logicException(

                            sprintf('The result value of `%s` bind layout key must be returned as the type of `string`.', $key));

                    continue;
                }

                $bind[$key] = $data[0] ?? null;

                if (strpos($layout, $key) !== false)

                    continue;

                if ($before = $data[1] ?? null)

                    $layout = str_replace($before, $key . $before, $layout);

                if ($after = $data[2] ?? null)

                    $layout = str_replace($after, $after . $key, $layout);
            }

            return strtr($layout, $bind);
        }

        public function setTag(string $tag)
        {
            $this->tag = $tag;

            return $this;
        }

        public function getTag(): string
        {
            return $this->tag;
        }

        public function setTagAttributes(array $attr = null)
        {
            $this->tagAttributes = $attr === null ? [] : GridDataFormatter::setAttribute($this->tagAttributes, $attr);

            return $this;
        }

        public function getTagAttributes()
        {
            return $this->tagAttributes;
        }

        public function setRowAttributes(array $attr = null)
        {
            $this->rowAttributes = $attr === null ? [] : GridDataFormatter::setAttribute($this->rowAttributes, $attr);

            return $this;
        }

        public function getRowAttributes()
        {
            return $this->rowAttributes;
        }

        public function setSortOrder(array $order)
        {
            $this->sortOrder = array_keys(array_merge(array_flip($order), $this->getFields(), $this->getRows()));

            return $this;
        }

        protected function setReplaceOrder(array $order)
        {
            $a = $r = [];

            $sort = $this->fetchSortOrder();

            $keys = array_keys($order);

            for ($i = 0; $i < sizeof($sort); $i++)
            {
                for ($ii = 0; $ii < sizeof($keys); $ii++)
                {
                    if ($sort[$i] === $order[$keys[$ii]])
                    {
                        $a[] = $keys[$ii];

                        $a[] = $order[$keys[$ii]];

                        $r[$keys[$ii]] = $r[$order[$keys[$ii]]] = true;

                        unset($keys[$ii]);

                        break;
                    }
                }

                if (false == isset($r[$sort[$i]]))

                    $a[] = $sort[$i];
            }

            $this->setSortOrder($a);

            return $this;
        }

        public function fetchSortOrder()
        {
            return $this->setSortOrder($this->sortOrder)->getSortOrder();
        }

        public function getSortOrder()
        {
            return $this->sortOrder;
        }

        public function setPlugin(string $plugin, string $class = null)
        {
            $this->plugins[$plugin] = $class;

            return $this;
        }

        public function setPlugins(array $data)
        {
            foreach ($data as $plugin => $class)
            {
                $this->setPlugin($plugin, $class);
            }

            return $this;
        }

        public function getPlugin(string $plugin)
        {
            return $this->plugins[$plugin] ?? null;
        }

        public function setRequiredPluginParams(string $plugin, array $params)
        {
            $this->requiredPluginParams[$plugin] = $params;

            return $this;
        }

        public function getRequiredPluginParams(string $plugin)
        {
            return $this->requiredPluginParams[$plugin] ?? null;
        }

        public function checkRequiredPluginParams(string $plugin)
        {
            if (false == empty($this->requiredPluginParams[$plugin]))
            {
                foreach ($this->requiredPluginParams[$plugin] as $param)
                {
                    if (false == isset($this->pluginConfig[$plugin])

                        || false == array_key_exists($param, $this->pluginConfig[$plugin])
                    )

                        throw new \logicException(

                            sprintf('The `%s` Plugin`s `%s` config parameter have to be set at first.', $plugin, $param));
                }
            }
        }

        public function setPluginConfig(string $plugin, array $params)
        {
            $this->pluginConfig[$plugin] = array_merge($this->pluginConfig[$plugin] ?? [], $params);

            return $this;
        }

        public function getPluginConfig(string $plugin)
        {
            return $this->pluginConfig[$plugin] ?? null;
        }

        public function setPluginData(string $plugin, array $data)
        {
            $this->pluginData[$plugin] = array_merge($this->pluginData[$plugin] ?? [], $data);

            return $this;
        }

        public function getPluginData(string $plugin)
        {
            return $this->pluginData[$plugin] ?? null;
        }

        protected function getPluginInstance(string $plugin)
        {
            $prm = [];

            $rfc = new \ReflectionClass($this->plugins[$plugin]);

            if ($constructor = $rfc->getConstructor())
            {
                foreach ($constructor->getParameters() as $param)
                {
                    $prm[] = (isset($this->pluginConfig[$plugin]) && array_key_exists($param->name, $this->pluginConfig[$plugin]))

                        ? $this->pluginConfig[$plugin][$param->name]

                        : $param->getDefaultValue();
                }
            }

            return call_user_func_array([$rfc, 'newInstance'], $prm);
        }

        public function fetchPlugin(string $plugin, callable $fetch)
        {
            if (false == class_exists($this->plugins[$plugin]) || $this->checkPluginFetched($plugin))

                return $this;

            $this->checkRequiredPluginParams($plugin);

            $instance = $this->plugins[$plugin] === get_class($this) ? $this : $this->getPluginInstance($plugin);

            $class = get_class($instance);

            if (isset($this->pluginHook[$plugin]))
            {
                foreach ($this->pluginHook[$plugin] as $hook)
                {
                    $instance = call_user_func($hook, $instance);

                    if (false == $instance instanceof $class)

                        throw new \logicException(

                            sprintf('The `%s` Plugin`s Hook must return an instance of `%s` class.', $plugin, $class));
                }
            }

            call_user_func($fetch, $instance);

            $this->setPluginFetched($plugin);

            return $this;
        }

        public function fetchPlugins(array $plugins = [])
        {
            foreach ($plugins ?: array_keys($this->plugins) as $plugin)
            {
                $path = $this->getPluginFetchPath($plugin);

                if (is_file($path)) include $path;
            }

            return $this;
        }

        public function setPluginFetched(string $plugin, bool $fetched = true)
        {
            $this->pluginFetched[$plugin] = $fetched;

            return $this;
        }

        public function checkPluginFetched(string $plugin)
        {
            return false == empty($this->pluginFetched[$plugin]);
        }

        public function pluginHook(string $plugin, callable $hook)
        {
            if (false == isset($this->pluginHook[$plugin]))

                $this->pluginHook[$plugin] = [];

            $this->pluginHook[$plugin][] = $hook;

            return $this;
        }

        public function setPluginFetchPaths(array $data)
        {
            foreach ($data as $plugin => $path)
            {
                $this->pluginFetchPath[$plugin] = $path;
            }

            return $this;
        }

        public function getPluginFetchPath(string $plugin)
        {
            return $this->pluginFetchPath[$plugin] ?? null;
        }

        public function render(bool $fetchPlugins = true)
        {
            $path = $this->getRenderPath() ?: __DIR__ . '/render/';

            if ($fetchPlugins)

                $this->fetchPlugins();

            ob_start();

            include($path . ltrim($this->renderTemplate, '/..\\'));

            return ob_get_clean();
        }
    }
}
