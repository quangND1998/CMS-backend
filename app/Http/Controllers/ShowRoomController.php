<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Section;

class ShowRoomController extends Controller
{
    public function index()
    {
        $data = Page::first();
        $sections = Section::where('page_id', $data->id)->orderBy('number')->get();
     
        // $section = $data->section->orderBy('number')->get();
     
        if ($data) {
            return view('landingpage.landingpage', compact('sections'));
        } else {
            return redirect('admin/login');
        }
    }
}
