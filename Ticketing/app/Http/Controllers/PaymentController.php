<?php

namespace App\Http\Controllers;

use App\Models\Concerts;
use App\Models\Tickets;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        
    }

    /**
     * Display the specified resource.
     */
    public function show($concert_id)
    {
        $concert = Concerts::with('tickets')->findOrFail($concert_id);

        $tickets = $concert->tickets;

        return view('payment', [
            'tickets' => $tickets
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tickets $tickets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tickets $tickets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tickets $tickets)
    {
        //
    }
}