<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facades\PageFacade as Page;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Validator;

class LinkController extends Controller
{
    public function index($pageId)
    {
      $page = Page::find($pageId);

      return response()->json([
          'data' => [
              'page' => $page,
              'links' => Page::links($pageId)
          ]
      ]);
    }

    public function create()
    {
        $input = Input::json()->all();
        try {
            $result = Page::createLink($input);
            if ( $result instanceof Validator ) {
              return response()->json(['success' => false, 'errors' => [$result->errors()]]);
            }
        }
        catch(\Exception $e) {
            return response()->json(['errors' => [$e->getMessage()], 'success' => false], 400);
        }
        return $this->index($result->page->id);
    }
}
