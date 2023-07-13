<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $depar = ['Quản trị', 'Thành Viên', 'nhân viên'];
        $k = array_rand($depar);
        $v = $depar[$k];

        DB::table('departments')->insert([
            'name' => $v,
        ]);
    }
}