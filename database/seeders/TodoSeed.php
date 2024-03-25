<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Todo :: create([
            'td_name' => 'ไปนอน',
            'td_des' => 'นอนให้ครบวันละ 3 มื้อ',
            'td_status' => false
        ]);
    }
}
