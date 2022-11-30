<?php

namespace App\Http\Controllers\hotel\listhotel;

use App\Http\Controllers\Controller;
use App\Models\hotellist;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = hotellist::all();
        return $data;
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
        $hotel = new hotellist();
        $hotel->hotel = $request->hotel;
        $hotel->hotelid = $request->hotelid;
        $hotel->location = $request->location;
        $hotel->rating = $request->rating;


        $hotel->save();
        return response()-> json(['message'=>'A new hotel has been added'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($hotelid)
    {
        $data = hotellist::where('hotelid', '=',$hotelid)->get();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $listhotel = hotellist::find($id);
        if($listhotel){
            $listhotel->hotel = $request->hotel;
            $listhotel->hotelid = $request->hotelid;
            $listhotel->location = $request->location;
            $listhotel->rating = $request->rating;

            
            $listhotel->update();
            return response()->json([
                'code' => 201,
                'status' => 'success',
                'message' => 'success to update the list'.':'. $listhotel->hotel,
            ], 201);
        }else{
            return response()-> json(['message'=>'cant find the hotel...'],404);

        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotellist = hotellist::find($id);
        if($hotellist){
            $hotellist->delete();
            return response()-> json(['message'=>'Hotel has been deleted...'],200);

        }else{
            return response()-> json(['message'=>'cant find the Hotel...'],404);

        }
    }
}
