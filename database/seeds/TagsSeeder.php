<?php

use Illuminate\Database\Seeder;
use App\Tags;
use App\TagsPosts;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags1 = Tags::create(['name'=>'HTML']);
        $tags2 = Tags::create(['name'=>'PHP']);
        $tags3 = Tags::create(['name'=> 'CSS']);
        $tags4 = Tags::create(['name'=>'Javascript']);
        $tags5 = Tags::create(['name'=>'Python']);

        $postTags11 = TagsPosts::create(['post_id'=> 1, 'tags_id'=>1]);
        $postTags12 = TagsPosts::create(['post_id'=> 1, 'tags_id'=>2]);
        $postTags13 = TagsPosts::create(['post_id'=> 1, 'tags_id'=>3]);

        $postTags21 = TagsPosts::create(['post_id'=> 2, 'tags_id'=>4]);
        $postTags22 = TagsPosts::create(['post_id'=> 2, 'tags_id'=>5]);


        $postTags31 = TagsPosts::create(['post_id'=> 3, 'tags_id'=>5]);
        $postTags32 = TagsPosts::create(['post_id'=> 3, 'tags_id'=>4]);
        $postTags33 = TagsPosts::create(['post_id'=> 3, 'tags_id'=>3]);
    }
}
