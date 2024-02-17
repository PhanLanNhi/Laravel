<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::orderBy('created_at', 'desc')->paginate(5);
        return view('reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $bookIDs = Book::all()->pluck('bookID');
        // $userIDs = User::all()->pluck('id');
        // $userIDs = User::select('id','name')->get();
        $bookIDs = Book::all();
        $userIDs = User::all();
        return view('reviews.create', compact('bookIDs', 'userIDs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bookID' => 'required',
            'userID' => 'required',
            'rating' => 'required',
            'reviewText' => 'required',
            'reviewDate' => 'required',
        ]);
        Review::create($request->all());
        return redirect()->route('reviews.index')->with('success','Review created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        return view('reviews.detail', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        $bookIDs = Book::all();
        $userIDs = User::all();
        // $userIDs = User::select('id','name')->get();
        return view('reviews.edit', compact('review','bookIDs', 'userIDs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $request->validate([
            'bookID' => 'required',
            'userID' => 'required',
            'rating' => 'required',
            'reviewText' => 'required',
            'reviewDate' => 'required',
        ]);
        $review->update($request->all());
        return redirect()->route('reviews.index')->with('success','Review updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('success','Review deleted successfully');
    }
}
