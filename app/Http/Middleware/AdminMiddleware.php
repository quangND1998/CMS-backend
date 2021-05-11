<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            if(Auth::user()->quyen == 1){
                return $next($request);
            }
               
            else{
                $msg = "Tài khoản được phép đăng nhập";
                return  response()->json($msg, Response::HTTP_ACCEPTED);
            }

                
        }
        else{
            $msg= "Bạn chưa đăng nhập";
            return  response()->json($msg, Response::HTTP_BAD_REQUEST);
        }
           
    }
    // Nhớ phải khai báo Middleware mới tạo trong Kernel
}
