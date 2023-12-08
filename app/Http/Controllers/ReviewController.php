<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Repositories\ReviewService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    private $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }


    public function index()
    {
        $data = $this->reviewService->all();
        return view('admin.review.index', compact('data'));
    }


    public function create()
    {
        return view('admin.review.create');
    }


    public function store(Request $request)
    {
        $this->reviewService->store($request->all());
        return back()->with('success','Review has success created');
    }


    public function show(Review $review)
    {
        return view('admin.review.show', compact('review'));
    }


    public function edit(Review $review)
    {
        return view('admin.review.edit', compact('review'));
    }


    public function update(Request $request, Review $review)
    {
        $this->reviewService->update($request->all(),$review->id);
        return redirect()->route('review.index')->with('success','Review has success updated');
    }


    public function destroy(Review $review)
    {
        $this->reviewService->destroy($review->id);
        return redirect()->route('review.index')->with('success','Review has success deleted');
    }
}
