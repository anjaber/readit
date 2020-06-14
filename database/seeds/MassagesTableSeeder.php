<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class MassagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run( Faker $faker)
    {
        
        DB::table('massages')->insert([
            'name' =>$faker->name,
            'email' =>$faker->email,
            'subject' =>$faker->title,
            'message' =>$faker->text,
            
            'created_at'=>$faker->date(),
            'updated_at'=>$faker->date(),
            
        ]);    }
}
