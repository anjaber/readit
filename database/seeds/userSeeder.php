<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;

class userSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                        'name' => 'admin',
                        'email' => 'admin@gmail.com',
                        'password' => Hash::make('123456'),
                        'role'=>'admin',
                    ]);
    //     $clinet=User::all()->where('email','abdullah@gmail.com');

    //    // $user= DB::table('users')->where('email','abdullah@gmail.com');

    //     if( ! $clinet ){
    //         DB::table('users')->insert([
    //             'name' => 'abdullah',
    //             'email' => 'abdullah@gmail.com',
    //             'password' => Hash::make('12345678'),
    //             'role'=>'admin',
    //         ]);
           
    //         }   

}
}
