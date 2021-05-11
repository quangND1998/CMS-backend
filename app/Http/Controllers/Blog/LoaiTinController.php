<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\LoaiTinResource;
use Illuminate\Http\Request;
use App\Models\LoaiTin;
use App\Models\TheLoai;
use Illuminate\Http\Response;
use App\Http\Controllers\Traits\FunctionTrait;

class LoaiTinController extends Controller
{
    use FunctionTrait;
    public function list()
    {
        $loaitin = LoaiTin::all();
        return LoaiTinResource::collection($loaitin);
        
    }



    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'theloai_id' => 'required',
                'Ten' => 'required|unique:loaitin,Ten|min:3|max:100'
            ],
            [
                'theloai_id.required' => 'Vui lòng chọn Thể Loại!',
                'Ten.required' => 'Bạn chưa nhập Tên Loại Tin!',
                'Ten.unique' => 'Tên Loại Tin đã tồn tại, vui lòng nhập tên khác!',
                'Ten.min' => 'Tên Loại Tin gồm ít nhất 3 ký tự!',
                'Ten.max' => 'Tên Loại Tin gồm tối đa 100 ký tự!'
            ]
        );

     
        $loaitin = new LoaiTin;
        $loaitin->idTheLoai = $request->theloai_id;
        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = $this->changeTitle($request->Ten);
        $loaitin->save();

        return new LoaiTinResource($loaitin);
    }

    public function get($id)
    {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::find($id);
        if (!$loaitin) {
            $msg = [
                'msg' => 'The id is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        return new LoaiTinResource($loaitin);
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'theloai_id' => 'required',
                'Ten' => 'required|min:3|max:100'
            ],
            [
                'theloai_id.required' => 'Vui lòng chọn Thể Loại!',
                'Ten.required' => 'Bạn chưa nhập tên Loại Tin!',
                'Ten.unique' => 'Tên Loại Tin đã tồn tại, vui lòng thay đổi tên khác!',
                'Ten.min' => 'Tên Loại Tin gồm ít nhất 3 ký tự!',
                'Ten.max' => 'Tên Loại Tin gồm tối đa 100 ký tự!'
            ]
        );
        $loaitin = LoaiTin::find($id);
        if (!$loaitin) {
            $msg = [
                'msg' => 'The loaitin is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = $this->changeTitle($request->Ten);
        $loaitin->idTheLoai = $request->theloai_id;
        $loaitin->save();

        return new LoaiTinResource($loaitin);
    }

    public function delete($id)
    {
        $loaitin= LoaiTin::find($id);

        if(!$loaitin){
            $msg = [
                'msg' => 'The loaitin is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        $loaitin->Delete();

        return response()->json('Delete Sussessfully', Response::HTTP_OK);
    }
}
