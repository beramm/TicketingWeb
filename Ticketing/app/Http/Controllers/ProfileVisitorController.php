<?php

namespace App\Http\Controllers;

use App\Models\Visitors;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileVisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        return view('profile.visitors.index', [
            'visitors' => $user->Visitors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.visitors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'nik' => 'required|size:16',
            'telepon' => 'required|max:15',
            'kelahiran' => 'required'
        ]);
        $validatedData['user_id'] = auth()->user()->id;

        Visitors::create($validatedData);
        return redirect('/profile/visitors')->with('success', 'Succesfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Visitors $visitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visitors $visitor)
    {
        return view('profile.visitors.edit', [
            'visitor' => $visitor
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visitors $visitor)
    {
        $rules = [
            'nama' => 'required|max:255',
            'nik' => 'required|size:16',
            'telepon' => 'required|max:15',
            'kelahiran' => 'required'
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;

        Visitors::where('id', $visitor->id)
            ->update($validatedData);

        return redirect('/profile/visitors')->with('success', 'Succesfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visitors $visitor)
    {
        Visitors::destroy($visitor->id);
        return redirect('/profile/visitors')->with('success', 'Succesfully Deleted');
    }
    public function input(Request $request)
    {
        $id = $request->id;
        $visitor = Visitors::find($id);

        if ($visitor) {
            return response()->json([
                'nama' => $visitor->nama,
                'nik' => $visitor->nik,
                'telepon' => $visitor->telepon,
                'kelahiran' => $visitor->kelahiran,
            ]);
        } else {
            return response()->json([
                'error' => 'Visitor not found',
            ], 404);
        }
    }
}
