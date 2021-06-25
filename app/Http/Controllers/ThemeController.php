<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\ThemeResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Traits\FileUploadTrait;


class ThemeController extends Controller
{
    use FileUploadTrait;
    public function getTheme()
    {
        
        $themes =  Theme::get();
        // $themes = DB::table('theme')->get();
        return  ThemeResource::collection($themes);
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|unique:theme',
            'link_code' => 'required',
            'image_template'=>'required|mimes:png,jpg,jpeg',

        ]);

    
        $theme = new Theme();
        $theme->title = $request->title;
        $theme->link_code = $request->link_code;
        if ($request->hasfile('image_template')) {
            $files = $request->file('image_template');
            $destinationpath = 'images/theme/';
            $theme->image_template = $this->image($files, $destinationpath);
        }
        $theme->type = $request->type;
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
        $this->validate($request, [
            'title' => 'required',
            'link_code' => 'required',
            'image_template.*'=>'mimes:png,jpg,jpeg',

        ]);
        $attribute = $theme->image_template;
        if ($request->hasfile('image_template')) {
            $files = $request->file('image_template');
            $destinationpath = 'images/theme/';
            $theme->image_template = $this->update_image($files, $destinationpath, $attribute);
        }
    
        $theme->title = $request->title;
        $theme->link_code = $request->link_code;
        $theme->type = $request->type;
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
        $extension = " ";
        $image = $theme->image_template;
        $this->DeleteFolder($image, $extension);
        $theme->delete();
        return response()->json('Delet Sussessfully', Response::HTTP_OK);
    }
}
