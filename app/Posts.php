<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = ['post_author','post_title','post_content','post_status','updated_at'];

    public function users(){
    	return $this->belongsTo('App\User','post_author');
    }
    public function postTagsid()
    {
        return $this->belongsToMany('App\TagsPosts','posts_tags','post_id','tags_id');
    }
    
}
