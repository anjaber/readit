<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run( Faker $faker)
    {
        DB::table('tags')->insert([
            'name' =>$faker->name,
            'created_at'=>$faker->date(),
            'updated_at'=>$faker->date(),
            
        ]);
            }
}
