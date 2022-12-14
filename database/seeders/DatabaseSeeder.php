<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        // \App\Models\User::factory(10)->create();

       /* Creating a user with the name and email. */
        User::create([
            'name' => 'Dinesh',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ]);

        // call the seeders
        $this->call(ClassSeeder::class);
    }
}
