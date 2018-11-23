<?php
/**
 * Class Grid
 * @project   <Grid Data Providing for PHP language>
 * @package   App\lib\grid
 * @author    ArGabid <argabid@gmail.com>
 * @copyright 2018-2019, ArGabid, License MIT, All rights reserved
 */

namespace App\lib\grid
{

    use App\lib\grid\plugin\IGridPlugin;

    use App\lib\grid\plugin\GridPlugin;

    /**
     * show off @property, @property-read, @property-write
     * @property IGridProvider|GridDataProvider $provider;
     * @property GridDataFormatter $formatter            ;
     * @property IGridPlugin|GridPlugin $pluginInstance  ;
     * */
    abstract class Grid implements IGrid
    {
        const NO_DATA = '(no data)';

        protected $provider;

        protected $providerItems;

        protected $field = [];

        protected $row = [];

        protected $formatter;

        protected $prompt = [];

        protected $renderPath;

        protected $renderTemplate;

        protected $template;

        protected $rowTemplate = [];

        protected $layout;

        protected $bindLayout = [];

        protected $tag;

        protected $tagAttributes = [];

        protected $rowAttributes = [];

        protected $sortOrder = [];

        protected $plugin = GridPlugin::class;

        protected $pluginInstance;

        protected $pluginComponents = [];

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

        public function getProviderName()
        {
            return substr(strrchr(get_class($this->getProvider() instanceof GridDataProvider

                ? $this->getProvider()->getEntity() : $this->getProvider()), "\\"), 1);
        }

        public function getProviderProperty(string $property)
        {
            return $this->getProvider()->{$property};
        }

        public function getProviderFormattedProperty(string $property)
        {
            return $this->formatter()->format($property, $this->getProvider()->{$property})->getValue();
        }

        public function getProviderItems()
        {
            if ($this->getProvider() instanceof GridDataProvider)

                return $this->getProvider()->getItems();

            return $this->providerItems;
        }

        public function setProviderItems(array $items)
        {
            if ($this->getProvider() instanceof GridDataProvider)

                $this->getProvider()->setItems($items);

            else $this->providerItems = $items;

            return $this;
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

        public function getRow(string $key, array $rowData = [])
        {
            if (is_callable($this->row[$key]))

                return call_user_func($this->row[$key], $rowData);

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

        final function setFormatter(GridDataFormatter $formatter)
        {
            $this->formatter = $formatter;

            return $this;
        }

        public function formatter()
        {
            return $this->formatter;
        }

        public function setFormat(array $formatFields)
        {
            $this->formatter->setFormat($formatFields);

            return $this;
        }

        public function setFormatAll(array $formatAll)
        {
            $this->formatter->setFormatAll($formatAll);

            return $this;
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
         * Example: bindLayout('{some-key}', ['<template></template>', '<{tag}']) - insert template before tag;
         * Example: bindLayout('{some-key}', ['<template></template>', null, '</{tag}>']) - insert template after tag;
         *
         * @param string $bindKey
         * @param array|callable $data
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

        public function setTagAttributes(array $attr = [])
        {
            $this->tagAttributes = $attr ? GridDataFormatter::setAttribute($this->tagAttributes, $attr) : [];

            return $this;
        }

        public function getTagAttributes()
        {
            return $this->tagAttributes;
        }

        public function setRowAttributes(array $attr = [])
        {
            $this->rowAttributes = $attr ? GridDataFormatter::setAttribute($this->rowAttributes, $attr) : [];

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

        public function fetchSortOrder()
        {
            return $this->setSortOrder($this->sortOrder)->getSortOrder();
        }

        public function getSortOrder()
        {
            return $this->sortOrder;
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

                        break;
                    }
                }

                if (false == isset($r[$sort[$i]]))

                    $a[] = $sort[$i];
            }

            $this->setSortOrder($a);

            return $this;
        }

        final function setPlugin(IGridPlugin $plugin)
        {
            $this->pluginInstance = $plugin;

            return $this;
        }

        public function plugin()
        {
            return $this->pluginInstance ?? ($this->pluginInstance = new $this->plugin($this->pluginComponents, $this));
        }

        public function setPluginComponents(array $components)
        {
            $this->pluginComponents = $components;

            $this->plugin()->setComponents($this->pluginComponents);

            return $this;
        }

        public function render()
        {
            $path = $this->getRenderPath() ?? __DIR__ . '/render/';

            if (false == empty($this->pluginComponents))

                $this->plugin()->fetchComponents();

            ob_start();

            include($path . ltrim($this->renderTemplate, '/..\\'));

            return ob_get_clean();
        }
    }
}
