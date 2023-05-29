<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    //
    public function index()
    {
        return view('homepage', [
            "concerts" => Concert::all()
        ]);
    }
    public function show(Concert $concert)
    {
        return (view('concert', [
            "concert" => $concert
        ]));
    }
}
