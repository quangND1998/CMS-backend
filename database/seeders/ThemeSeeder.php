<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DateTime;
use Illuminate\Support\Facades\DB;
class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('theme')->insert([

            [
                'title' => 'Template 1',
                'image_template' => '/images/theme/1618796467.themplate1.PNG',
                'link_code' => 'styles.template1',
                'type' => 1,
                'created_at' => new DateTime()
            ],
            [
                'title' => 'Template 2',
                'image_template' => '/images/theme/1618797912.template2.PNG',
                'link_code' => 'styles.template2',
                'type' => 0,
                'created_at' => new DateTime()
            ],
            [
                'title' => 'Template 3',
                'image_template' => '/images/theme/1618797920.template3.PNG',
                'link_code' => 'styles.template3',
                'type' => 0,
                'created_at' => new DateTime()
            ],
            [
                'title' => 'Template 4',
                'image_template' => '/images/theme/1618796501.template4.PNG',
                'link_code' => 'styles.template4',
                'type' => 1,
                'created_at' => new DateTime()
            ],

            [
                'title' => 'Template 5',
                'image_template' => '/images/theme/1618796527.template5.PNG',
                'link_code' => 'styles.template5',
                'type' => 0,
                'created_at' => new DateTime()
            ],
            [
                'title' => 'Template 6',
                'image_template' => '/images/theme/1618882029.header.PNG',
                'link_code' => 'styles.header',
                'type' => 1,
                'created_at' => new DateTime()
            ],
            [
                'title' => 'Footer',
                'image_template' => '/images/theme/1618886538.footer.PNG',
                'link_code' => 'styles.footer',
                'type' => 0,
                'created_at' => new DateTime()
            ],
            [
                'title' => 'Blog',
                'image_template' => '/images/theme/1618887139.blognews.PNG',
                'link_code' => 'styles.blognews',
                'type' => 3,
                'created_at' => new DateTime()
            ]
        ]

        );
    }
}
