<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllReviewsForService($id)
    {
        $review = Review::all()->where('service_id', $id);
        return response($review, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('post')) {
            $data = $request->validate(
                [
                    'user_id' => 'required',
                    'service_id' => 'required',
                    'review' => 'required',
                    'rating' => 'required|between:1,5',
                ]
            );
            $review = Review::create($data);
            return response($review, 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::find($id);
        return response($review, 200);
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
        if($request->isMethod('put')) {
            $data = $request->validate(
                [
                    'service_id' => 'required',
                    'review' => 'required',
                    'rating' => 'required|between:1,5',
                ]
            );
            $review = Review::where('id', $id)->update($data);
            return response($review, 200);
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
        $review = Review::find($id);
        $review->delete();
        return response('Review deleted', 200);
    }
}
