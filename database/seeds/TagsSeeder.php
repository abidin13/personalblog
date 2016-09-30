<?php

use Illuminate\Database\Seeder;
use App\Tags;

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
    }
}
