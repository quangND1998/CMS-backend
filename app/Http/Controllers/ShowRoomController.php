<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class ShowRoomController extends Controller
{
    public function index()
    {
        $data = Page::with([
            'section',
            'section.contents',
            'section.section_category.contents',
        ])->get();

        return view('landingpage.landingpage', compact('data'));
    }
}
