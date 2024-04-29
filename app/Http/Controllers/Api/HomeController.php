<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductItemRecource;

use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $allData['Category']=CategoryResource::collection( ProductCategory::all()) ;
        $machines =DB::table('products')->where("products.statuses_id",'!=',4)->where("products.statuses_id",'!=',7)->where("products.value_location",'=',3)->
        leftJoin('product_details', 'product_details.id', '=', 'products.product_details_id')->leftJoin('product_groups', 'product_details.group_id', '=', 'product_groups.id')->leftJoin('product_companies', 'product_details.company_id', '=', 'product_companies.id')
        ->leftJoin('statuses', 'products.statuses_id', '=', 'statuses.id') ->Join('order_product', 'products.id', '=', 'order_product.products_id')->where("product_details.category_id",1)->where("product_details.rate",'>=',4)->where("products.selling_date", null)
        ->selectRaw('product_details.id,company_name,product_name,group_name,country_of_manufacture,count(products.product_details_id) as aggregate,product_details.image_name,product_details.rate')
        ->groupBy('product_details.id','company_name','product_name','country_of_manufacture','group_name','product_details.image_name','product_details.rate')->get();
     
        $allData['most_populer_machine']=ProductItemRecource::collection( $machines) ;
     

        $allData["status"]="success";

        return $allData; 
    }
}
