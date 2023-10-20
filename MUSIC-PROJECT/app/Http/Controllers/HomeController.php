<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    public function getAllArticles(){
        $articles = Article::all();
        // dd($articles);
        return view('home', compact('articles'));
    }
}
