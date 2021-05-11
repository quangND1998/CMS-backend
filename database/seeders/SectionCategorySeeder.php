<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
class SectionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('section_category')->insert([

            [
                'title' => 'Video',
                'title_vn' => 'Video',
                'section_id' => 6,
                'type' => 4,
                'created_at' => new DateTime()
            ],
            [
                'title' => 'Navbar',
                'title_vn' => 'Navbar',
                'section_id' => 6,
                'type' => 5,
                'created_at' => new DateTime()
            ],
            [
                'title' => 'text',
                'title_vn' => 'text',
                'section_id' => 6,
                'type' => 6,
                'created_at' => new DateTime()
            ]
        ]);
    }
}
