<?php

namespace App\Http\Controllers;

use App\Models\Vendors;
use App\Models\Concerts;
use Illuminate\Http\Request;

class DashboardVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->isAdmin === 1) {
            return view('dashboard.vendors.index', [
                'vendors' => Vendors::latest()->paginate(15)->withQueryString()
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
            return view('dashboard.vendors.create');
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
                'nama' => 'required|max:255|unique:vendors',
            ]);
            Vendors::create($validatedData);
            return redirect('/dashboard/vendors')->with('success', 'Succesfully Created');
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
    public function show(Vendors $vendors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendors $vendor)
    {
        if (auth()->user()->isAdmin === 1) {
            return view('dashboard.vendors.edit', [
                "vendor" => $vendor
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
    public function update(Request $request, Vendors $vendor)
    {
        if (auth()->user()->isAdmin === 1) {
            $validatedData = $request->validate([
                'nama' => 'required|max:255|unique:vendors',
            ]);
            Vendors::where('id', $vendor->id)
                ->update($validatedData);
            return redirect('/dashboard/vendors')->with('success', 'Succesfully Updated');
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
    public function destroy(Vendors $vendor)
    {
        if (auth()->user()->isAdmin === 1) {
            Vendors::destroy($vendor->id);
            return redirect('/dashboard/vendors')->with('success', 'Succesfully Deleted');
        } else {
            return view('homepage', [
                "title" => '',
                "concerts" => Concerts::latest()->filter(request(['search', 'category']))->paginate(6)->withQueryString()

            ]);
        }
    }
}
