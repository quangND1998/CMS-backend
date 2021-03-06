<?php

namespace App\Http\Controllers;

use App\Http\Resources\ThumbnailResource;
use App\Models\Thumbnail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
class ThumbnailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ThumbnailResource::collection(Thumbnail::get());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:thumbnails',
            'thumbnail' => 'mimes:jpeg,jpg,png'
        ]);
        $thumb = new Thumbnail();
        $thumb->name = $request->name;
        if ($request->hasFile('thumbnail')) {
            $file = $request->thumbnail;
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move('images/thumbs', $fileName);
            $thumb->thumbnail = '/images/thumbs/'.$fileName;
        }

        $thumb->save();

        // return json_encode($thumb);
        return new ThumbnailResource($thumb);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thumb = Thumbnail::find($id);
        return json_encode($thumb);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
       
        $thumb = Thumbnail::find($id);
        $this->validate($request, [
            'name' => 'required|unique:thumbnails,name,'.$thumb->id,
            'thumbnail.*' => 'mimes:jpeg,jpg,png'
        ]);
        if ($thumb == null) {
            $msg = [
                'msg' => 'The pathumbge is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }

        $thumb->name = $request->name;
        $thumbPath = Str::of($thumb->thumbnail)->ltrim('/');
      
        if ($request->hasFile('thumbnail')) {
            $file = $request->thumbnail;
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move('images/thumbs', $fileName);
            $thumb->thumbnail = '/images/thumbs/' . $fileName;
            unlink($thumbPath);
        }

        $thumb->save();
        return new ThumbnailResource($thumb);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thumb = Thumbnail::find($id);
        $thumbPath = Str::of($thumb->thumbnail)->ltrim('/');
        unlink($thumbPath);
        $thumb->delete();
    }
}