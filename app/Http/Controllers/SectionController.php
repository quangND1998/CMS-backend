<?php

namespace App\Http\Controllers;

use App\Http\Resources\SectionResource;
use App\Models\Session;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use  App\Http\Controllers\Traits\FileUploadTrait;
use App\Models\Section;
use App\Events\PageSent;

class SectionController extends Controller
{
    use FileUploadTrait;
    public function getSession($id)
    {
        $section = Page::with('section')->find($id);
        if (!$section) {
            $msg = [
                'msg' => "The id is not found "
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        $response = [
            'msg' => 'Get List section sucsscesfully',
            'data' => $section
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function store(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required|unique:section',
        ]);
        // $validator = Validator::make($request->all(), [
        //     'title' => 'required|unique:section',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        // }
        $page = Page::find($id);
        if (!$page) {
            $msg = [
                'msg' => 'The template is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        } else {
            $section = new Section();
            $section->title = $request->title;
            $section->text = $request->text;
            $section->sub_title = $request->sub_title;
            $section->page_id = $page->id;
            $section->save();
        }
        broadcast(new PageSent($section))->toOthers();
        return new SectionResource($section);
    }
    public function edit($id)
    {
        $section = Section::find($id);
        if (!$section) {
            $msg = [
                'msg' => 'The section is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        return new SectionResource($section);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $section = Section::find($id);
        if (!$section) {
            $msg = [
                'msg' => 'The section is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }

        $section->title = $request->title;
        $section->text = $request->text;
        $section->sub_title = $request->sub_title;
        $section->save();
        return new SectionResource($section);
    }
    public function delete($id)
    {
        $section = Section::find($id);
        $extension = " ";
        if (!$section) {
            $msg = [
                'msg' => 'Delete section  is not working'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        foreach ($section->contents as $content) {
            $this->DeleteFolder($content->image, $extension);
            $this->DeleteFolder($content->icon_image, $extension);
        }
        if ($section->section_category != null) {
            foreach ($section->section_category as $category) {
                foreach ($category as $item) {
                    $this->DeleteFolder($item->image, $extension);
                    $this->DeleteFolder($item->icon_image, $extension);
                }
            }
        }
        $section->delete();
        return response()->json('Delet Sussessfully', Response::HTTP_OK);
    }
}
