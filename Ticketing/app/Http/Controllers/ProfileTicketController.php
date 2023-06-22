<?php

namespace App\Http\Controllers;

use App\Models\Bought;
use Illuminate\Http\Request;

class ProfileTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $bought = $user->Bought;
        return view('profile.ticket.index', [
            'boughts' => $bought
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Bought $bought)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bought $bought)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bought $bought)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bought $bought)
    {
        //
    }
}
