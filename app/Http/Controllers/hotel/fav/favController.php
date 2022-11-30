<?php

namespace App\Http\Controllers\hotel\fav;

use App\Http\Controllers\Controller;
use App\Models\favorite;
use Illuminate\Http\Request;

class favController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = favorite::all();
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
        $favorite = new favorite();
        $favorite->hotel_id = $request->hotel_id;
        $favorite->user_id = $request->user_id;
        $favorite->nama = $request->nama;
        $favorite->note = $request->note;



        $favorite->save();
        return response()-> json(['message'=>'Data has been added'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nama)
    {
        $data = favorite::where('nama', '=',$nama)->get();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $favorite = favorite::find($id);
        if($favorite){
            $favorite->delete();
            return response()-> json(['message'=>'data has been deleted...'],200);

        }else{
            return response()-> json(['message'=>'cant find the data...'],404);

        }
    }
}
