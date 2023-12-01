<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Collectors;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CollectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // function show all data content
    public function index()
    {
        $collectors = Collectors::all(); 
        return response()->json([
            'success' => 200,
            'message' => 'Data successfully retrieved!',
            'data' => $collectors,
        ], 200);
    }

    // function show content based on id
    public function show2($id)
    {
        
        $collector = Collectors::with('user')
                        ->find($id);

        if ($collector) {
            return response()->json([
                'success' => true,
                'message' => 'Data successfully retrieved!',
                'data' => $collector,
            ], 200);
        } else {
            return response()->json([
                'fail' => true,
                'message' => 'Collector not found!',
            ], 404);
        }
    }

    public function show($id)
    {
        $userId = Auth::user()->id;

        $collector = Collectors::with('user')
                        ->where('id', $id)
                        ->where('user_id', $userId)
                        ->first();

        if ($collector) {
            return response()->json([
                'success' => true,
                'message' => 'Data successfully retrieved!',
                'data user' => $collector->user,
                'drop_latitude' => $collector->drop_latitude,
                'drop_longitude' => $collector->drop_longitude,
                'current_latitude' => $collector->current_latitude,
                'current_longitude' => $collector->current_longitude, 
            ], 200);
        } else {
            return response()->json([
                'fail' => true,
                'message' => 'Collector not found for the logged-in user!',
            ], 404);
        }
    }


    public function show_detail()
    {
        $userId = Auth::user()->id;

        $collector = Collectors::with('user')->where('user_id', $userId)->first();

        if ($collector) {
            $userData = $collector->user;

            return response()->json([
                'success' => 200,
                'message' => 'Data successfully retrieved!',
                'data' => [
                    'collector' => $collector,
                    'user_data' => $userData
                ],
            ], 200);
        } else {
            return response()->json([
                'fail' => 404,
                'message' => 'Collector not found!',
            ], 404);
        }
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

     public function store_dropcurr(Request $request)
     {
         $this->validate($request, [
             'drop_latitude' => 'required|numeric',
             'drop_longitude' => 'required|numeric',
             'current_latitude' => 'required|numeric',
             'current_longitude' => 'required|numeric',
         ]);
         
         $content = Collectors::create([
             'drop_latitude' => $request->drop_latitude,
             'drop_longitude' => $request->drop_longitude,
             'current_latitude' => $request->current_latitude,
             'current_longitude' => $request->current_longitude
         ]);
 
         return response()->json([
             'success' => 201,
             'message' => 'Drop and current location creation successful!',
             'data' => $content,
         ], 201);
     }

    public function store_droploc(Request $request)
    {
        $this->validate($request, [
            'drop_latitude' => 'required|numeric',
            'drop_longitude' => 'required|numeric',
        ]);
        
        $content = Collectors::create([
            'drop_latitude' => $request->drop_latitude,
            'drop_longitude' => $request->drop_longitude
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'Drop location creation successful!',
            'data' => $content,
        ], 201);
    }

    public function store_currloc(Request $request)
    {
        $this->validate($request, [
            'current_latitude' => 'required|numeric',
            'current_longitude' => 'required|numeric',
        ]);
        
        $content = Collectors::create([
            'current_latitude' => $request->current_latitude,
            'current_longitude' => $request->current_longitude
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'Current location creation successful!',
            'data' => $content,
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_droploc(Request $request, $id)
    {
        $request->validate([
            'drop_latitude' => 'required|numeric',
            'drop_longitude' => 'required|numeric',
        ]);

        $droploc = Collectors::find($id);
        if($droploc){
            $droploc->drop_latitude = $request->drop_latitude;
            $droploc->drop_longitude = $request->drop_longitude;
            $droploc->save();

            return response()->json([
                'success' => 201,
                'message' => 'YOUR UPDATE DROP LOCATION IS SUCCESSFUL!',
                'data' => $droploc,
            ]);
        }else{
            return response()->json([
                'fail' => 500,
                'message' => 'YOUR UPDATE DROP LOCATION IS FAILED!',
            ]);
        }
    }

    public function update_currloc(Request $request, $id)
    {
        $request->validate([
            'current_latitude' => 'required|numeric',
            'current_longitude' => 'required|numeric',
        ]);

        $currloc = Collectors::find($id);
        if($currloc){
            $currloc->current_latitude = $request->current_latitude;
            $currloc->current_longitude = $request->current_longitude;
            $currloc->save();

            return response()->json([
                'success' => 201,
                'message' => 'YOUR UPDATE CURRENT LOCATION IS SUCCESSFUL!',
                'data' => $currloc,
            ]);
        }else{
            return response()->json([
                'fail' => 500,
                'message' => 'YOUR UPDATE CURRENT LOCATION IS FAILED!',
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
