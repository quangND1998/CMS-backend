<?php

namespace App\Http\Controllers;

use App\Http\Resources\Scan3dResource;
use App\Models\Scan3d;
use Illuminate\Http\Request;

class Scan3dController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Scan3dResource::collection(Scan3d::get());
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
        $scan3d = new Scan3d();
        $scan3d->name = $request->name;
        $scan3d->title = $request->title;
        $scan3d->model_code = $request->model_code;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}