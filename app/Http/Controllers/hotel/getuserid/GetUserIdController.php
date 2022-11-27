<?php

namespace App\Http\Controllers\hotel\getuserid;

use App\Http\Controllers\Controller;
use App\Models\getuserId;
use Illuminate\Http\Request;

class GetUserIdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = getuserId::all();
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
        $getuserid = new getuserId();
        $getuserid->name = $request->name;
        $getuserid->user_id = $request->user_id;



        $getuserid->save();
        return response()-> json(['message'=>'Data has been added'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $data = getuserId::where('name','=',$name)->get();
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
        $user_id = getuserId::find($id);
        if($user_id){
            $user_id->delete();
            return response()-> json(['message'=>'id has been deleted...'],200);

        }else{
            return response()-> json(['message'=>'cant find the id...'],404);

        }
    }


}
