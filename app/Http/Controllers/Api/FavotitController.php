<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\favotit;
use Illuminate\Http\Request;

class FavotitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\favotit  $favotit
     * @return \Illuminate\Http\Response
     */
    public function show(favotit $favotit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\favotit  $favotit
     * @return \Illuminate\Http\Response
     */
    public function edit(favotit $favotit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\favotit  $favotit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, favotit $favotit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\favotit  $favotit
     * @return \Illuminate\Http\Response
     */
    public function destroy(favotit $favotit)
    {
        //
    }
    public function add_favorite(Request $request)
    {
        $favotit=  favotit::create([
            'user_id' => $request->user_id,
            'product_details_id' => $request->product_details_id,

            
        ]);
        return response()->json([
            'message' => 'favorite successfully added',
            'favorite' => $favotit
        ], 201);

    }
    public function remove_favorite(Request $request)
    {
        $favotit= favotit::where('user_id',$request->user_id)->where('product_details_id',$request->product_details_id)->delete();
        return response()->json([
            'message' => 'favorite successfully removed',
            'favorite' => $favotit
        ], 201);
    }
}
