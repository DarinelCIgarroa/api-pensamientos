<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pensamiento;
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
        User::create([
            'name' => 'Darinel',
            'email' =>'daro@gmail.com',
            'password' => bcrypt('123'),
        ]);

        User::factory(5)->create();
        Pensamiento::factory(20)->create();
    }
}
