<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->paginate(5);
        return view('Book/index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $idAuthors = Author::all()->pluck('id');
        return view('Book/create', compact('idAuthors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nameBook' => 'required',
            'years' => 'required',
            'image' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName=$file->getClientOriginalName();
            $path = $file->move('public/images',$fileName);
            $request->merge(['img' => url($path)]);
        }


        Book::create($request->all());
        return redirect()->route('books.index')->with('success','Book create successfully');
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
        $idAuthors = Author::all()->pluck('id');
        return view('Book/edit', compact('book', 'idAuthors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nameBook' => 'required',
            'years' => 'required',
            'image' => 'required',
        ]);
        
        $book = Book::find($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // lấy tên gốc của tập tin được tải lên từ một yêu cầu
            $fileName=$file->getClientOriginalName();
            $path = $file->move('public/images',$fileName);
            $request->merge(['img' => url($path)]);
        }

        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book edited successfully');
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
