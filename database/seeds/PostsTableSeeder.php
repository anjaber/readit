<?php

use App\category;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('posts')->insert([
            'title' =>$faker->title,
            'description' => $faker->text,
            'content' => $faker->text,
            'image'=>'storage/image_2.jpg',
            'category_id'=>category::all()->first()->id ,
        ]);
       

}
}