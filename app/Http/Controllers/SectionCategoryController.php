<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Http\Resources\SectionCategoryResource;
use App\Models\Section_Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use  App\Http\Controllers\Traits\FileUploadTrait;
use App\Models\Content;
use App\Http\Resources\ItemCategoryResource;
use Illuminate\Support\Facades\Cache;
class SectionCategoryController extends Controller
{
    use FileUploadTrait;
    public function getSectionCateGory($id)
    {
        $section = Section::with('section_category')->find($id);
        if (!$section) {
            return response()->json('The items is not found ', Response::HTTP_BAD_REQUEST);
        } elseif (count($section->section_category) == 0) {
            return SectionCategoryResource::collection($section->section_category);
        } else {
            return SectionCategoryResource::collection($section->section_category);
        }
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|unique:section_category',

            // 'icon_image' => 'mimes:svg,psd,eps,png,jpg,'
        ]);
        $section  = Section::find($id);
        if (!$section) {
            $msg = [
                'msg' => 'The id is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        $section_category = new Section_Category();
        $section_category->title = $request->title;
        $section_category->title_vn = $request->title_vn;
        $section_category->type = $request->type;
        $section_category->section_id = $section->id;
        $section_category->save();
        return new SectionCategoryResource($section_category);
    }


    public function edit($id)
    {
        $section_category  = Section_Category::find($id);
        if (!$section_category) {
            $msg = [
                'msg' => 'The section_category is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        return new SectionCategoryResource($section_category);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',

        ]);
        $section_category  = Section_Category::find($id);
        if (!$section_category) {
            $msg = [
                'msg' => 'The section_category is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        $section_category->title = $request->title;
        $section_category->title_vn = $request->title_vn;
        $section_category->type = $request->type;
        $section_category->save();
        return new SectionCategoryResource($section_category);
    }

    public function delete($id)
    {
        $section_category  = Section_Category::find($id);
        $extension = " ";
        if (!$section_category) {
            $msg = [
                'msg' => 'The section_category is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        foreach ($section_category->contents as $content) {
            $this->DeleteFolder($content->image, $extension);
            $this->DeleteFolder($content->icon_image, $extension);
        }
        $section_category->delete();
        return response()->json('Delet Sussessfully', Response::HTTP_OK);
    }


    public function getItembySectionCateGory($id)
    {
    

        $item = Cache::remember("item_category.{$id}", 3600, function () use ($id) {
            return Section_Category::with('contents')->find($id);
        });

        if (!$item) {
            return response()->json('The items is not found ', Response::HTTP_BAD_REQUEST);
        } elseif (count($item->contents) == 0) {
            return ItemCategoryResource::collection($item->contents);
        } else {
            return ItemCategoryResource::collection($item->contents);
        }
    }


    public function storebySectionCategory(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required|unique:contents',
            'title_vn' => 'required|unique:contents',
            'image.*' => 'mimes:svg,psd,eps,png,jpg',
            // 'icon_image' => 'mimes:svg,psd,eps,png,jpg,'
        ]);


        $section_category  = Section_Category::find($id);
        if (!$section_category) {
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
        $item->section_category_id = $section_category->id;
        $item->save();
        return new ItemCategoryResource($item);
    }
}
