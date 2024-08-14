<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\ExportOrderAppResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;


class ExportOrder extends Controller
{
    public function show(Request $request)
    {
        
        $exporOrder= Order::where('exported_id',$request->user_id)->get();
        $allData['exporOrder']=ExportOrderAppResource::collection( $exporOrder) ;
     

        $allData["status"]="successfully";

        return $allData; 
        
       
        // return response()->json([
        //     'message' => 'successfully',
        //     'orderApp' => $exporOrder
        // ], 201); 
    }
}
