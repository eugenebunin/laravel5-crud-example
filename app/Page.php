<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    protected $table = 'pages';

    protected $fillable = [
      'name', 'slug'
    ];

    public function links()
    {
      return $this->hasMany('App\Link');
    }

    public function pictures()
    {
      return $this->hasMany('App\Picture');
    }
}
