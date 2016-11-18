<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Picture extends Model
{
    use SoftDeletes;

    protected $table = 'pictures';

    protected $fillable = [
      'source'
    ];

    public function page()
    {
      return $this->belongsTo('App\Page');
    }
}
