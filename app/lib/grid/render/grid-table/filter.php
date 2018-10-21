<?php

/* @var \App\lib\grid\GridTable $this */

$this->setPluginConfig('filter', ['provider' => $this->getProvider()]);

$this->fetchPlugin('filter', function($plugin)
{
    /* @var \App\lib\grid\GridTable $this */

    if (false == $plugin instanceof \App\lib\grid\GridForm)

        return null;

    /* @var $plugin \App\lib\grid\GridForm */

    $id = $plugin->getTagAttributes()['id'] ?? 'grid-table-filter-' . substr(md5(microtime(true)), 0, 10);

    if (empty($plugin->getSortOrder()))

        $plugin->setSortOrder($this->fetchSortOrder());

    if ($this->getTag() === 'table' && null === $plugin->getTemplate() && $plugin->getTag() === 'form')
    {
        $plugin->setTag('tr')->setTagAttributes(null)->setTemplate('<td {attr}>{input}</td>');

        if (false == isset($plugin->getRowAttributes()['class']))

            $plugin->setRowAttributes(['class' => []]);
    }

    $plugin->setTagAttributes(['id' => $id]);

    foreach ($plugin->fetchSortOrder() as $item)
    {
        if (false == $this->checkRow($item))

            $plugin->unsetInput($item);

        if (false == $plugin->checkInput($item) && $this->checkRow($item))

            $plugin->setRow($item, '');

        if (null === $plugin->getRowTemplate($item))
        {
            $type = $plugin->getInputType($item);

            if ($plugin->isOptionalInput($item))

                $plugin->setSelect($item, null, ['' => '']);

            if ($type === 'textarea' || $type === 'file')

                $plugin->setInput($item, null, $plugin::DEFAULT_INPUT_TYPE);

            if ($type === 'date' && isset($plugin->getInput($item)['time']))

                $plugin->setInputType($item, $plugin::DEFAULT_INPUT_TYPE)->setInputAttribute($item, [
                    'data' => ['type-datetime' => 1]
                ]);
        }
    }

    if ($buttons = $this->getPluginConfig('filter')['buttons'] ?? null)
    {
        $btn = [
            'submit' => [
                'id'      => $buttons['submit']['id'] ?? 'grid-table-filter-submit-' . substr(md5(microtime(true)), 0, 10),
                'text'    => $buttons['submit']['text'] ?? 'Apply Filter',
                'attr'    => $buttons['submit']['attr'] ?? 'class="btn btn-info btn-sm"',
                'onclick' => $buttons['submit']['onclick'] ?? strtr('
                    var parser = document.createElement(\'a\');
                    parser.href = \'{url}\';
                    var params = new URLSearchParams(parser.search);
                    $(\'#{id}\').find(\'input,select\').each(function(){
                        if ($(this).val() !== \'\') params.set($(this).attr(\'name\'), $(this).val())
                    });
                    window.location.href = parser.pathname + \'?\' + params.toString()
                ',
                [
                    '{id}'  => $id,
                    '{url}' => $buttons['submit']['url'] ?? getenv('REQUEST_URI'),
                ]),
            ],
            'reset'  => [
                'id'      => $buttons['submit']['id'] ?? 'grid-table-filter-reset-' . substr(md5(microtime(true)), 0, 10),
                'text'    => $buttons['reset']['text'] ?? 'Reset Filter',
                'attr'    => $buttons['reset']['attr'] ?? 'class="btn btn-default btn-sm"',
                'onclick' => $buttons['reset']['onclick']
                    ?? sprintf('window.location.href = %s', $buttons['reset']['url'] ?? 'window.location.pathname'),
            ]
        ];

        $template = $buttons['template'] ?? '<div class="grid-table-filter-submit-buttons">{submit} {reset}</div>';

        $template = strtr($template, [

            '{submit}' => sprintf('<button %s id="%s" onclick="%s">%s</button>',

                $btn['submit']['attr'], $btn['submit']['id'], $btn['submit']['onclick'], $btn['submit']['text']),

            '{reset}' => sprintf('<button %s id="%s" onclick="%s">%s</button>',

                $btn['reset']['attr'], $btn['reset']['id'], $btn['reset']['onclick'], $btn['reset']['text'])
        ]);

        if (false == isset($plugin->getTagAttributes()['onkeydown']))

            $plugin->setTagAttributes([
                'onkeydown' => sprintf('if (event.keyCode === 13) $(\'#%s\').trigger(\'click\')', $btn['submit']['id'])
            ]);

        $this->bindLayout('{filter_btn}', [$template, '<{tag}']);
    }

    $this->bindLayout('{filter}', [$plugin->render(), null, '{columns}']);

});