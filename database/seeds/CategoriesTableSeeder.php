<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


     public  static function categoryNew(Faker $faker)
     {
        for($i=0 ;$i>10 ;$i++){
            $cat=DB::table('categories')->insert([
                'name' =>$faker->title(),
                'created_at'=>$faker->date(),
                'updated_at'=>$faker->date(),
                
            ]);
        }
     }
    public function run(Faker $faker )
    {
        CategoriesTableSeeder::categoryNew($faker);
            }
}
