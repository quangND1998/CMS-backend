<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Http\Resources\TemplateResource;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function post(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $template = new Template();
        $template->name = $request->name;
        $template->save();
        return new TemplateResource($template);
    }
    public function get()
    {

        return  TemplateResource::collection(Template::get());
    }
    public function edit($id)
    {

        return new TemplateResource(Template::findOrFail($id));
    }
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
        ]);


        $template = Template::findOrFail($id);

        $template->update(['name' => $request->name]);

        return new TemplateResource($template);
    }
    public function delete($id)
    {
        $template = Template::findOrFail($id);
        $template->delete();
        return response()->json(' Delet Sussessfully', Response::HTTP_OK);
    }
}
