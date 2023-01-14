<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\tasks;

class tasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
      'name' => 'tony',
      
    ];
    tasks::create($param);
    $param = [
      'name' => 'jack',
      
    ];
    tasks::create($param);
    $param = [
      'name' => 'sara',
      
    ];
    tasks::create($param);
    $param = [
      'name' => 'saly',
      
    ];
    tasks::create($param);
    }
}
