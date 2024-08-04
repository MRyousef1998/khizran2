<?php


namespace App\Http\Controllers\Api;


use App\Models\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\OrderApp;


class OrderAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      

        $orderApp=  OrderApp::create([
            'user_id' => $request->user_id,
            'address_id' => $request->address_id,
            'delevery_type' => $request->delevery_type,
            'peyment_mathodes' => $request->peyment_mathodes,

            'price_delevery' => $request->price_delevery,
            'order_price' => $request->order_price,

            
        ]);

        $carts= Cart::where('user_id',$request->user_id)->where('order_app_id',"0")->get();
        foreach($carts as $cart){
            $cart ->update([
                'order_app_id' => $orderApp->id,
            
            ]);

        }
       
        return response()->json([
            'message' => 'item successfully added to order',
            'order' => $orderApp
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderApp  $orderApp
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
        $orderApp= OrderApp::where('user_id',$request->user_id)->get();
        return response()->json([
            'message' => 'successfully',
            'orderApp' => $orderApp
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderApp  $orderApp
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderApp $orderApp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderApp  $orderApp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderApp $orderApp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderApp  $orderApp
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderApp $orderApp)
    {
        //
    }
}
