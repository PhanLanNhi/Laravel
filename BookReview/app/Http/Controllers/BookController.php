<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->paginate(3);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'notIn:default',
            'publicationYear' => 'required',
            'ISBN' => 'required',
            'coverImageURL' => 'required',
        ]);
        if($request->hasFile('coverImageURL')){
            $file = $request->file('coverImageURL');
            $fileName = $file->getClientOriginalName();
            $file->move('images/', $fileName);
            $request->merge(['coverImageURL' => $fileName]);
        }
        Book::create([
            'title'=>$request->title,
            'author'=>$request->author,
            'genre'=>$request->genre,
            'publicationYear'=>$request->publicationYear,
            'ISBN'=>$request->ISBN,
            //  request đang chứa dẫn của file tạm 
            // Nên để truyền cho nó đường dẫn đã được lưu thì phải là truyền $fileName 
            'coverImageURL'=>$fileName,
        ]);
        return  redirect()->route('books.index')->with('success','Book created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'notIn:default',
            'publicationYear' => 'required',
            'ISBN' => 'required',
            'coverImageURL' => 'required',
        ]);
        $book = Book::find($id);
        if($request->hasFile('coverImageURL')){
            $file = $request->file('coverImageURL');
            $fileName = $file->getClientOriginalName();
            $file->move('images/', $fileName);
            $request->merge(['coverImageURL' => $fileName]);
        }
        $book->update([
            'title'=>$request->title,
            'author'=>$request->author,
            'genre'=>$request->genre,
            'publicationYear'=>$request->publicationYear,
            'ISBN'=>$request->ISBN,
            'coverImageURL'=>$fileName,
        ]);
        return  redirect()->route('books.index')->with('success','Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success','Book deleted successfully');
    }
}
