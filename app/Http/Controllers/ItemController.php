<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Content;
use App\Models\Section;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use  App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Resources\ItemCategoryResource;


class ItemController extends Controller
{
    use FileUploadTrait;
    public function getListItem($id)
    {
        $item = Section::with('contents')->find($id);
        if (!$item) {
            return response()->json('The items is not found ', Response::HTTP_BAD_REQUEST);
        } elseif (count($item->contents) == 0) {
            return ItemResource::collection($item->contents);
        } else {
            return ItemResource::collection($item->contents);
        }
    }




    public function store(Request $request, $id)
    {


        $this->validate($request, [
            'title' => 'required|unique:contents',
            'image.*' => 'mimes:svg,psd,eps,png,jpg',
            // 'icon_image' => 'mimes:svg,psd,eps,png,jpg,'
        ]);


        $section  = Section::find($id);
        if (!$section) {
            $msg = [
                'msg' => 'The id is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }

        $item = new Content();
        $item->title = $request->title;
        $item->title_vn = $request->title_vn;
        $item->video = $request->video;
        $item->tour360 = $request->tour360;
        $item->scan = $request->scan;
        $item->detail = $request->detail;
        $item->detail_vn = $request->detail_vn;
        $item->icon_class = $request->icon_class;

        if ($request->hasfile('image')) {
            $files = $request->file('image');
            $destinationpath = 'images/content/';
            $item->image = $this->image($files, $destinationpath);
        }
        if ($request->hasfile('video_upload')) {
            $files = $request->file('video_upload');
            $destinationpath = 'video/';
            $item->video_upload = $this->image($files, $destinationpath);
        }
      
        $item->section_id = $section->id;
        $item->save();
        return new ItemResource($item);
    }
    public function edit($id)
    {
        $item  = Content::find($id);
        if (!$item) {
            $msg = [
                'msg' => 'The item is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        return new ItemResource($item);
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required',
            'image.*' => 'mimes:svg,png,jpg,jpeg',
            // 'icon_image.*' => 'mimes:svg,psd,eps,png,jpg,'
        ]);
        $item  = Content::find($id);
        if (!$item) {
            $msg = [
                'msg' => 'The item is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        $item->title = $request->title;
        $item->title_vn = $request->title_vn;
        $item->video = $request->video;
        $item->tour360 = $request->tour360;
        $item->scan = $request->scan;
        $item->detail = $request->detail;
        $item->detail_vn = $request->detail_vn;
        $item->icon_class = $request->icon_class;

        if ($request->hasfile('image')) {
            $files = $request->file('image');
            $destinationpath = 'images/content/';
            $attribute = $item->image;
            $item->image = $this->update_image($files, $destinationpath, $attribute);
        }
        if ($request->hasfile('video_upload')) {
            $files = $request->file('video_upload');
            $destinationpath = 'video/';
            $attribute = $item->video_upload;
            $item->video_upload = $this->update_image($files, $destinationpath, $attribute);
        }
        $item->save();
        if ($item->section_id) {
            return new ItemResource($item);
        } else {
            return new  ItemCategoryResource($item);
        }
    }
    public function delete($id)
    {
        $item = Content::find($id);
        if (!$item) {
            $msg = [
                'msg' => 'Delete the item failed'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }

        $image = $item->image;
        $icon_image = $item->icon_image;
        $icon_image = $item->video_upload;
        $extension = " ";
        $extension1= "mp4 ";
        $this->DeleteFolder($image, $extension);
        $this->DeleteFolder($icon_image, $extension);
        $this->DeleteFolder($icon_image, $extension1);
        $item->delete();
        return response()->json(' Delete Sussessfully', Response::HTTP_OK);
    }
}
