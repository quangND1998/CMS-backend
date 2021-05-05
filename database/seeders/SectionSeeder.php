<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DateTime;
use Illuminate\Support\Facades\DB;
class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('section')->insert([

            [
                'title' => 'partner',
                'title_vn' => 'partner',
                'text' => null,
                'text_vn' => null,
                'sub_title' => null,
                'sub_title_vn' => null,
                'number' => 1,
                'page_id' => 1,
                'theme_id' => 5,
                'created_at' => new DateTime()
            ],
            [
                'title' => 'VIRTUAL SALES GALLERY VNI - VR SHOWROOM PLATFORM',
                'title_vn' => 'SÀN BẤT ĐỘNG SẢN ẢO VNi - VR SALES GALLERY',
                'text' => 'vr showroom',
                'text_vn' => null,
                'sub_title' => 'Transform your traditional sales kit into 3D digital world.',
                'sub_title_vn' => 'Số hóa sàn bán hàng dự án Bất động sản',
                'number' => 2,
                'page_id' => 1,
                'theme_id' => 1,
                'created_at' => new DateTime()
            ],   
            
            [
                'title' => 'SOLUTIONS',
                'title_vn' => 'GIẢI PHÁP CỦA VNi',
                'text' => 'solution',
                'text_vn' => null,
                'sub_title' => 'Satisfy the high-techs trend of Sales Expert in the digital era.',
                'sub_title_vn' => 'Đáp ứng xu hướng bán hàng công nghệ cao của các chuyên gia Sales thời đại số',
                'number' => 3,
                'page_id' => 1,
                'theme_id' => 2,
                'created_at' => new DateTime()
            ],
            [
                'title' => 'VNi’S WORKING PROCESS',
                'title_vn' => 'QUY TRÌNH LÀM VIỆC CỦA VNi',
                'text' => null,
                'text_vn' => null,
                'sub_title' => 'With over 15 years of experience, we have optimized the everyday working process to bring the best sale kit to your project.',
                'sub_title_vn' => 'Với hơn 15 năm kinh nghiệm, chúng tôi tối ưu quy trình hàng ngày để mang tới cho dự án của bạn công cụ bán hàng tốt nhất.',
                'number' => 4,
                'page_id' => 1,
                'theme_id' => 3,
                'created_at' => new DateTime()
            ],
            [
                'title' => '3D CONTENTS',
                'title_vn' => 'NỘI DUNG 3D TÍCH HỢP',
                'text' => '3d content',
                'text_vn' => null,
                'sub_title' => '3D Videos, Perpective, Tour 360 and 3D scan for Digital transformation',
                'sub_title_vn' => 'Phim, Ảnh, Tour 360 và 3D scan sử dụng trên mọi nền tảng số',
                'number' => 5,
                'page_id' => 1,
                'theme_id' => 4,
                'created_at' => new DateTime()
            ],
            [
                'title' => 'Header',
                'title_vn' => 'Header',
                'text' => 'introduction',
                'text_vn' => null,
                'sub_title' => null,
                'sub_title_vn' => null,
                'number' => 0,
                'page_id' => 1,
                'theme_id' => 6,
                'created_at' => new DateTime()
            ],  [
                'title' => 'CONTACT US NOW',
                'title_vn' => 'LIÊN HỆ NGAY',
                'text' => 'contact',
                'text_vn' => null,
                'sub_title' => 'Contact us now to become the pioneer in Virtual Sales Gallery Technology for Real Estate.',
                'sub_title_vn' => 'Liên hệ để được tư vấn cho Sàn bán hàng dự án của bạn.',
                'number' => 7,
                'page_id' => 1,
                'theme_id' => 7,
                'created_at' => new DateTime()
            ],
            [
                'title' => 'Blog',
                'title_vn' => 'Blog',
                'text' =>null,
                'text_vn' => null,
                'sub_title' => null,
                'sub_title_vn' => null,
                'number' => 6,
                'page_id' => 1,
                'theme_id' => 8,
                'created_at' => new DateTime()
            ]

        ]);
    }
}
