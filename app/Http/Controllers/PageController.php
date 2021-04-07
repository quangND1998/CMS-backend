<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use App\Http\Resources\PageResource;
use App\Models\Page;
use App\Http\Requests\TemplateUpdateRequest;
use App\Events\PageSent;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    use FileUploadTrait;
    public function post(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:page',
            // 'image.*' => 'mimes:png,jpg,jpeg'
        ]);
        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        // }

        $page = new Page();
        $page->name = $request->name;
        if ($request->hasfile('image')) {
            $files = $request->file('image');
            $destinationpath = 'images/page/';
            $page->image = $this->image($files, $destinationpath);
        }
        $page->description = $request->description;
        $page->save();

        return new PageResource($page);
    }
    public function get()
    {

            return  PageResource::collection(Page::get());

    }
    public function edit($id)
    {
        $page = Page::find($id);
        if (!$page) {
            $msg = [
                'msg' => 'The page is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }

        return new PageResource($page);
    }
    public function update(Request $request, $id)
    {


        $this->validate($request, [
            'name' => 'required',
            // 'image.*' => 'mimes:png,jpg,jpeg',
        ]);


        $page = Page::find($id);

        if ($page == null) {
            $msg = [
                'msg' => 'The page is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }

        $attribute = $page->image;
        if ($request->hasfile('image')) {
            $files = $request->file('image');
            $destinationpath = 'images/page/';
            $page->image = $this->update_image($files, $destinationpath, $attribute);
        }
        $page->name = $request->name;
        $page->description = $request->description;
        $page->save();

        return new PageResource($page);
    }
    public function delete($id)
    {
        $page = Page::find($id);
        if (!$page) {
            $msg = [
                'msg' => 'Delete the page failed'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        $extension = " ";
        $image = $page->image;
        if ($image != null) {
            $this->DeleteFolder($image, $extension);
            $sections = $page->section;
            foreach ($sections as $section) {
                foreach ($section->contents as $content) {
                    $this->DeleteFolder($content->image, $extension);
                    $this->DeleteFolder($content->icon_image, $extension);
                }
            }
            $page->delete();
            return response()->json(' Delete Sussessfully', Response::HTTP_OK);
        } else {
            $page->delete();
            return response()->json(' Delete Sussessfully', Response::HTTP_OK);
        }
    }
}