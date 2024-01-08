<?php

namespace App\Http\Controllers\Backend;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function list()
    {
        $reviews = Review::all();
        $users=Review::where('user_id',auth()->user()->id)->get();
        return view('admin.pages.review.list',compact('reviews','users'));
    }
}