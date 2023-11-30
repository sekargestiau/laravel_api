<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $this->validate($request, [
            'waste_type' => 'required',
            'waste_qty' => 'required',
            'user_notes' => 'required',
            'recycle_fee' => 'required',
            'pickup_fee' => 'required',
            'subtotal_fee' => 'required',
            'order_status' => 'required',
            'order_datetime' => 'required|date',
            'pickup_datetime' => 'required|date',
            'pickup_latitude' => 'required|numeric',
            'pickup_longitude' => 'required|numeric',
        ]);
        $user = auth()->user();        
        $content = Orders::create([
            'user_id' => $user->id,
            'waste_type' => $request->waste_type,
            'waste_qty' => $request->waste_qty,
            'user_notes' => $request->user_notes,
            'recycle_fee' => $request->recycle_fee,
            'pickup_fee' => $request->pickup_fee,
            'subtotal_fee' => $request->subtotal_fee,
            'order_status' => $request->order_status,
            'order_datetime' => $request->order_datetime,
            'pickup_datetime' => $request->pickup_datetime,
            'pickup_latitude' => $request->pickup_latitude,
            'pickup_longitude' => $request->pickup_longitude
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'Order creation successful!',
            'data' => $content,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    // function show content based on id
    public function show($id)
    {
        $order = Orders::find($id);

        if ($order) {
            return response()->json([
                'success' => 200,
                'message' => 'Data successfully retrieved!',
                'data' => $order,
            ], 200);
        } else {
            return response()->json([
                'fail' => 404,
                'message' => 'Content not found!',
            ], 404);
        }
    }

    public function show_history()
    {
        $userId = Auth::user()->id;

        $orders = Orders::with('user')
                        ->where('user_id', $userId)
                        ->where('order_status', 'DONE')
                        ->get();

        if ($orders->isNotEmpty()) {
            $responseData = [];

            foreach ($orders as $order) {
                $responseData[] = [
                    'user' => $order->user,
                    'order_data' => $order,
                ];
            }

            return response()->json([
                'success' => true,
                'message' => 'Data successfully retrieved!',
                'data' => $responseData,
            ], 200);
        } else {
            return response()->json([
                'fail' => true,
                'message' => 'Orders not found for the logged-in user!',
            ], 404);
        }
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'order_status'=>'required',
        ]);

        $order = Orders::find($id);
        if($order){
            $order->order_status = $request->order_status;
            $order->save();

            return response()->json([
                'success' => 201,
                'message' => 'YOUR UPDATE ORDER STATUS IS SUCCESSFUL!',
                'data' => $order,
            ]);
        }else{
            return response()->json([
                'fail' => 500,
                'message' => 'YOUR UPDATE ORDER STATUS IS FAILED!',
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
