<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(5);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $idAuthors = Author::all()->pluck('id');
        return view('articles.create', compact('idAuthors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nameArticle'=> 'required',
            'content'=> 'required',
            'day'=> 'required',
            'idAuthor'=> 'required',
            'img'=> 'required',
        ]);
        if($request->hasFile('img')){
            $file = $request->file('img');
            $fileName = $file->getClientOriginalName();
            $file->move('images/', $fileName);
            $request->merge(['img' =>$fileName]);
        }
        Article::create([
            'nameArticle'=>$request->nameArticle,
            'content'=>$request->content,
            'day'=>$request->day,
            'idAuthor'=>$request->idAuthor,
            'img'=>$fileName,
            
        ]);
        return  redirect()->route('articles.index')->with('success','Article created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $idAuthors = Author::all()->pluck('id');
        return view('articles.edit', compact('article','idAuthors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nameArticle'=> 'required',
            'content'=> 'required',
            'day'=> 'required',
            'idAuthor'=> 'required',
            'img'=> 'required',
        ]);
        $article = Article::find($id);
        if($request->hasFile('img')){
            $file = $request->file('img');
            $fileName = $file->getClientOriginalName();
            $file->move('images/', $fileName);
            $request->merge(['img' =>$fileName]);
        }
        $article->update([
            'nameArticle'=>$request->nameArticle,
            'content'=>$request->content,
            'day'=>$request->day,
            'idAuthor'=>$request->idAuthor,
            'img'=>$fileName,
            
        ]);
        return  redirect()->route('articles.index')->with('success','Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success','Article deleted successfully');
    }
}
