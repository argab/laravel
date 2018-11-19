<?php

use App\lib\grid\plugins\pagination\Pagination;

$this->fetchPlugin('pagination', function(Pagination $plugin)
{
    /* @var \App\lib\grid\GridTable $this */

    $this->bindLayout('{pagination}', [$plugin->fetchPages()->render(), null, '</{tag}>']);
});
