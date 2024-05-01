<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function show()
    {
        $reviews = Review::all();
        return view('review.index', compact('reviews'));
    }

    public function create()
    {
        return view('review.create');
    }

    public function showInfo()
    {
        return view('review.info');
    }

    public function store(Request $request)
    {
        $review = new Review();
        $review->user_id = auth()->user()->id;
        $review->name = $request->name;
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->image = $this->uploadPhoto($request);
        $review->save();
        return redirect('/reviews/info');
    }

    public function uploadPhoto(Request $request)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/reviews', 'public');
            return $path;
        }
        return null;
    }
}
