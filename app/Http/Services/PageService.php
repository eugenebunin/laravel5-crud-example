<?php

namespace App\Http\Services;

use \Illuminate\Support\Arr;

class PageService
{
    protected $pages;

    public function __construct(\App\Page $pages)
    {
        $this->pages = $pages;
    }

    public function save(array $attrs)
    {

    }

    public function take()
    {
        return $this->pages->orderBy('created_at', -1)->get();
    }
}
