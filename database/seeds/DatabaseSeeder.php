<?php

use App\category;
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
        factory('App\User',20)->create();
        factory('App\company',20)->create();
        factory('App\job',20)->create();


        $categories = [
            'Technology',
            'Engineering',
            'Government',
            'Medical',
            'Education'
        ];

        foreach ($categories as $category){
            category::create(['name'=>$category]);
        }

        // $this->call(UsersTableSeeder::class);
    }
}
