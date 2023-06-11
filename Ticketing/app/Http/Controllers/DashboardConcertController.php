<?php

namespace App\Http\Controllers;

use App\Models\Concerts;
use Illuminate\Http\Request;

class DashboardConcertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (auth()->user()->isAdmin === 1) {
            return view('dashboard.concerts.index', [
                'concerts' => Concerts::paginate(15)->withQueryString()
            ]);
        } else {
            return view('homepage');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->isAdmin === 1) {
            return view('dashboard.concerts.create');
        } else {
            return view('homepage');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Concerts $concert)
    {
        // return $concerts;
        if (auth()->user()->isAdmin === 1) {
            return view('dashboard.concerts.show', [
                "concert" => $concert
            ]);
        } else {
            return view('homepage');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Concerts $concerts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Concerts $concerts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Concerts $concerts)
    {
        //
    }
}
