<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DateTime;
use Illuminate\Support\Facades\DB;
class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('page')->insert([

            [
                'name' => 'Home',
                'name_vn' => 'Trang chủ',
                'image' => null,
                'description' => null,
                'created_at' => new DateTime()
            ]
        ]);
    }
}
