<?php

namespace App\Http\Controllers;

use App\Http\Resources\SessionResource;
use App\Models\Session;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SessionController extends Controller
{
    public function getSession($id)
    {
        $session = Template::with('session')->findOrFail($id);
        $response = [
            'msg' => 'Get List Session sucsscesfully',
            'data' => $session
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:session',
        ]);
        
        $session = new Session();
        $session->name = $request->name;
        $session->text = $request->text;
        
        $session->save();
        return new SessionResource($session);
    }
}
