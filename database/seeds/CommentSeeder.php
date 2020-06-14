<?php

use App\post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
      
            $cat=DB::table('comments')->insert([
                'name' =>$faker->name,
                'email' =>$faker->freeEmail,
                'website' =>$faker->freeEmail   ,
                'message' =>$faker->text(),
                'post_id' =>post::all()->first()->id,
                'created_at'=>$faker->date(),
                'updated_at'=>$faker->date(),
                
            ]);
            
    }
}
