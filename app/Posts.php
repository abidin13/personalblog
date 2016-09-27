<?php

namespace App;
use Illuminate\Database\Eloquent\Model;



class Posts extends Model
{
    public function users(){
    	return $this->belongsTo('App\User','post_author');
    }
    
    protected $fillable = ['post_author','post_title','post_content','post_status'];
    
}
