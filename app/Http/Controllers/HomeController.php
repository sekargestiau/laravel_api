<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function indexApi(){
        $user = auth()->user();

        return response()->json([
            'success' => 200,
            'message' => 'Data successfully retrieved!',
            'data' => $user,
        ], 200);
    }
}
