<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;


class ExportOrder extends Controller
{
    public function show(Request $request)
    {
        
        $exporOrder= Order::where('exported_id',$request->user_id)->get();
        return response()->json([
            'message' => 'successfully',
            'orderApp' => $exporOrder
        ], 201);
    }
}
