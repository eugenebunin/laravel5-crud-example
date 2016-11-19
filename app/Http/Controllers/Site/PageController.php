<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facades\PageFacade as Page;

class PageController extends Controller
{
    public function index($format = 'html')
    {
        $pages = Page::take();

        if ( $format == 'json' ) {
            return response()->json(['data' => $pages], 200);
        }

        return view('page.index', ['pages' => $pages]);
    }

    public function delete()
    {

    }

    public function save()
    {

    }

    public function edit()
    {

    }
}
