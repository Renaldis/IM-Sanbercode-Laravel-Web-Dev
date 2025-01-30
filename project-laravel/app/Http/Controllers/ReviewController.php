<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create(Request $request, $id)
    {
        $request->validate([
            "content"=>"required",
            "point"=>"required|integer|min:1|max:5",
        ]);
        $user_id = Auth::id();

        $review = new Review();
        $review->user_id = $user_id;
        $review->content = $request->content;
        $review->point = $request->point;
        $review->film_id = $id;
        $review->save();

        return redirect('/film/'.$id);
    }
}
