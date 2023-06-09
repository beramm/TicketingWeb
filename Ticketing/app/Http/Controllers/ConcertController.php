<?php

namespace App\Http\Controllers;

use App\Models\Concerts;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    //
    public function index()
    {
        $concerts = Concerts::latest();

        if (request('search')) {
            $concerts->where('nama', 'like', '%' . request('search') . '%');
        }

        return view('homepage', [
            "concerts" =>$concerts->get()
        ]);
    }
    public function show(Concerts $concert)
    {
        return (view('concert', [
            "concert" => $concert
        ]));
    }
}
