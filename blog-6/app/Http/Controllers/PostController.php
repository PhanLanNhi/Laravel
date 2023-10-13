<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mac dinh neu ko chi dinh
        // echo "index";

        //  Lay du lieu
        $posts = Post::all();
        // test chay thu du lieu
        // dd($posts);

        //  Render ra View
        // tra ve mang du lieu tren trang index cua thu muc posts trong view
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // hien thi form de them dl
        echo "create";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // nhap dl vao form -> luu dl
        echo "store";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // hien thi thong tin chi tiet
        echo "show";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // hien thi form sua
        echo "edit";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // lay dl form edit de cap nhat db -> update
        echo "update";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // xoa
        echo "destroy";
    }
}
