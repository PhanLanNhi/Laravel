<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowings = Borrowing::orderBy('created_at', 'desc')->paginate(5);
        return view('borrowings.index', compact('borrowings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bookIDs = Book::all();
        return view('borrowings.create', compact('bookIDs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bookID' => 'required',
            'memberID' => 'required',
            'borrowDate' => 'required',
            'dueDate' => 'required',
        ]);
        Borrowing::create($request->all());
        return redirect()->route('borrowings.index')->with('success','Borrowing created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrowing $borrowing)
    {
        return view('borrowings.detail', compact('borrowing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrowing $borrowing)
    {
        $bookIDs = Book::all();
        return view('borrowings.edit', compact('borrowing','bookIDs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrowing $borrowing)
    {
        $request->validate([
            'bookID' => 'required',
            'memberID' => 'required',
            'borrowDate' => 'required',
            'dueDate' => 'required',
        ]);
        $borrowing->update($request->all());
        return redirect()->route('borrowings.index')->with('success','Borrowing updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrowing $borrowing)
    {
        $borrowing->delete();
        return redirect()->route('borrowings.index')->with('success','Borrowing deleted successfully');
    }
}
