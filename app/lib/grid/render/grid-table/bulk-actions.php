<?php

use App\lib\grid\GridTable;

/* @var \App\lib\grid\plugin\GridPlugin $this */

$this->setConfig('bulk_actions', [
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
]);

$this->fetchComponent('bulk_actions', function(GridTable $plugin)
{
    $params = $this->getConfig('bulk_actions');

    $actionColumns = [
        'view'   => ['column' => 'bulk_action_view', 'name' => null, 'field' => null, 'template' => '{view}'],
        'update' => ['column' => 'bulk_action_update', 'name' => null, 'field' => null, 'template' => '{update}'],
        'delete' => ['column' => 'bulk_action_delete', 'name' => null, 'field' => null, 'template' => '{delete}'],
    ];

    if (isset($params['action_columns']) && is_array($params['action_columns']))

        $actionColumns = array_merge($actionColumns, $params['action_columns']);

    $url = rtrim(parse_url(getenv('REQUEST_URI'))['path'], '/');

    $field = $params['field'] ?? 'id';

    $setQuery = false == empty($params['set_query']);

    $template = $params['template'] ?? '{view} {update} {delete}';

    $actions = [
        'view' => $params['view']['template']
            ?? sprintf('<a href="%s%s" %s>%s</a>',
                $params['view']['url'] ?? $url . '/view',
                $setQuery ? '?id={item_id}' : '/{item_id}',
                $params['view']['attr'] ?? null,
                $params['view']['text'] ?? '<i class="glyphicon glyphicon-eye-open"></i>'),

        'update' => $params['update']['template']
            ?? sprintf('<a href="%s%s" %s>%s</a>',
                $params['update']['url'] ?? $url . '/update',
                $setQuery ? '?id={item_id}' : '/{item_id}',
                $params['update']['attr'] ?? null,
                $params['update']['text'] ?? '<i class="glyphicon glyphicon-pencil"></i>'),

        'delete' => $params['delete']['template']
            ?? sprintf('<a href="%s%s" %s>%s</a>',
                $params['delete']['url'] ?? $url . '/delete',
                $setQuery ? '?id={item_id}' : '/{item_id}',
                $params['delete']['attr'] ?? 'onclick="if (false == confirm(\'Are you sure you want to delete this element?\')) return false"',
                $params['delete']['text'] ?? '<i class="glyphicon glyphicon-trash"></i>'),
    ];

    $columns = [];

    $sortOrder = $plugin->fetchSortOrder();

    foreach ($actionColumns as $action => $col)
    {
        $column = $col['column'] ?? 'bulk_action_' . $action;

        if (empty($params[$action]) || $plugin->checkRow($column))

            continue;

        if (false == in_array($column, $sortOrder))

            $columns[] = $column;

        $tpl = $col['template'] ?? $template;

        $field = $col['field'] ?? $field;

        $plugin->loadColumn($column, $col['name'] ?? '');

        $tpl = str_replace('{view}', $actions['view'], $tpl);
        $tpl = str_replace('{update}', $actions['update'], $tpl);
        $tpl = str_replace('{delete}', $actions['delete'], $tpl);

        $plugin->setCell($column, function($data) use ($tpl, $field)
        {
            return str_replace('{item_id}', $data->{$field} ?? ($data[$field] ?? null), $tpl);
        });

        if (false == isset(
                $params['view']['text'],
                $plugin->getColumnAttributes($column)['class'],
                $plugin->getColumnAttributes($column)['style'])
        )

            $plugin->setColumnAttributes($column, ['style' => ['width' => '20px']]);
    }

    $plugin->setSortOrder(array_merge($columns, $sortOrder));

});
