<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::orderBy('created_at', 'desc')->paginate(5);
        return view('Author/index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Author/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nameAuthor' => 'required',
            'birthDay' => 'required',
            'specialized' => 'required',
        ]);

        Author::create($request->all());
        return redirect()->route('authors.index')->with('success','Author created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('Author/edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'nameAuthor' => 'required',
            'birthDay' => 'required',
            'specialized' => 'required',
        ]);
        
        $author->update($request->all());
        return redirect()->route('authors.index')->with('success','Author updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success','Author deleted successfully');
    }
}
