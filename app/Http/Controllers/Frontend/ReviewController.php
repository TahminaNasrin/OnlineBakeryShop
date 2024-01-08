<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function review()
    {
        return view('frontend.pages.review');
    }

    public function storeReview(Request $request)
    {
        Review::create([
            'user_id'=>auth()->user()->id,
            'review'=>$request->review,
        ]);
        
        notify()->success('Thanks for your review.');
        return redirect()->route('frontend.home');
    }
}
