<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';
    protected $fillable = ['name'];

    // public function PostTags()
    // {
    //     return $this->belongsToMany('App\Post','id');
    // }
    
}
