<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Http\Resources\TemplateResource;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use  App\Http\Controllers\Traits\FileUploadTrait;

class TemplateController extends Controller
{
    use FileUploadTrait;
    public function post(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:template',
            'image' => 'mimes:png,jpg,jpeg',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->failed(), Response::HTTP_BAD_REQUEST);
        }

        $template = new Template();
        $template->name = $request->name;
        if ($request->hasfile('image')) {
            $files = $request->file('image');
            $destinationpath = 'images/template/';
            $template->image = $this->image($files, $destinationpath);
        }
        $template->save();
        return new TemplateResource($template);
    }
    public function get()
    {

        return  TemplateResource::collection(Template::get());
    }
    public function edit($id)
    {
        $template = Template::find($id);
        if (!$template) {
            return response()->json('The template is not found ', Response::HTTP_BAD_REQUEST);
        }

        return new TemplateResource($template);
    }
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image.*' => 'mimes:png,jpg,jpeg',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->failed(), Response::HTTP_BAD_REQUEST);
        }

        $template = Template::find($id);

        if ($template == null) {
            $msg = [
                'msg' => 'The template is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }

        $attribute = $template->image;
        if ($request->hasfile('image')) {
            $files = $request->file('image');
            $destinationpath = 'images/template/';
            $template->image = $this->update_image($files, $destinationpath, $attribute);
        }
        $template->name = $request->name;

        $template->save();

        return new TemplateResource($template);
    }
    public function delete($id)
    {
        $template = Template::find($id);
        if (!$template) {
            $msg = [
                'msg' => 'Delete the template failed'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }

        $image = $template->image;
        $extension = " ";
        $this->DeleteFolder($image, $extension);
        $template->delete();
        return response()->json(' Delet Sussessfully', Response::HTTP_OK);
    }
}
