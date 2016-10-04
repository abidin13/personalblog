<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagsPosts extends Model
{
    protected $table ='posts_tags';
    protected $fillable = ['post_id','tags_id'];

    public function PostsTags()
    {
    	return $this->belongsToMany('App\Posts','post_id');
    }

    public function TagsPosts()
    {
    	return $this->belongsToMany('App\Tags','tags_id');
    }
}
