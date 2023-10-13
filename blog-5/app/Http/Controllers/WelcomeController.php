<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    // public function index(){
    //     return "Index from Welcome Controller";
    // }

    public function index(){
        return view ("welcome/index");
    }
    public function add(){
        return view ("welcome/add");
    }
    public function edit(){
        return view ("welcome/edit");
    }
    public function save(){
        return "Save";
    }
}
