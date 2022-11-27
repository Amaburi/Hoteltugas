<?php

namespace App\Http\Controllers\hotel\Review;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Review::all();
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
        $review = new Review();
        $review->hotel_id = $request->hotel_id;
        $review->nama = $request->nama;
        $review->rating = $request->rating;
        $review->comment = $request->comment;


        $review->save();
        return response()-> json(['message'=>'Your Review has been added'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($hotel_id)
    {
        $data = Review::where('hotel_id', '=',$hotel_id)->get();
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
        $review = Review::find($id);
        if($review){
            $review->hotel_id = $request->hotel_id;
            $review->nama = $request->nama;
            $review->rating = $request->rating;
            $review->comment = $request->comment;

            
            $review->update();
            return response()->json([
                'code' => 201,
                'status' => 'success',
                'message' => 'success to update the comment',
            ], 201);
        }else{
            return response()-> json(['message'=>'cant find the comment...'],404);

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
        $room = Review::find($id);
        if($room){
            $room->delete();
            return response()-> json(['message'=>'the comment has been deleted...'],200);

        }else{
            return response()-> json(['message'=>'cant find the comment...'],404);

        }
    }
}
