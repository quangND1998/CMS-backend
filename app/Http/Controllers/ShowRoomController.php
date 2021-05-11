<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Section;
use App\Models\TheLoai;
use App\Models\Slide;
use App\Models\LoaiTin;
use App\Models\TinTuc;

class ShowRoomController extends Controller
{
    public function index()
    {
        $data = Page::first();
        if ($data) {
            $sections = Section::where('page_id', $data->id)->orderBy('number')->get();
            // return $sections;
            // $section = $data->section->orderBy('number')->get();
            $blog  = [
                'theloai' => TheLoai::all(),
                'slide' => Slide::all()
            ];
            return view('landingpage.landingpage', compact('sections','blog'));
        } else {
            return redirect('admin/login');
        }
    }
    public function LoaiTin($unsigned_name){
    	$loaitin = LoaiTin::where('TenKhongDau',$unsigned_name)->first(); // first dùng để lấy một dữ liệu duy nhất, get dùng để lấy nhiều dòng dữ liệu.
    	$tintuc = TinTuc::where('idLoaiTin',$loaitin->id)->paginate(5);
    	return view('page.category',['loaitin' => $loaitin, 'tintuc' => $tintuc]);
    }

    public function TinTuc($unsigned_name){
    	$tintuc = TinTuc::where('TieuDeKhongDau',$unsigned_name)->first();
    	$tinnoibat = TinTuc::where('NoiBat',1)->take(4)->get();
    	$tinlienquan = TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->get();
    	return view('client.news.detail',['tintuc' => $tintuc, 'tinnoibat' => $tinnoibat, 'tinlienquan' => $tinlienquan]);
    }
}