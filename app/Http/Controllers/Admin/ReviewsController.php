<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function getAllReviewsForService(Request $request, $id)
    {
        $review = Review::with('author')->where('service_id', $id)->get();
        return response($review, 200);
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->validate(
                [
                    'author_id' => 'required',
                    'service_id' => 'required',
                    'review' => 'required',
                    'rating' => 'required',
                ]
            );
            $review = Review::create($data);
            return response($review, 200);
        }
    }

    public function show($id)
    {
        $review = Review::with('author')->find($id);
        if ($review) {
            return response($review, 200);
        }
        return response('review not found');
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('put')) {
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

    public function destroy($id)
    {
        $review = Review::find($id);
        $review->delete();
        return response('Review deleted', 200);
    }
}
