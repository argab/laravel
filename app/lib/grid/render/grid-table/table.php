<?php

use App\lib\grid\GridDataFormatter as GF;
use App\lib\grid\IGridFormProvider;
use App\lib\grid\GridForm;

/* @var \App\lib\grid\GridTable $this */

if (false == isset($this->getTagAttributes()['id']))

    $this->setTagAttributes(['id' => ['grid-table-' . substr(md5(microtime(true)), 0, 10)]]);

if ($this->getTag() === 'table')
{
    if (false == isset($this->getTagAttributes()['class']))

        $this->setTagAttributes(['class' => ['table', 'table-striped', 'table-bordered']]);

    if (null === $this->getColumnRowTemplate())

        $this->setColumnRowTemplate('<thead><tr {attr}>{columns}</tr></thead>');

    if (null === $this->getTemplate())

        $this->setTemplate('<th {attr}>{column}</th>');

    if (null === $this->getCellRowTemplate())

        $this->setCellRowTemplate('<tr {attr}>{cells}</tr>');

    if (null === $this->getCellTemplate())

        $this->setCellTemplate('<td {attr}>{cell}</td>');
}

$output = $this->getLayout() ?: ($this->getTag() ? '<{tag} {attr}>{columns}{rows}</{tag}>' : '{columns}{rows}');

$columns = '';

$sortOrder = $this->fetchSortOrder();

$sortOrderSize = sizeof($sortOrder);

foreach ($sortOrder as $col)
{
    if (false == $this->checkRow($col))

        continue;

    $template = $this->getRowTemplate($col) ?: $this->getTemplate();

    $columnAttributes = $this->getColumnAttributes($col) ?? [];

    $row = $this->getRow($col);

    $tr = [
        '{attr}'   => $columnAttributes,
        '{column}' => null,
    ];

    is_array($row) ? $tr = array_merge($tr, $row) : $tr['{column}'] = $row;

    if ($tr['{column}'] === null)

        $tr['{column}'] = $col;

    if (is_array($tr['{attr}']))

        $tr['{attr}'] = GF::getAttributes($tr['{attr}']);

    $columns .= strtr($template, $tr);
}

$columns = str_replace('{columns}', $columns,

    str_replace('{attr}', GF::getAttributes($this->getRowAttributes()), $this->getColumnRowTemplate()));

$rows = '';

$template = $this->getCellTemplate();

$options = [];

if ($this->checkPluginFetched('filter') && $this->getPluginFetched('filter') instanceof GridForm)
{
    foreach ($this->fetchSortOrder() as $item)
    {
        if ($opt = $this->getPluginFetched('filter')->getInputOptions($item))

            $options[$item] = $opt;
    }
}

else $options = $this->getProvider() instanceof IGridFormProvider ? $this->getProvider()->gridInputOptions() : [];

foreach ($this->getProviderItems() as $key => $val)
{
    $cells = '';

    for ($i = 0; $i < $sortOrderSize; $i++)
    {
        if (false == $this->checkRow($sortOrder[$i]))

            continue;

        $value = $val->{$sortOrder[$i]} ?? ($val[$sortOrder[$i]] ?? null);

        if ((is_string($value) || is_numeric($value)) && isset($options[$sortOrder[$i]][$value]))

            $value = $options[$sortOrder[$i]][$value];

        $tr = [
            'template' => null,
            '{attr}'   => $this->getCellAttributes($sortOrder[$i]),
            '{cell}'   => $value,
        ];

        if ($this->checkCell($sortOrder[$i]))
        {
            $row = $this->getCell($sortOrder[$i], $key);

            is_array($row) ? $tr = array_merge($tr, $row) : $tr['{cell}'] = $row;
        }

        if (is_array($tr['{attr}']))

            $tr['{attr}'] = GF::getAttributes($tr['{attr}']);

        if ($tr['{cell}'] === null)

            $tr['{cell}'] = $this->getPrompt($sortOrder[$i]) ?? '<nodata>' . $this::NO_DATA . '</nodata>';

        $cells .= strtr($tr['template'] ?? $template, $tr);
    }

    $attr = $this->getCellRowAttributes($key);

    $rows .= str_replace('{cells}',
        $cells,
        str_replace('{attr}', ($attr ? GF::getAttributes($attr) : null), $this->getCellRowTemplate($key))
    );
}

echo strtr($this->fetchLayout($output), [
    '{tag}'     => $this->getTag(),
    '{attr}'    => GF::getAttributes($this->getTagAttributes()),
    '{columns}' => $columns,
    '{rows}'    => $rows,
]);
