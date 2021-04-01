<?php

namespace App\Http\Controllers\APi;

use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',

        ]);
        $credentials = $request->only('email', 'password');



        if (!($token = JWTAuth::attempt($credentials))) {

            return response()->json([
                'status' => 'error',
                'error' => 'invalid.credentials',
                'msg' => 'Invalid Credentials.',
                'errors' => 'Email or password is not match our record'
            ], Response::HTTP_BAD_REQUEST);
        }
        $user = Auth::user();
        $response = [
            'msg' => 'You are logged in!',
            'token' => $token,
            'user_name' => $user->name,

        ];
        return response()->json($response, Response::HTTP_OK);
    }
    public function logout(Request $request)
    {
        $this->validate($request, ['token' => 'required']);
        try {
            JWTAuth::invalidate($request->input('token'));
            return response()->json('You have successfully logged out.', Response::HTTP_OK);
        } catch (JWTException $e) {
            return response()->json('Failed to logout, please try again.', Response::HTTP_BAD_REQUEST);
        }
    }
    public function refresh()
    {
        return response(JWTAuth::getToken(), Response::HTTP_OK);
    }
}
