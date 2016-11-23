<?php

namespace App\Http\Services;

use \Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class PageService
{
    protected $pages;

    // Rules for saving pages
    public static $saveRules = [
        'name' => 'required|min:1|max:256'
    ];

    // Rules for creating new links
    public static $createLinkRules = [
        'page_id' => 'required|exists:pages,id',
        'name' => 'required|min:1',
        'link' => 'required|url'
    ];

    // Rules for creating new pictures
    public static $createPictureRules = [
        'page_id' => 'required|exists:pages,id',
        'source' => 'required|url'
    ];

    public function __construct(\App\Page $pages)
    {
        $this->pages = $pages;
    }

    public function find($id)
    {
        return $this->pages->find($id);
    }

    public function save(array $attrs)
    {
        $validator = Validator::make($attrs, self::$saveRules);
    		if ($validator->fails()) {
          return $validator;
        }

        $attrs['slug'] = $this->generateSlug($attrs['name']);

        if ( isset($attrs['id']) && $page = $this->pages->find($attrs['id']) ) {
            $page->update($attrs);
            return $page;
        }
        return $this->create($attrs);
    }

    public function create($attrs)
    {
      return $this->pages->create($attrs);
    }

    public function update($attrs)
    {
        return $this->pages->update($attrs);
    }

    public function take()
    {
        return $this->pages->orderBy('created_at', -1)->get();
    }

    public function delete($id)
    {
        $page = $this->pages->findOrFail($id);
        return $page->delete();
    }

    public function findWithLinksAndPictures($id)
    {
        return $this->pages->with('links')->with('pictures')->findOrFail($id);
    }

    /**
   	 * Create link and assign it to page
   	 *
   	 * @param arrray
   	 * @return Validation | \App\Page
  	*/
    public function createLink(array $attrs)
    {
        $validator = Validator::make($attrs, self::$createLinkRules);
        if ($validator->fails()) {
          return $validator;
        }

        $page = $this->pages->findOrFail($attrs['page_id']);
        return $page->links()->create($attrs);
    }

    /**
   	 * Create picture and assign it to page
   	 *
   	 * @param arrray
   	 * @return Validation | \App\Page
  	*/
    public function createPicture(array $attrs)
    {
      $validator = Validator::make($attrs, self::$createPictureRules);
      if ($validator->fails()) {
        return $validator;
      }

      $page = $this->pages->findOrFail($attrs['page_id']);
      return $page->pictures()->create($attrs);
    }

    /**
   	 * Get associated links with certain page
   	 *
   	 * @param int Page ID
  	*/
    public function links($id)
    {
        return $this->pages->findOrFail($id)->links()->orderBy('created_at', -1)->get();
    }

    /**
   	 * Get pictures for certain page
   	 *
   	 * @param int Page ID
  	*/
    public function pictures($id)
    {
        return $this->pages->findOrFail($id)->pictures()->orderBy('created_at', -1)->get();
    }

    /**
   	 * Generates slug by page name
   	 *
   	 * @param string Page name
     * @return srting Slug name
  	*/
    protected function generateSlug($name)
    {
        $array = explode(" ", $name);
        $result = implode("-", $array);
        return $result.'.html';
    }

}
