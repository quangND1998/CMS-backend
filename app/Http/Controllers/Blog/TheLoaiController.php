<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\TheLoaiResource;
use Illuminate\Http\Request;
use App\Models\TheLoai;
use Illuminate\Http\Response;
use App\Http\Controllers\Traits\FunctionTrait;

class TheLoaiController extends Controller
{    //
    use FunctionTrait;
    
    public function list(){
    	$theloai = TheLoai::all();
    	return TheLoaiResource::collection($theloai);
    }

    // public function Them(){
    // 	return view('admin.theloai.them');
    // }

    public function store(Request $request){
    	// Kiểm tra dữ liệu đầu vào (không được rỗng, giới hạn của dữ liệu được nhập)
    	$this->validate($request,
    		[
    			'Ten'=>'required|unique:theloai,Ten|min:3|max:100'
    			// Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
    			// Cú pháp của unique:tên_bảng,tên_cột
    		],
    		[
    			'Ten.required'=>'Bạn chưa nhập tên Thể Loại!',
    			'Ten.unique' => 'Tên Thể Loại đã tồn tại, vui lòng nhập lại!',
    			'Ten.min'=>'Tên Thể Loại gồm ít nhất 3 ký tự!',
    			'Ten.max'=>'Tên Thể Loại gồm tối đa 100 ký tự!'
    		]);

    	// Thêm dữ liệu vào CSDL, ở đây 1 record dữ liệu được xem như một đối tượng (object), vì ta sử dụng Eloquent nên tất cả các bảng trong CSDL đã được ánh xạ thành Model trong Laravel. Do đó dữ liệu mới được thêm vào bằng cách tạo 1 đối tượng mới.

    	$theloai = new TheLoai;
    	$theloai->Ten = $request->Ten;
    	$theloai->TenKhongDau = $this->changeTitle($request->Ten);
    	$theloai->save();
        return new TheLoaiResource($theloai);
    }

    public function get($id){
    	// Khi người dùng gửi request lên server như form chẳng hạn thì mới dùng request để nhận dữ liệu, bình thường ta dùng biến bình thường.

    	$theloai = TheLoai::find($id);
        if (!$theloai) {
            $msg = [
                'msg' => 'The item is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        return new TheLoaiResource($theloai);
    }

    public function update(Request $request,$id){
    	
  
        $theloai = TheLoai::find($id);
          	$this->validate($request,
    		[
    			'Ten' => 'required|min:3|max:100|unique:theloai,Ten,'.$theloai->id
    		],
    		[
    			'Ten.required' => 'Bạn chưa nhập tên Thể Loại!',
    			'Ten.unique' => 'Tên Thể Loại đã tồn tại, vui lòng nhập lại!!',
    			'Ten.min' => 'Tên Thể Loại gồm ít nhất 3 ký tự!',
    			'Ten.max' => 'Tên Thể Loại gồm tối đa 100 ký tự!'
    		]);
        if (!$theloai) {
            $msg = [
                'msg' => 'The item is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
    	$theloai->Ten = $request->Ten;
    	$theloai->TenKhongDau =$this->changeTitle($request->Ten);
    	$theloai->save();

    	return new TheLoaiResource($theloai);
    }

    public function delete($id){
    	$theloai = TheLoai::find($id);
        if(!$theloai){
            $msg = [
                'msg' => 'The item is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        $theloai->Delete();

        return response()->json(' Delete Sussessfully', Response::HTTP_OK);
    }
}
