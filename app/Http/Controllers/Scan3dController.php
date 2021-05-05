<?php

namespace App\Http\Controllers;

use App\Http\Resources\Scan3dResource;
use App\Models\Scan3d;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Scan3dController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scan3ds = Scan3d::all();
        // return Scan3dResource::collection(Scan3d::get());
        return json_encode($scan3ds);
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
            'name' => 'required|unique:scan3d',
            'title' => 'required|unique:scan3d',
            'favicon.*' => 'mimes:png,jpg,jpeg',
            'model_code' => 'required|unique:scan3d'
        ]);
        $scan3d = new Scan3d();
        $scan3d->name = $request->name;
        $scan3d->title = $request->title;
        $scan3d->model_code = $request->model_code;
        $scan3d->slug = Str::slug($request->name, '-');
        if ($request->hasFile('favicon')) {
            $file = $request->favicon;
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move('images/scan3D', $fileName);
            $scan3d->favicon = '/images/scan3D/'.$fileName;
        }

        $scan3d->save();

        return json_encode($scan3d);
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
        //
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
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'favicon.*' => 'mimes:png,jpg,jpeg',
            'model_code' => 'required'
        ]);
        $scan3d = Scan3d::find($id);
        $scan3d->name = $request->name;
        $scan3d->title = $request->title;
        $scan3d->model_code = $request->model_code;
        $scan3d->slug = Str::slug($request->name, '-');
        $faviconPath = Str::of($scan3d->favicon)->ltrim('/');
      
        if ($request->hasFile('favicon')) {
            $file = $request->favicon;
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move('images/scan3D', $fileName);
            $scan3d->favicon = '/images/scan3D/' . $fileName;
            unlink($faviconPath);
        }

        $scan3d->save();

        return json_encode($scan3d);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scan3d = Scan3d::find($id);
        $scan3d->delete();
    }
}