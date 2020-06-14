<?php

use App\post;
use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class Tag_PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run( Faker $faker)
    {
        DB::table('tags')->insert([
            'post_id' =>post::all()->first()->id,
            'tag_id' =>Tag::all()->first()->id,
            'created_at'=>$faker->date(),
            'updated_at'=>$faker->date(),
            
        ]);
            }

            

}
