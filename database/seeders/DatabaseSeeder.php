<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(4)->create(); //Para relacionarlos tiene que estar en este orden
        \App\Models\Post::factory(30)->create();
       
        
    }
}
