<?php

namespace App\Http\Controllers;

use App\Http\Resources\StyleResource;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Style;

class StyleController extends Controller
{
    public function getStyle($id)
    {
        $page = Page::find($id);


        if (!$page) {
            return response()->json('The page is not found ', Response::HTTP_BAD_REQUEST);
        } elseif ($page->style == null) {
            $response = [
                'msg' => 'Style is null',
                'data' => null
            ];
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response = [
                'msg' => 'Get Style sucsscesfully',
                'data' => $page->style
            ];
            return response()->json($response, Response::HTTP_OK);
        }
    }
    public function store(Request $request, $id)
    {

        $page = Page::find($id);
        if (!$page) {
            $msg = [
                'msg' => 'The page is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        if ($page->style) {
            $msg = [
                'msg' => 'style already exsit'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }

        $this->validate($request, [
            'title' => 'required|unique:style',
        ]);



        $style = new Style;
        $style->title = $request->title;
        $style->color = $request->color;
        $style->background_color = $request->background_color;
        $style->font_size = $request->font_size;
        $style->page_id = $page->id;
        $style->save();
        return new StyleResource($style);
    }
    public function edit($id)
    {
        $Style = Style::find($id);
        if (!$Style) {

            $msg = [
                'msg' => 'Style is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        return new StyleResource($Style);
    }
    public function update(Request $request, $id)
    {
        $style = Style::find($id);
        if (!$style) {

            $msg = [
                'msg' => 'style is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        $this->validate($request, [
            'title' => 'required',
        ]);


        $style->title = $request->title;
        $style->color = $request->color;
        $style->background_color = $request->background_color;
        $style->font_size = $request->font_size;
        $style->save();

        return new StyleResource($style);
    }
    public function delete($id)
    {
        $style = Style::find($id);
        if (!$style) {

            $msg = [
                'msg' => 'style is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        $style->delete();
        return response()->json('Delet Sussessfully', Response::HTTP_OK);
    }
}
