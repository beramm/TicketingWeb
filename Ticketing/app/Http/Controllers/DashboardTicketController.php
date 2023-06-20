<?php

namespace App\Http\Controllers;

use App\Models\Concerts;
use App\Models\Tickets;
use Illuminate\Http\Request;

class DashboardTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->isAdmin === 1) {
            return view('dashboard.tickets.index', [
                'tickets' => Tickets::latest()->paginate(15)->withQueryString()
            ]);
        } else {
            return view('homepage', [
                "title" => '',
                "concerts" => Concerts::latest()->filter(request(['search', 'category']))->paginate(6)->withQueryString()

            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->isAdmin === 1) {
            return view('dashboard.tickets.create', [
                'concerts' => Concerts::all()
            ]);
        } else {
            return view('homepage', [
                "title" => '',
                "concerts" => Concerts::latest()->filter(request(['search', 'category']))->paginate(6)->withQueryString()

            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->isAdmin === 1) {

            $validatedData = $request->validate([
                'concerts_id' => 'required',
                'venue' => 'required|max:255',
                'harga' => 'required|numeric|min:0',
                'kuantitas' => 'required|numeric|min:0',
            ]);
            Tickets::create($validatedData);
            return redirect('/dashboard/tickets')->with('success', 'Succesfully Created');
        } else {
            return view('homepage', [
                "title" => '',
                "concerts" => Concerts::latest()->filter(request(['search', 'category']))->paginate(6)->withQueryString()

            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tickets $tickets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tickets $ticket)
    {
        if (auth()->user()->isAdmin === 1) {
            return view('dashboard.tickets.edit', [
                "concerts" => Concerts::all(),
                "ticket" => $ticket
            ]);
        } else {
            return view('homepage', [
                "title" => '',
                "concerts" => Concerts::latest()->filter(request(['search', 'category']))->paginate(6)->withQueryString()

            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tickets $ticket)
    {
        if (auth()->user()->isAdmin === 1) {
            $validatedData = $request->validate([
                'concerts_id' => 'required',
                'venue' => 'required|max:255',
                'harga' => 'required|numeric|min:0',
                'kuantitas' => 'required|numeric|min:0',
            ]);

            tickets::where('id', $ticket->id)
                ->update($validatedData);
            return redirect('/dashboard/tickets')->with('success', 'Succesfully Updated');
        } else {
            return view('homepage', [
                "title" => '',
                "concerts" => Concerts::latest()->filter(request(['search', 'category']))->paginate(6)->withQueryString()

            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tickets $ticket)
    {
        if (auth()->user()->isAdmin === 1) {
            Tickets::destroy($ticket->id);
            return redirect('/dashboard/tickets')->with('success', 'Succesfully Deleted');
        } else {
            return view('homepage', [
                "title" => '',
                "concerts" => Concerts::latest()->filter(request(['search', 'category']))->paginate(6)->withQueryString()

            ]);
        }
    }
}
