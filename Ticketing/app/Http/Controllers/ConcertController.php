<?php

namespace App\Http\Controllers;

use App\Models\Concerts;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    //
    public function index()
    {
        return view('homepage', [
            "concerts" => Concerts::all()
        ]);
    }
    public function show(Concerts $concert)
    {
        return (view('concert', [
            "concert" => $concert
        ]));
    }
}
