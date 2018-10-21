<?php

$this->fetchPlugin('pagination', function($plugin)
{
    /* @var \App\lib\grid\GridTable $this */

    if (false == $plugin instanceof \App\lib\grid\plugins\pagination\Pagination)

        return null;

    /* @var $plugin \App\lib\grid\plugins\pagination\Pagination */

    $this->bindLayout('{pagination}', [$plugin->fetchPages()->render(), null, '</{tag}>']);

});
