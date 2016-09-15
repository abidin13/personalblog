<?php

use Illuminate\Database\Seeder;
use App\Posts;
use App\User;
use Carbon\Carbon;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userid = User::where('name','Febridev')->first();
        $now = Carbon::now();

        $post1 = Posts::create([
            'post_author'=>$userid->id, 
            'post_title'=>'Sample Posting', 
            'post_content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex perferendis natus, animi nulla est nisi rem tempore quibusdam dicta iure quasi quas, eos veritatis debitis distinctio, aperiam dolorem nostrum cum?',
            'post_status'=>1
        ]);
        $post2 = Posts::create([
            'post_author'=>$userid->id, 
            'post_title'=>'Sample Posting 2', 
            'post_content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex perferendis natus, animi nulla est nisi rem tempore quibusdam dicta iure quasi quas, eos veritatis debitis distinctio, aperiam dolorem nostrum cum?',
            'post_status'=>1
        ]);
        $post3 = Posts::create([
            'post_author'=>$userid->id, 
            'post_title'=>'Sample Posting 3', 
            'post_content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex perferendis natus, animi nulla est nisi rem tempore quibusdam dicta iure quasi quas, eos veritatis debitis distinctio, aperiam dolorem nostrum cum?',
            'post_status'=>1
        ]);
    }
}
