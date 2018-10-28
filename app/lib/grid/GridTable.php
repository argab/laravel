<?php
/**
 * Class GridTable
 * @project   <Grid Data Providing for PHP language>
 * @package   App\lib\grid
 * @author    ArGabid <argabid@gmail.com>
 * @copyright 2018-2019, ArGabid, License MIT, All rights reserved
 */

namespace App\lib\grid
{
    use App\lib\grid\plugins\pagination\Pagination;

    class GridTable extends Grid
    {
        protected $tag = 'table';

        protected $cell = [];

        protected $cellAttributes = ['cell' => [], 'base' => []];

        protected $cellRowAttributes = ['index' => [], 'base' => []];

        protected $cellTemplate = null;

        protected $cellRowTemplate = ['index' => [], 'base' => null];

        protected $columnAttributes = [];

        protected $columnRowTemplate = null;

        protected $plugins = [
            'bulk_actions' => GridTable::class,
            'filter'       => GridForm::class,
            'pagination'   => Pagination::class,
        ];

        protected $requiredPluginParams = ['pagination' => ['totalCount']];

        protected $pluginConfig = [
            'bulk_actions' => [
                'set_query'      => true,
                'action_columns' => [
                    'view'   => ['column' => 'bulk_action_view', 'name' => null, 'field' => null, 'template' => '{view}'],
                    'update' => ['column' => 'bulk_action_update', 'name' => null, 'field' => null, 'template' => '{update}'],
                    'delete' => ['column' => 'bulk_action_delete', 'name' => null, 'field' => null, 'template' => '{delete}'],
                ],
                'field'          => null,
                'template'       => '{view} {update} {delete}',
                'view'           => ['template' => null, 'url' => null, 'attr' => null, 'text' => null],
                'update'         => ['template' => null, 'url' => null, 'attr' => null, 'text' => null],
                'delete'         => ['template' => null, 'url' => null, 'attr' => null, 'text' => null],
            ],
            'filter'       => [
                'buttons' => [
                    'submit'   => ['url' => null, 'id' => null, 'attr' => null, 'onclick' => null, 'text' => 'Apply Filter'],
                    'reset'    => ['url' => null, 'id' => null, 'attr' => null, 'onclick' => null, 'text' => 'Reset Filter'],
                    'template' => null // '{submit} {reset}'
                ]
            ],
            'pagination'   => [
                'perPage'  => 25,
                'pageSize' => 10,
            ],
        ];

        protected $pluginFetchPath = [
            'bulk_actions' => __DIR__ . '/render/grid-table/bulk-actions.php',
            'filter'       => __DIR__ . '/render/grid-table/filter.php',
            'pagination'   => __DIR__ . '/render/grid-table/pagination.php',
        ];

        protected $renderTemplate = 'grid-table/table.php';

        /**
         * GridTable constructor.
         *
         * @param IGridTableProvider $provider
         * @param array|null $tagAttributes
         * @param bool $loadColumns
         */
        public function __construct(IGridTableProvider $provider, array $tagAttributes = null, bool $loadColumns = true)
        {
            parent::__construct($provider);

            if ($tagAttributes !== null)

                $this->setTable($tagAttributes);

            if ($loadColumns)

                $this->loadColumns();
        }

        public function setTable(array $attr = [])
        {
            $this->setTagAttributes($attr);

            return $this;
        }

        public function loadColumn(string $key, string $name = null)
        {
            $this->row[$key] = $name ?? $key;

            $this->prompt[$key] = is_array($this->getProvider()->gridTableCellPrompts())

                ? ($this->getProvider()->gridTableCellPrompts()[$key] ?? null) : $this->getProvider()->gridTableCellPrompts();

            return $this;
        }

        public function loadColumns()
        {
            if (empty($this->getFields()))

                throw new \Exception(sprintf('{%s} - field names array is empty.', $this->getEntityName()));

            foreach ($this->getFields() as $k => $val)
            {
                $this->loadColumn($k, $val);
            }

            return $this;
        }

        public function replaceColumns(array $order)
        {
            $this->setReplaceOrder($order);

            return $this;
        }

        public function unsetColumn(string $key)
        {
            if ($this->checkRow($key))

                unset($this->row[$key], $this->prompt[$key]);

            return $this;
        }

        public function unsetColumns(array $keys)
        {
            foreach ($keys as $key)
            {
                $this->unsetColumn($key);
            }

            return $this;
        }

        public function setCell(string $key, $val)
        {
            $this->cell[$key] = $val;

            return $this;
        }

        public function checkCell(string $key)
        {
            return isset($this->cell[$key]);
        }

        public function getCell(string $key, $index = null)
        {
            if (is_callable($this->cell[$key]))

                return call_user_func($this->cell[$key], $this->getItems()[$index] ?? null, $index, $this);

            return $this->cell[$key];
        }

        public function getColumnKeys()
        {
            return array_keys($this->row);
        }

        public function setCellAttributes(string $cell = null, array $attr = null)
        {
            $cell !== null

                ? $this->cellAttributes['cell'][$cell] =

                $attr === null ? [] : GridDataFormatter::setAttribute($this->getCellAttributes($cell), $attr)

                : $this->cellAttributes['base'] =

                $attr === null ? [] : GridDataFormatter::setAttribute($this->cellAttributes['base'], $attr);

            return $this;
        }

        public function getCellAttributes(string $cell = null)
        {
            return $this->cellAttributes['cell'][$cell] ?? $this->cellAttributes['base'];
        }

        public function setCellRowAttributes(array $attr = null, $index = null)
        {
            $index !== null

                ? $this->cellRowAttributes['index'][$index] =

                $attr === null ? [] : GridDataFormatter::setAttribute($this->getCellRowAttributes($index), $attr)

                : $this->cellRowAttributes['base'] =

                $attr === null ? [] : GridDataFormatter::setAttribute($this->cellRowAttributes['base'], $attr);

            return $this;
        }

        public function getCellRowAttributes($index = null)
        {
            return $this->cellRowAttributes['index'][$index] ?? $this->cellRowAttributes['base'];
        }

        public function setColumnAttributes(string $column, array $attr = null)
        {
            $this->columnAttributes[$column] =

                $attr === null ? [] : GridDataFormatter::setAttribute($this->columnAttributes[$column] ?? [], $attr);

            return $this;
        }

        public function getColumnAttributes(string $column)
        {
            return $this->columnAttributes[$column] ?? null;
        }

        public function setColumnRowTemplate(string $template)
        {
            $this->columnRowTemplate = $template;

            return $this;
        }

        public function getColumnRowTemplate()
        {
            return $this->columnRowTemplate;
        }

        public function setCellTemplate(string $template)
        {
            $this->cellTemplate = $template;

            return $this;
        }

        public function getCellTemplate()
        {
            return $this->cellTemplate;
        }

        public function setCellRowTemplate(string $template, $index = null)
        {
            $index !== null ? $this->cellRowTemplate['index'][$index] = $template : $this->cellRowTemplate['base'] = $template;

            return $this;
        }

        public function getCellRowTemplate($index = null)
        {
            return $this->cellRowTemplate['index'][$index] ?? $this->cellRowTemplate['base'];
        }

    }
}
