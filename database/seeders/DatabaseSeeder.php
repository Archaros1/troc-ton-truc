<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => env('ADMIN_NAME'), 'email' => env('ADMIN_EMAIL'), 'password' => bcrypt(env('ADMIN_PASSWORD')), 'is_admin' => 1]);
        // \App\Models\User::factory(10)->create();
    }
}
