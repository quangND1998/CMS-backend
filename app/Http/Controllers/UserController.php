<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use Illuminate\Http\Response;
class UserController extends Controller
{
    public function getDanhSach(){
    	$user = User::all();
    	return UserResource::collection($user);
    }

    public function Them(){
    	return view('admin.user.them');
    }

    public function XuLyThemUser(Request $request){
    	$this->validate($request,
    		[
    			'username' => 'required|min:3|max:50',
    			'email' => 'required|email|unique:users,email',
    			'password' => 'required|min:6|max:32',
    			'password_again' => 'required|same:password'
    		],
    		[
    			'username.required' => 'Bạn chưa nhập Tên tài khoản!',
    			'username.min' => 'Tên tài khoản gồm tối thiểu 3 ký tự!',
    			'username.max' => 'Tên tài khoản không được vượt quá 50 ký tự!',
    			'email.required' => 'Bạn chưa nhập địa chỉ Email!',
    			'email.email' => 'Bạn chưa nhập đúng định dạng Email!',
    			'email.unique' => 'Địa chỉ Email đã tồn tại!',
    			'password.required' => 'Bạn chưa nhập mật khẩu!',
    			'password.min' => 'Mật khẩu gồm tối thiểu 6 ký tự!',
    			'password.max' => 'Mật khẩu không được vượt quá 32 ký tự!',
    			'password_again.required' => 'Bạn chưa xác nhận mật khẩu!',
    			'password_again.same' => 'Mật khẩu xác nhận chưa khớp với mật khẩu đã nhập!'
    		]);

    	$user = new User;
    	$user->name = $request->username;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password_again);
    	$user->quyen = $request->account_type;

    	$user->save();
    	return new UserResource($user);
    }

    public function Sua($id){
    	$user = User::find($id);
		if (!$user) {
            $msg = [
                'msg' => 'The user is not found'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }

        return new UserResource($user);
    }

    public function XuLySuaUser(Request $request,$id){
    	$this->validate($request,
    		[
    			'username' => 'required|min:3|max:50',
    		],
    		[
    			'username.required' => 'Bạn chưa nhập Tên tài khoản!',
    			'username.min' => 'Tên tài khoản gồm tối thiểu 3 ký tự!',
    			'username.max' => 'Tên tài khoản không được vượt quá 50 ký tự!',
    		]);

    	$user = User::find($id);
    	$user->name = $request->username;
    	if($request->has('password'))
    	{
    		$this->validate($request,
    		[
    			'password' => 'required|min:6|max:32',
    			'password_again' => 'required|same:password'
    		],
    		[
    			'password.required' => 'Bạn chưa nhập mật khẩu!',
    			'password.min' => 'Mật khẩu gồm tối thiểu 6 ký tự!',
    			'password.max' => 'Mật khẩu không được vượt quá 32 ký tự!',
    			'password_again.required' => 'Bạn chưa xác nhận mật khẩu!',
    			'password_again.same' => 'Mật khẩu xác nhận chưa khớp với mật khẩu đã nhập!'
    		]);
    		$user->password = bcrypt($request->password_again);
    	}
    	$user->quyen = $request->account_type;

    	$user->save();
		return new UserResource($user);
    }

    public function Xoa($id){
        $user = User::find($id);
		if (!$user) {
            $msg = [
                'msg' => 'Delete the user failed'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
        $user->Comment()->delete();
    	$user->delete();
		return response()->json(' Delete Sussessfully', Response::HTTP_OK);
    }

    public function Login(){
        if(Auth::user())
            return redirect('admin/');
        else
            return view('admin.login');
    }

    public function LoginAuth(Request $request){
        $this->validate($request,
            [
                'email' => 'required',
                'password' => 'required|min:6|max:32'
            ],
            [
                'email.required' => 'Bạn chưa nhập Địa chỉ Email!',
                'password.required' => 'Bạn chưa nhập Mật khẩu!',
                'password.min' => 'Mật Khẩu gồm tối thiểu 6 ký tự!',
                'password.max' => 'Mật Khẩu gồm tối đa 32 ký tự!'
            ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            return redirect('admin/');
        else
            return redirect('admin/login')->with('message','Đăng Nhập không thành công!');
    }

}
