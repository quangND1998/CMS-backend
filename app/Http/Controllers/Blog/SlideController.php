<?php

namespace App\Http\Controllers\Blog;

use App\Models\Slide;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Resources\SlideResource;

class SlideController extends Controller
{
    use FileUploadTrait;
    public function list()
    {
        $slide = Slide::all();
        return SlideResource::collection($slide);
    }

    public function Them()
    {
        return view('admin.slide.them');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'slide_name' => 'required|min:6|max:40',
                'slide_content' => 'required|min:10|max:100',
                'slide_img' => 'mimes:png,jpg,jpeg'
            ],
            [
                'slide_name.required' => 'Bạn chưa nhập Tên Slide',
                'slide_name.min' => 'Tên Slide gồm ít nhất 6 ký tự',
                'slide_name.max' => 'Tên Slide không được vượt quá 40 ký tự',
                'slide_content.required' => 'Bạn chưa nhập Nội Dung cho Slide',
                'slide_content.min' => 'Nội Dung Slide gồm tối thiểu 10 ký tự',
                'slide_content.max' => 'Nội Dung Slide không được vượt quá 100 ký tự'
            ]
        );
        $slide = new Slide();
        $slide->Ten = $request->slide_name;
        $slide->NoiDung = $request->slide_content;
        if ($request->has('slide_url'))
            $slide->link = $request->slide_url;

        if ($request->hasfile('slide_img')) {
            $files = $request->file('slide_img');
            $destinationpath = 'slides/images/';
            $slide->Hinh = $this->image($files, $destinationpath);
        }

        $slide->save();

        return new SlideResource($slide);
    }

    public function get($id)
    {
        $slide = Slide::find($id);

        if (!$slide) {
            $msg = [
                'msg' => 'The slide is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        return new SlideResource($slide);
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'slide_name' => 'required|min:6|max:40',
                'slide_content' => 'required|min:10|max:100',
                'slide_img' => 'mimes:png,jpg,jpeg'
            ],
            [
                'slide_name.required' => 'Bạn chưa nhập Tên Slide',
                'slide_name.min' => 'Tên Slide gồm ít nhất 6 ký tự',
                'slide_name.max' => 'Tên Slide không được vượt quá 40 ký tự',
                'slide_content.required' => 'Bạn chưa nhập Nội Dung cho Slide',
                'slide_content.min' => 'Nội Dung Slide gồm tối thiểu 10 ký tự',
                'slide_content.max' => 'Nội Dung Slide không được vượt quá 100 ký tự'
            ]
        );
        $slide = Slide::find($id);
        $slide->Ten = $request->slide_name;
        $slide->NoiDung = $request->slide_content;
        if ($request->has('slide_url'))
            $slide->link = $request->slide_url;

      
		$attribute = $slide->Hinh;
        if ($request->hasfile('slide_img')) {
            $files = $request->file('slide_img');
            $destinationpath = 'slides/images/';
            $slide->Hinh = $this->update_image($files, $destinationpath, $attribute);
        }

        $slide->save();

        return new SlideResource($slide);
    }

    public function delete($id)
    {
   
        $slide=   Slide::find($id);

        if (!$slide) {
            $msg = [
                'msg' => 'Delete the slide failed'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }

        $image = $slide->Hinh;

        $extension = " ";
        $this->DeleteFolder($image, $extension);
   
        $slide->delete();
        return response()->json(' Delete Sussessfully', Response::HTTP_OK);
    }
}
