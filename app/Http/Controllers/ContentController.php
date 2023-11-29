<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contents;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Hash;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // function show all data content
    public function index()
    {
        $contents = Contents::all(); 
        return response()->json([
            'success' => 200,
            'message' => 'Data successfully retrieved!',
            'data' => $contents,
        ], 200);
    }

    // function show content based on id
    public function show($id)
    {
        $content = Contents::find($id);

        if ($content) {
            return response()->json([
                'success' => 200,
                'message' => 'Data successfully retrieved!',
                'data' => $content,
            ], 200);
        } else {
            return response()->json([
                'fail' => 404,
                'message' => 'Content not found!',
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
    public function store(Request $request)
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
            'content_title'=>'required|string',
            'content_text'=>'required|string',
        ]);

        $content = Contents::find($id);
        if($content){
            $content->content_title = $request->content_title;
            $content->content_text = $request->content_text;
            $content->save();

            return response()->json([
                'success' => 201,
                'message' => 'YOUR UPDATE CONTENT IS SUCCESSFUL!',
                'data' => $content,
            ]);
        }else{
            return response()->json([
                'fail' => 500,
                'message' => 'YOUR UPDATE CONTENT IS FAILED!',
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contents::findOrFail($id)->delete();

        return response()->json([
            'success' => 200,
            'message' => 'Content delete successful!',
        ], 200);
    }
}
