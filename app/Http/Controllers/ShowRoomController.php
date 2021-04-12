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
        if ($data) {
            return view('landingpage.landingpage', compact('data'));
        } else {
            return redirect('admin/login');
        }
    }
}
