<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(4);
       // dd($blogs);
        return view('theme.index', compact('blogs'));

    }


    public function contact()
    {
        return view('theme.contact');

    }



    public function login()
    {
        return view('theme.login');

    }

    public function register()
    {
        return view('theme.register');

    }
}
