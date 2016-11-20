<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facades\PageFacade as Page;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Validator;

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

    public function delete($id)
    {
        try {
            $result = Page::delete($id);
        }
        catch(\Exception $e) {
            return response()->json(['errors' => [$e->getMessage()], 'success' => false], 400);
        }
        
        return response()->json(['success' => true]);
    }

    public function save()
    {
        $input = Input::json()->all();

        try {
            $result = Page::save($input);

            if ( $result instanceof Validator ) {
              return response()->json(['success' => false, 'errors' => [$result->errors()]]);
            }
        }
        catch(\Exception $e) {
            return response()->json(['errors' => [$e->getMessage()], 'success' => false], 400);
        }

        return response()->json(['success' => true]);
    }

    public function edit()
    {

    }
}
