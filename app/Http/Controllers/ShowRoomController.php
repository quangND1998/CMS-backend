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
        ])->first();

   

        return view('landingpage.landingpage', compact('data'));
    }
}
