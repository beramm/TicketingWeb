<?php

namespace App\Http\Controllers;

use App\Models\Bought;
use App\Models\Concerts;
use App\Models\Tickets;
use App\Models\User;
use App\Models\Visitors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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
        // // dd($request->all);


        $jumlahBeli = $request->input('jumlahBeli');
        $hargaTotal = $request->input('hargaTotal');
        $totalJumlah = $request->input('totalJumlah');

        $totalJumlah = ltrim($totalJumlah, ',');
        $jumlahData = explode(',', $totalJumlah);

        $jumlahData = array_filter($jumlahData, function ($value) {
            return $value !== null && $value !== '';
        });


        $totalId = $request->input('totalId');
        $totalId = ltrim($totalId, ',');
        $idTicket = explode(',', $totalId);
        $idTicket = array_filter($idTicket, function ($value) {
            return $value !== null && $value !== '';
        });

        $tickets = Tickets::findOrFail($idTicket);



        $user = User::find(auth()->id());

        $validatedData = [];

        foreach ($idTicket as $index => $ticketId) {
            $data = [
                'users_id' => $user->id,
                'tickets_id' => $ticketId,
                'nama' => $request->nama,
                'nik' => $request->nik,
                'telepon' => $request->telepon,
                'kelahiran' => $request->kelahiran,
                'jumlah' => $jumlahData[$index],
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ];


            $rules = [
                'tickets_id' => 'required',
                'jumlah' => 'required',
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
            } else {
                $validatedData[] = $data;
            }
        }

        $insertedIds = [];
        if (!empty($validatedData)) {
            foreach ($validatedData as $data) {

                $bought = Bought::create($data);
                //decrement the correspondence ticket's stock

                $ticket = Tickets::find($data['tickets_id']); // Assuming you have a "Ticket" model
                $ticket->kuantitas -= $data['jumlah'];
                $ticket->save();

                $insertedIds[] = $bought->id;
            }

            session()->flash('success', 'Successfully added');
        }

        $bought = Bought::findOrFail($insertedIds);

        if (!is_null($request->input('nama'))) {
            $nama = $request->input('nama');
            $nik = $request->input('nik');
            $telepon = $request->input('telepon');
            $kelahiran = $request->input('kelahiran');
            return redirect()->route('done')->with([
                'nama' => $nama,
                'nik' => $nik,
                'telepon' => $telepon,
                'kelahiran' => $kelahiran,
                'tickets' => $tickets,
                'jumlahBeli' => $jumlahBeli,
                'hargaTotal' => $hargaTotal,
                'users' => $user,
                'bought' => $bought
            ]);
        } else {

            return redirect()->route('done')->with([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'telepon' => $request->telepon,
                'kelahiran' => $request->kelahiran,
                'tickets' => $tickets,
                'jumlahBeli' => $jumlahBeli,
                'hargaTotal' => $hargaTotal,
                'users' => $user,
                'bought' => $bought
            ]);
        }
    }

    public function done(Request $request)
    {
        $nama = $request->session()->get('nama');
        $nik = $request->session()->get('nik');
        $telepon = $request->session()->get('telepon');
        $kelahiran = $request->session()->get('kelahiran');
        $tickets = $request->session()->get('tickets');
        $jumlahBeli = $request->session()->get('jumlahBeli');
        $hargaTotal = $request->session()->get('hargaTotal');
        $visitors = $request->session()->get('visitors');
        $users = $request->session()->get('users');
        $bought = $request->session()->get('bought');
        return view('buyed', [
            'nama' => $nama,
            'nik' => $nik,
            'telepon' => $telepon,
            'kelahiran' => $kelahiran,
            'tickets' => $tickets,
            'jumlahBeli' => $jumlahBeli,
            'hargaTotal' => $hargaTotal,
            'visitors' => $visitors,
            'users' => $users,
            'bought' => $bought
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hargaTotal = $request->input('totalHarga');
        $jumlahBeli = $request->input('totalJumlahBeli');
        $barangVenue = $request->input('totalVenue');
        $totalJumlah = $request->input('totalJumlah');
        $totalId = $request->input('totalId');
        $user = User::find(auth()->id());

        return view('buy1', [
            'hargaTotal' => $hargaTotal,
            'jumlahBeli' => $jumlahBeli,
            'barangVenue' => $barangVenue,
            'totalId' => $totalId,
            'totalJumlah' => $totalJumlah,
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
