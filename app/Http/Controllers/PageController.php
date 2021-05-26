<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;

use Illuminate\Http\Response;
use App\Http\Resources\PageResource;
use App\Models\Page;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;
class PageController extends Controller
{
    use FileUploadTrait;
    public function post(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:page',
            'name_vn' => 'required|unique:page',
            'image.*' => 'mimes:jpeg,jpg,png'
        ]);
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|unique:page',
        //     'image.*' => 'mimes:png,jpg,jpeg'
        // ]);

        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        // }

        $page = new Page();
        $page->name = $request->name;
        $page->name_vn = $request->name_vn;
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
        if(!Cache::has('page')){
           
            $page =  Page::get();
     
             Cache::put('page', $page,3600);
         }
         else{
         
             $page = Cache::get('page');
            
         }    
        // $page = Cache::remember('page', 3600, function () {
        //     return Page::get();
        // });
        return  PageResource::collection($page);
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
  
        // $data=  Crypt::encrypt('aaaaaaaaaaa');
        // return $data;
   

        // $data=[
        //     'page' =>$page
        // ];
        // // return Crypt::encrypt(json_encode($data));
        // return $data;
        // return response()->json(Crypt::encrypt(json_encode($data,JSON_UNESCAPED_UNICODE)), Response::HTTP_OK,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        // JSON_UNESCAPED_UNICODE);
        return new PageResource($page);
    }
    public function update(Request $request, $id)
    {


        $this->validate($request, [
            'name' => 'required',
            'name_vn' => 'required',
            'image.*' => 'mimes:jpeg,jpg,png'
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
        $page->name_vn = $request->name_vn;
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
        $extension_video ='mp4';
        $image = $page->image;

            $this->DeleteFolder($image, $extension);
            $sections = $page->section;
            foreach ($sections as $section) {
                foreach ($section->contents as $content) {
                    $this->DeleteFolder($content->image, $extension);
                    $this->DeleteFolder($content->icon_image, $extension);
                    $this->DeleteFolder($content->video_upload, $extension_video);
                }
            }
            foreach ($page->section as $section){
                if ($section->section_category != null) {

                    foreach ($section->section_category as $category) {

                        foreach ($category->contents as $content) {
                            $this->DeleteFolder($content->image, $extension);
                            $this->DeleteFolder($content->icon_image, $extension);
                            $this->DeleteFolder($content->video_upload, $extension_video);
                        }
                    }
                }
            }
           
            $page->delete();
            return response()->json(' Delete Sussessfully', Response::HTTP_OK);
        
    }
}
