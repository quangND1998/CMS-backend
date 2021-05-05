<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->insert([

            [
               
                'title'=> 'video',
                'title_vn'=> 'Video',
                'video'=> null,
                'image'=> null,
                'tour360'=> null,
                'scan'=> null,
                'detail'=> null,
                'detail_vn'=> null,
                'video_upload'=> '/video/1618901336.header-video.mp4',
                'icon_class'=> null,
                'section_category_id'=> 1,
                'section_id' =>null,
                'created_at' => new DateTime()
            ],
            [
            
                'title'=> 'Introduction',
                'title_vn'=> 'Introduction',
                'video'=> null,
                'image'=> null,
                'tour360'=> null,
                'scan'=> null,
                'detail'=> 'INTRODUCTION',
                'detail_vn'=> 'GIỚI THIỆU',
                'video_upload'=> null,
                'icon_class'=> null,
                'section_category_id'=> 2,
                'section_id' =>null,
                'created_at' => new DateTime()
            ],
            [
             
                'title'=> 'VR Showroom',
                'title_vn'=> 'VR Showroom',
                'video'=> null,
                'image'=> null,
                'tour360'=> null,
                'scan'=> null,
                'detail'=> 'PRODUCTS',
                'detail_vn'=> 'SẢN PHẨM',
                'video_upload'=> null,
                'icon_class'=> null,
                'section_category_id'=> 2,
                'section_id' =>null,
                'created_at' => new DateTime()
            ],
            [
           
                'title'=> 'Solution',
                'title_vn'=> 'Solution',
                'video'=> null,
                'image'=> null,
                'tour360'=> null,
                'scan'=> null,
                'detail'=> 'SOLUTIONS',
                'detail_vn'=> 'GIẢI PHÁP',
                'video_upload'=> null,
                'icon_class'=> null,
                'section_category_id'=> 2,
                'section_id' =>null,
                'created_at' => new DateTime()
            ],
            [
             
                'title'=> '3D content',
                'title_vn'=> '3D content',
                'video'=> null,
                'image'=> null,
                'tour360'=> null,
                'scan'=> null,
                'detail'=> '3D CONTENTS',
                'detail_vn'=> '3D CONTENTS',
                'video_upload'=> null,
                'icon_class'=> null,
                'section_category_id'=> 2,
                'section_id' =>null,
                'created_at' => new DateTime()
            ],
            [
             
                'title'=> 'Contact',
                'title_vn'=> 'Contact',
                'video'=> null,
                'image'=> null,
                'tour360'=> null,
                'scan'=> null,
                'detail'=> 'CONTACT',
                'detail_vn'=> 'LIÊN HỆ',
                'video_upload'=> null,
                'icon_class'=> null,
                'section_category_id'=> 2,
                'section_id' =>null,
                'created_at' => new DateTime()
            ],
            [

                'title'=> 'Virtual Sales Gallery',
                'title_vn'=> 'SÀN BẤT ĐỘNG SẢN CÔNG NGHỆ 4.0',
                'video'=> null,
                'image'=> null,
                'tour360'=> null,
                'scan'=> null,
                'detail'=> null,
                'detail_vn'=> null,
                'video_upload'=> null,
                'icon_class'=> null,
                'section_category_id'=> 3,
                'section_id' =>null,
                'created_at' => new DateTime()
            ]
        ]);
    }
}
