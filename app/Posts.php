<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\User;

class Posts extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }
    
    protected $fillable = ['post_author','post_title','post_content','post_status'];
}
