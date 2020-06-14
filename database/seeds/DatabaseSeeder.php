<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(userSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(MassagesTableSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(Tag_PostSeeder::class);
    }
}
