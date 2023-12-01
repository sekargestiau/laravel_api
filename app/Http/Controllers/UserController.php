<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // function show user profile
    public function index(){
        $user = auth()->user();

        $userData = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ];

        return response()->json([
            'success' => 200,
            'message' => 'Data successfully retrieved!',
            'data' => $userData,
        ], 200);;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'phone'=>'required|string|max:255',
        ]);

        $user = User::find($id);
        if($user){
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->save();

            return response()->json([
                'success' => 201,
                'message' => 'YOUR UPDATE PROFILE IS SUCCESSFUL!',
                'data' => $user,
            ]);
        }else{
            return response()->json([
                'fail' => 500,
                'message' => 'YOUR UPDATE PROFILE IS FAILED!',
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
