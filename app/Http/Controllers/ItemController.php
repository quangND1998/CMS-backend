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
            'image' => 'image',
            'icon_image.*' => 'mimes:svg,psd,eps,png,jpg,'
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
        $item->video = $request->video;
        $item->subtitle = $request->subtitle;
        $item->short_content = $request->short_content;
        $item->detail = $request->detail;
        $item->icon_class = $request->icon_class;
        if ($request->hasfile('image')) {
            $files = $request->file('image');
            $destinationpath = 'images/content/';
            $item->image = $this->image($files, $destinationpath);
        }
        if ($request->hasfile('icon_image')) {
            $files = $request->file('icon_image');
            $destinationpath = 'images/icon/';
            $item->icon_image = $this->image($files, $destinationpath);
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
            'image.*' => 'mimes:png,jpg,jpeg',
            'icon_image.*' => 'mimes:svg,psd,eps,png,jpg,'
        ]);
        $item  = Content::find($id);
        if (!$item) {
            $msg = [
                'msg' => 'The item is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        $item->title = $request->title;
        $item->video = $request->video;
        $item->subtitle = $request->subtitle;
        $item->short_content = $request->short_content;
        $item->detail = $request->detail;
        $item->icon_class = $request->icon_class;
        if ($request->hasfile('image')) {
            $files = $request->file('image');
            $destinationpath = 'images/content/';
            $attribute = $item->image;
            $item->image = $this->update_image($files, $destinationpath, $attribute);
        }
        if ($request->hasfile('icon_image')) {
            $files = $request->file('icon_image');
            $destinationpath = 'images/icon/';
            $attribute = $item->icon_image;
            $item->icon_image = $this->update_image($files, $destinationpath, $attribute);
        }
        $item->save();
        return new ItemResource($item);
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
        $extension = " ";
        $this->DeleteFolder($image, $extension);
        $this->DeleteFolder($icon_image, $extension);
        $item->delete();
        return response()->json(' Delete Sussessfully', Response::HTTP_OK);
    }
}
