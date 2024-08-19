<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\ExportOrderAppResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;



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

    public function get_detailes(Request $request)
    {
        $order_machine_detail =DB::table('products')->
           leftJoin('product_details', 'product_details.id', '=', 'products.product_details_id')
            ->Join('order_product', 'products.id', '=', 'order_product.products_id')->where("order_product.orders_id", $request->order_id)->where("category_id", 1)
           ->selectRaw('count(products.product_details_id) as item_count,sum(products.selling_price_with_comm) as item_price,product_details.category_id')
           ->groupBy('product_details.category_id')->get();

           $order_grinder_detail =DB::table('products')->
           leftJoin('product_details', 'product_details.id', '=', 'products.product_details_id')
            ->Join('order_product', 'products.id', '=', 'order_product.products_id')->where("order_product.orders_id", $request->order_id)->where("category_id", 2)
           ->selectRaw('count(products.product_details_id) as item_count,sum(products.selling_price_with_comm) as item_price,product_details.category_id')
           ->groupBy('product_details.category_id')->get();

           $order_partes_detail =DB::table('products')->
           leftJoin('product_details', 'product_details.id', '=', 'products.product_details_id')
            ->Join('order_product', 'products.id', '=', 'order_product.products_id')->where("order_product.orders_id", $request->order_id)->where("category_id", 3)
           ->selectRaw('count(products.product_details_id) as item_count,sum(products.selling_price_with_comm) as item_price,product_details.category_id')
           ->groupBy('product_details.category_id')->get();

           $order_other_detail =DB::table('products')->
           leftJoin('product_details', 'product_details.id', '=', 'products.product_details_id')
            ->Join('order_product', 'products.id', '=', 'order_product.products_id')->where("order_product.orders_id", $request->order_id)->where("category_id",'>',3 )
           ->selectRaw('count(products.product_details_id) as item_count,sum(products.selling_price_with_comm) as item_price,product_details.category_id')
           ->groupBy('product_details.category_id')->get();


           if($order_machine_detail->isEmpty()){
            $order_machine_detail=[[
                        "category_id"=>1,
                        "item_count"=>0.00,
                        "item_price"=>0.00
                        

            ]];
           }
           if($order_grinder_detail->isEmpty()){
            $order_grinder_detail=[[
                        "category_id"=>2,
                        "item_count"=>0.00,
                        "item_price"=>0.00
                        

            ]];
           }

           if($order_partes_detail->isEmpty()){
            $order_partes_detail=[[
                        "category_id"=>3,
                        "item_count"=>0.00,
                        "item_price"=>0.00,
                        

            ]];
           }



           if($order_other_detail->isEmpty()){
            $order_other_detail=[[
                        "category_id"=>4,
                        "item_count"=>0,
                        "item_price"=>0
                        

            ]];
           }
          
           

          

           return response()->json([
            'message' => 'detailes get successfully',
            'machines' => $order_machine_detail,
            "grinder"=>$order_grinder_detail,
            "partes"=>$order_partes_detail,
            "other_item"=>$order_other_detail
        ], 201);
    }




    public function get_detailes_machine(Request $request)
    {
      //  return $request;
    //        $boxes =DB::table('products')->
    //         leftJoin('boxes', 'boxes.id', '=', 'products.box_id') ->Join('order_product', 'products.id', '=', 'order_product.products_id')-> leftJoin('orders', 'orders.id', '=', 'order_product.orders_id') ->where("orders.id", $request->order_id)->where("products.box_id",'!=',null)
    //         ->selectRaw('boxes.id ,boxes.box_code')
    //         ->groupBy('boxes.id','boxes.box_code')->get();
    // return $boxes;
            // $order=Order::find($request->order_id);
            
           // $detail=OrderDetail::where("orders_id",$order_id);
            $machines =DB::table('products')->
           leftJoin('product_details', 'product_details.id', '=', 'products.product_details_id')->leftJoin('product_groups', 'product_details.group_id', '=', 'product_groups.id')->leftJoin('product_companies', 'product_details.company_id', '=', 'product_companies.id')
           ->leftJoin('statuses', 'products.statuses_id', '=', 'statuses.id') ->Join('order_product', 'products.id', '=', 'order_product.products_id')->where("order_product.orders_id", $request->order_id)->where("product_details.category_id", $request->category_id)
           ->selectRaw('product_details.id,company_name,product_name,group_name,country_of_manufacture,count(products.product_details_id) as aggregate,count(products.box_id) as box_count,product_details.image_name')
           ->groupBy('product_details.id','company_name','product_name','country_of_manufacture','group_name','product_details.image_name')->get();
           $myMachines = $this->paginate([$machines]);
           return $myMachines;












       
           
           
        $invoices = Invoice::where('orders_id',$id)->first();
           
           $details  = InvoicesDetails::where('invoices_id',$invoices->id)->get();
          
           $exporter = User::where('role_id','=',1)->get();
                $importer = User::where('role_id','=',2)->get();
                $representative = User::where('role_id','=',3)->get();
    
            return view('order.export_order.details_order1',compact('order','machines','grinders','parts','details','invoices','exporter', 'importer','representative','id','boxes'));
    
            
           
    
           
    
        


        $exporOrder= Order::where('exported_id',$request->user_id)->get();
         $allData['exporOrder']=ExportOrderAppResource::collection( $exporOrder) ;
     

        $allData["status"]="successfully";

        return $allData; 
        
       
        // return response()->json([
        //     'message' => 'successfully',
        //     'orderApp' => $exporOrder
        // ], 201); 
    }






    public function get_detailes_grinder(Request $request)
    {    
           $grinders =DB::table('products')->
           leftJoin('product_details', 'product_details.id', '=', 'products.product_details_id')->leftJoin('product_groups', 'product_details.group_id', '=', 'product_groups.id')->leftJoin('product_companies', 'product_details.company_id', '=', 'product_companies.id')
           ->leftJoin('statuses', 'products.statuses_id', '=', 'statuses.id') ->Join('order_product', 'products.id', '=', 'order_product.products_id')->where("order_product.orders_id", $request->order_id)->where("product_details.category_id", 2)
           ->selectRaw('product_details.id,company_name,product_name,group_name,country_of_manufacture,count(products.product_details_id) as aggregate,count(products.box_id) as box_count,product_details.image_name')
           ->groupBy('product_details.id','company_name','product_name','country_of_manufacture','group_name','product_details.image_name')->get();
           
           
           $myGrinders = $this->paginate([$grinders]);
           return $myGrinders;
    }




    public function get_detailes_spare_parts(Request $request)
    {    
        $parts =DB::table('products')->
        leftJoin('product_details', 'product_details.id', '=', 'products.product_details_id')->leftJoin('product_groups', 'product_details.group_id', '=', 'product_groups.id')->leftJoin('product_companies', 'product_details.company_id', '=', 'product_companies.id')
        ->leftJoin('statuses', 'products.statuses_id', '=', 'statuses.id') ->Join('order_product', 'products.id', '=', 'order_product.products_id')->where("order_product.orders_id", $id)->where("product_details.category_id", 3)
        ->selectRaw('product_details.id,company_name,product_name,group_name,country_of_manufacture,count(products.product_details_id) as aggregate,count(products.box_id) as box_count,product_details.image_name')
        ->groupBy('product_details.id','company_name','product_name','country_of_manufacture','group_name','product_details.image_name')->get();
        
           
           $myPartes = $this->paginate([$parts]);
           return $myPartes;
    }





    private function paginate(array $items, int $perPage = 8, ?int $page = null, $options = []): LengthAwarePaginator
    {                                                                                                       
      $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator(array_values($items->forPage($page, $perPage)
  ->toArray()), $items->count(), $perPage, $page, $options);
    //    return new LengthAwarePaginator($items->forPage($page, $perPage)->toArray(), $items->count(), $perPage, $page, $options);
    }  
}
