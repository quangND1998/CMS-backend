<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TinTuc;
use App\Models\TheLoai;
use App\Models\LoaiTin;
use App\Http\Controllers\Traits\FunctionTrait;
use App\Http\Resources\TinTucResource;
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
class TinTucController extends Controller
{
    use FunctionTrait;
	use FileUploadTrait;
    public function list(){
    	$tintuc = TinTuc::all();
    	return TinTucResource::collection($tintuc);
    }

    public function Them(){
    	$theloai = TheLoai::all();
    	$loaitin = LoaiTin::all();
    	return view('admin.tintuc.them',['theloai'=>$theloai, 'loaitin'=>$loaitin]);
    }

    public function store(Request $request){
    	$this->validate($request,
    		[
    			'idLoaiTin'=>'required',
    			'TieuDe' => 'required|unique:tintuc,TieuDe|min:3',
    			'TomTat' => 'required',
				'NoiDung'=> 'required|min:20',

				'TieuDe_en' => 'required|min:3',
    			'TomTat_en' => 'required',
    			'NoiDung_en'=> 'required|min:20',
				'Hinh.*' => 'mimes:png,jpg,jpeg'
    		],
    		[
    			'idLoaiTin.required'=>'Bạn chưa chọn Loại Tin cho Bài viết!',
    			'TieuDe.required'=>'Bạn chưa nhập Tiêu Đề cho Bài viết!',
    			'TieuDe.unique'=>'Tiêu Đề bài viết đã tồn tại!',
    			'TieuDe.min'=>'Tiêu Đề Bài viết gồm ít nhất 3 ký tự!',
    			'TomTat.required'=>'Bạn chưa nhập Tóm tắt cho Bài viết!',
    			'NoiDung.required'=>'Bạn chưa nhập nội dung cho Bài viết!',
    			'NoiDung.min'=>'Bài viết quá ngắn, yêu cầu tối thiểu gồm 20 ký tự trở lên!',
			
    		]);
    	$tintuc = new TinTuc;
    	$tintuc->TieuDe = $request->TieuDe;
    	$tintuc->TieuDeKhongDau = $this->changeTitle($request->TieuDe);
    	$tintuc->TomTat = $request->TomTat;
		$tintuc->NoiDung = $request->NoiDung;

		$tintuc->TieuDe_en = $request->TieuDe_en;
    	$tintuc->TieuDeKhongDau_en = $this->changeTitle($request->TieuDe_en);
    	$tintuc->TomTat_en = $request->TomTat_en;
    	$tintuc->NoiDung_en = $request->NoiDung_en;

		if ($request->hasfile('Hinh')) {
            $files = $request->file('Hinh');
            $destinationpath = 'tintuc/images/';
            $tintuc->Hinh = $this->image($files, $destinationpath);
        }

    	$tintuc->NoiBat = $request->NoiBat;
    	$tintuc->idLoaiTin = $request->idLoaiTin;
    	$tintuc->save();
        return new TinTucResource($tintuc);

    }

    public function get($id){
		$tintuc = TinTuc::find($id);
        if (!$tintuc) {
            $msg = [
                'msg' => 'The tintuc is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }

       
   
        return new TinTucResource($tintuc);
    }

    public function update(Request $request,$id){
    	$tintuc = TinTuc::find($id);
    	$this->validate($request,
    		[
    			'idLoaiTin'=>'required',
    			'TieuDe' => 'required|min:3|unique:tintuc,TieuDe,'.$tintuc->id,
    			'TomTat' => 'required',
				'NoiDung'=> 'required|min:20',
				'Hinh.*' => 'mimes:png,jpg,jpeg'
    		],
    		[
    			
    			'idLoaiTin.required'=>'Bạn chưa chọn Loại Tin cho Bài viết!',
    			'TieuDe.required'=>'Bạn chưa nhập Tiêu Đề cho Bài viết!',
    			'TieuDe.min'=>'Tiêu Đề Bài viết gồm ít nhất 3 ký tự!',
    			'TomTat.required'=>'Bạn chưa nhập Tóm tắt cho Bài viết!',
    			'NoiDung.required'=>'Bạn chưa nhập nội dung cho Bài viết!',
    			'NoiDung.min'=>'Bài viết quá ngắn, yêu cầu tối thiểu gồm 20 ký tự trở lên!',
    		]);

    	$tintuc->TieuDe = $request->TieuDe;
    	$tintuc->TieuDeKhongDau = $this->changeTitle($request->TieuDe);
    	$tintuc->TomTat = $request->TomTat;
    	$tintuc->NoiDung = $request->NoiDung;

		$attribute = $tintuc->Hinh;
        if ($request->hasfile('Hinh')) {
            $files = $request->file('Hinh');
            $destinationpath = 'tintuc/images/';
            $tintuc->Hinh = $this->update_image($files, $destinationpath, $attribute);
        }
    	// Không có else vì nếu người dùng không muốn thay đổi lại hình khác thì vẫn giữ lại đường dẫn hình cũ, gán mặc định như trên sẽ làm mất đường dẫn hình

    	$tintuc->NoiBat = $request->NoiBat;
    	$tintuc->idLoaiTin = $request->idLoaiTin;
    	$tintuc->save();

    	return new TinTucResource($tintuc);
    }

    public function delete($id){
    	$tintuc= TinTuc::find($id);

        if (!$tintuc) {
            $msg = [
                'msg' => 'Delete the tintuc failed'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }

        $image = $tintuc->Hinh;

        $extension = " ";
        $this->DeleteFolder($image, $extension);
   
        $tintuc->delete();
        return response()->json(' Delete Sussessfully', Response::HTTP_OK);
    }
}
