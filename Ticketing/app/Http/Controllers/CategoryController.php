<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    

    public function show(Categories $category)
    {
        return view('concerts', [
            'concerts' => $category->Concerts
        ]);
    }
    // public function show(Category $category)
    // {
    //     // return view('category', [
    //     //     'title' => $category->name,
    //     //     'active' => 'category',
    //     //     'posts' => $category->posts,
    //     //     'category' => $category->name
    //     // ]);
    //     return view('posts', [
    //         'title' => "Post by Category : $category->name",
    //         'posts' => $category->posts->load('category', 'author'),
    //         'active' => 'categories'
    //     ]);
    // }
}
