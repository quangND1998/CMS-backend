<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Content;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemController extends Controller
{
    public function getListItem($id)
    {
        $item = Session::with('contents')->find($id);
        if (!$item) {
            return response()->json('The items is not found ', Response::HTTP_BAD_REQUEST);
        } elseif (count($item->contents) == 0) {
            return ItemResource::collection($item->contents);
        } else {
            return ItemResource::collection($item->contents);
        }
    }
}
