<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
    Task::create($param);
    $param = [
      'name' => 'jack',
      
    ];
    Task::create($param);
    $param = [
      'name' => 'sara',
      
    ];
    Task::create($param);
    $param = [
      'name' => 'saly',
      
    ];
    Task::create($param);
    }
}
