<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Level;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // we need to create classes seeder

        // create an array with class  data
        for ($i = 1; $i <= 10; $i++) {
            $class = "class $i";
            Level::create([
                'name' => $class
            ]);
        }
    }
}
