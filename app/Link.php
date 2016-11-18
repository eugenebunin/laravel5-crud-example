<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use SoftDeletes;

    protected $table = 'links';

    protected $fillable = [
      'name', 'link'
    ];

    public function page()
    {
      return $this->belongsTo('App\Page');
    }
}
