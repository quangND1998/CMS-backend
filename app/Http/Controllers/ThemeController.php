<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\ThemeResource;
use Illuminate\Support\Facades\Validator;

class ThemeController extends Controller
{
    public function getTheme($id)
    {
        $section = Section::find($id);

        if (!$section) {
            return response()->json('The section is not found ', Response::HTTP_BAD_REQUEST);
        } elseif ($section->theme == null) {
            $response = [
                'msg' => 'Theme is null',
                'data' => null
            ];
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response = [
                'msg' => 'Get Theme sucsscesfully',
                'data' => $section->theme
            ];
            return response()->json($response, Response::HTTP_OK);
        }
    }
    public function store(Request $request, $id)
    {

        $section = Section::find($id);
        if (!$section) {
            $msg = [
                'msg' => 'The section is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        if ($section->theme) {
            $msg = [
                'msg' => 'Theme already exsit'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:theme',
            'link_code' => 'required',


        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        }

        $theme = new Theme();
        $theme->title = $request->title;
        $theme->link_code = $request->link_code;
        $theme->description = $request->description;
        $theme->section_id = $section->id;
        $theme->save();
        return new ThemeResource($theme);
    }
    public function edit($id)
    {
        $theme = Theme::find($id);
        if (!$theme) {

            $msg = [
                'msg' => 'Theme is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        return new ThemeResource($theme);
    }
    public function update(Request $request, $id)
    {
        $theme = Theme::find($id);
        if (!$theme) {

            $msg = [
                'msg' => 'Theme is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required',

            'link_code' => 'required',


        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        }
        $theme->title = $request->title;
        $theme->link_code = $request->link_code;
        $theme->description = $request->description;
        $theme->save();

        return new ThemeResource($theme);
    }
    public function delete($id)
    {
        $theme = Theme::find($id);
        if (!$theme) {

            $msg = [
                'msg' => 'Theme is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        $theme->delete();
        return response()->json('Delet Sussessfully', Response::HTTP_OK);
    }
}
