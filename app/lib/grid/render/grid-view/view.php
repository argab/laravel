<?php

use App\lib\grid\IGridFormProvider;
use App\lib\grid\GridDataFormatter as GF;

/* @var \App\lib\grid\GridView $this */

if (false == isset($this->getTagAttributes()['id']))

    $this->setTagAttributes(['id' => ['grid-view-' . substr(md5(microtime(true)), 0, 10)]]);

if ($this->getProviderItems() !== null)
{
    include 'items.php';

    return;
}

$tagAttr = $this->getTagAttributes();

if ($this->getTemplate() === null)
{
    switch ($this->getTag())
    {
        case 'ol':
        case 'ul':

            $t = '<li {attr}><div>{name}</div><div>{row}</div></li>';

            if (false == isset($tagAttr['class']))

                $tagAttr['class'] = ['list-unstyled'];

            break;
        case 'div':

            $t = '<div {attr}><div>{name}</div><div>{row}</div></div>';

            break;
        case 'table':

            $t = '<tr {attr}><td>{name}</td><td>{row}</td></tr>';

            if (false == isset($tagAttr['class']))

                $tagAttr['class'] = ['table', 'table-striped', 'table-bordered'];

            break;
        default:

            $t = '{row}';
    }

    $this->setTemplate($t);
}

$output = $this->getLayout() ?: ($this->getTag() ? '<{tag} {attr}>{rows}</{tag}>' : '{rows}');

$rows = '';

$attr = GF::getAttributes($this->getRowAttributes());

$options = $this->getProvider() instanceof IGridFormProvider ? $this->getProvider()->gridInputOptions() : [];

foreach ($this->fetchSortOrder() as $k)
{
    if (false == $this->checkField($k) && false == $this->checkRow($k))

        continue;

    $value = $this->getProviderProperty($k);

    if ((is_string($value) || is_numeric($value)) && isset($options[$k][$value]))

        $value = $options[$k][$value];

    $tr = [
        '{name}' => $this->getField($k),
        '{attr}' => $attr,
        '{row}'  => $value,
    ];

    if ($this->checkRow($k))
    {
        $row = $this->getRow($k);

        is_array($row) ? $tr = array_merge($tr, $row) : $tr['{row}'] = $row;
    }

    if ($tr['{name}'] === null)

        $tr['{name}'] = $k;

    if (is_array($tr['{attr}']))

        $tr['{attr}'] = GF::getAttributes($tr['{attr}']);

    if ($tr['{row}'] === null)

        $tr['{row}'] = $this->getPrompt($k) ?? '<nodata>' . $this::NO_DATA . '</nodata>';

    $rows .= strtr($this->checkRowTemplate($k) ? $this->getRowTemplate($k) : $this->getTemplate(), $tr);
}

echo strtr($this->fetchLayout($output), [
    '{tag}'  => $this->getTag(),
    '{attr}' => GF::getAttributes($tagAttr),
    '{rows}' => $rows
]);
