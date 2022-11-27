<?php

namespace App\Http\Controllers\hotel\kamar;

use App\Http\Controllers\Controller;
use App\Models\kamar;
use Illuminate\Http\Request;

class kamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kamar::all();
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
        $kamar = new kamar();
        $kamar->hotel = $request->hotel;
        $kamar->hotel_id = $request->hotel_id;
        $kamar->kamar = $request->kamar;
        $kamar->price = $request->price;


        $kamar->save();
        return response()-> json(['message'=>'A new Hotel Room has been added'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $kamar = kamar::find($id);
        if($kamar){
            $kamar->hotel = $request->hotel;
            $kamar->hotel_id = $request->hotel_id;
            $kamar->kamar = $request->kamar;
            $kamar->price = $request->kamar;

            
            $kamar->update();
            return response()->json([
                'code' => 201,
                'status' => 'success',
                'message' => 'success to update the room',
            ], 201);
        }else{
            return response()-> json(['message'=>'cant find the room...'],404);

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
        $room = kamar::find($id);
        if($room){
            $room->delete();
            return response()-> json(['message'=>'one of the room has been deleted...'],200);

        }else{
            return response()-> json(['message'=>'cant find the room...'],404);

        }
    }
}
