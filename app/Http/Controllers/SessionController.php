<?php

namespace App\Http\Controllers;

use App\Http\Resources\SessionResource;
use App\Models\Session;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use  App\Http\Controllers\Traits\FileUploadTrait;

class SessionController extends Controller
{
    use FileUploadTrait;
    public function getSession($id)
    {
        $session = Template::with('session')->find($id);
        if (!$session) {
            return response()->json('The session is not found ', Response::HTTP_BAD_REQUEST);
        }
        $response = [
            'msg' => 'Get List Session sucsscesfully',
            'data' => $session
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:session',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->failed(), Response::HTTP_BAD_REQUEST);
        }
        $template = Template::find($id);
        if (!$template) {
            $msg = [
                'msg' => 'The template is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        } else {
            $session = new Session();
            $session->title = $request->title;
            $session->text = $request->text;
            $session->sub_title = $request->sub_title;
            $session->template_id = $template->id;
            $session->save();
        }
        return new SessionResource($session);
    }
    public function edit($id)
    {
        $session = Session::find($id);
        if (!$session) {
            $msg = [
                'msg' => 'The session is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        return new SessionResource($session);
    }
    public function update(Request $request, $id)
    {
        $session = Session::find($id);
        if (!$session) {
            $msg = [
                'msg' => 'The session is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        $session->title = $request->title;
        $session->text = $request->text;
        $session->sub_title = $request->sub_title;
        $session->save();
        return new SessionResource($session);
    }
    public function delete($id){
        $session = Session::find($id);
        if (!$session) {
            $msg = [
                'msg' => 'Delete session  is not working'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        $session->delete();
        return response()->json('Delet Sussessfully', Response::HTTP_OK);
    }
}
