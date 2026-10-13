<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function show(Category $category)
    {
        $blogs = $category->blogs()->latest()->paginate(8);

        return view('theme.category', compact('category','blogs'));
    }
}
