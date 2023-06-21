<?php

namespace App\Http\Controllers;

use App\Models\Concerts;
use App\Models\Tickets;
use App\Models\User;
use App\Models\Visitors;
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
    public function create(Request $request)
    {
        $array = $request->input('totalArray');
        $array = ltrim($array, ',');
        $idTicket = explode(',', $array);
        $tickets = Tickets::findOrFail($idTicket);
        $jumlahBeli = $request->input('jumlahBeli');
        $hargaTotal = $request->input('hargaTotal');
        if (!is_null($request->input('nama'))) {
            $nama = $request->input('nama');
            $nik = $request->input('nik');
            $telepon = $request->input('telepon');
            $kelahiran = $request->input('kelahiran');
            return view('done', [
                'nama' => $nama,
                'nik' => $nik,
                'telepon' => $telepon,
                'kelahiran' => $kelahiran,
                'tickets' => $tickets,
                'jumlahBeli' => $jumlahBeli,
                'hargaTotal' => $hargaTotal
            ]);
        } else {
            $id = $request->input('idVisitor');
            $visitors = Visitors::findOrFail($id);
            $nama = $visitors->nama;
            $nik = $visitors->nik;
            $telepon = $visitors->telepon;
            $kelahiran = $visitors->kelahiran;

            return view('done', [
                'nama' => $nama,
                'nik' => $nik,
                'telepon' => $telepon,
                'kelahiran' => $kelahiran,
                'tickets' => $tickets,
                'jumlahBeli' => $jumlahBeli,
                'hargaTotal' => $hargaTotal
            ]);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hargaTotal = $request->input('totalHarga');
        $jumlahBeli = $request->input('totalJumlahBeli');
        $barangVenue = $request->input('totalVenue');
        $totalId = $request->input('totalId');
        $user = User::find(auth()->id());

        return view('buy', [
            'hargaTotal' => $hargaTotal,
            'jumlahBeli' => $jumlahBeli,
            'barangVenue' => $barangVenue,
            'totalId' => $totalId,
            'user' => $user,
        ]);
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
