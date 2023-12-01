<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Collectors;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // function register for API
    protected function registerApi(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['required', 'string'],
        ]);

        if ($validated->fails()) {
            $failed = $validated->errors()->all();
            return response()->json([
                'fail' => 500,
                'message' => $failed
            ]);
        } else {
            $data = $request->all();
            $data['role'] = 'user';

            $user = User::create(array_merge($data, [
                'password' => bcrypt($request->password)
            ]));

            if ($user) {
                return response()->json([
                    'success' => 201,
                    'message' => 'YOUR REGISTRATION IS SUCCESSFUL!',
                    'user' => $user
                ]);
            } else {
                return response()->json([
                    'fail' => 500,
                    'message' => 'YOUR REGISTRATION IS FAILED!',
                ]);
            }
        }
    }

    // function register for API
    protected function registerApi_Collector(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['required', 'string'],
        ]);

        if ($validated->fails()) {
            $failed = $validated->errors()->all();
            return response()->json([
                'fail' => 500,
                'message' => $failed
            ]);
        } else {
            $data = $request->all();
            $data['role'] = 'collector';

            $user = User::create(array_merge($data, [
                'password' => bcrypt($request->password)
            ]));

            if ($user) {
                $userId = $user->id;

                $collector = Collectors::create([
                    'user_id' => $userId
                ]);

                return response()->json([
                    'success' => 201,
                    'message' => 'YOUR REGISTRATION IS SUCCESSFUL!',
                    'user' => $user,
                    'collector' => $collector
                ]);
            } else {
                return response()->json([
                    'fail' => 500,
                    'message' => 'YOUR REGISTRATION IS FAILED!',
                ]);
            }
        }
    }

    // function for login API
    protected function loginApi(Request $request){
        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if(Auth::attempt($loginData)) {
            $token = Auth::user()->createToken('authToken')->plainTextToken;
            return response()->json([
                'success' => '200',
                'data' => Auth::user(), 
                'token'=> $token,
            ], 200);
        }
        return response()->json([
            'fail' => '401',
            'messages' => 'Invalid credentials',
        ], 401);
    }

    // function for logout API
    public function logoutApi(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => 200,
            'message' => 'Logout successful!',
        ], 200);
    }

}
