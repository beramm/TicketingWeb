<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Concerts;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    //
    public function index()
    {
        $title = '';

        if (request('category')) {
            $category = Categories::firstWhere('slug', request('category'));
            $title = ''.$category->kategori.'\'s';
        }

        return view('homepage', [
            "title" => $title,
            "concerts" => Concerts::latest()->filter(request(['search', 'category']))->paginate(6)->withQueryString()
        ]);
    }
    public function show(Concerts $concert)
    {
        return (view('concert', [
            "concert" => $concert
        ]));
    }
}
