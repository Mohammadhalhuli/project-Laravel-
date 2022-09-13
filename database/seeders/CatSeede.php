<?php

namespace Database\Seeders;

use App\Models\Cat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CatSeede extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cat::create(['name'=>'cat1','description'=>'this is cat1']);
    }
}
