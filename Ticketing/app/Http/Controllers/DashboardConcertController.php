<?php

namespace App\Http\Controllers;

use App\Models\Concerts;
use App\Models\Vendors;
use App\Models\Categories;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\Promise\all;

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
                'concerts' => Concerts::latest()->paginate(15)->withQueryString()
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
            return view('dashboard.concerts.create', [
                'categories' => Categories::all(),
                'vendors' => Vendors::all()
            ]);
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
        // dd($request->all());
        if (auth()->user()->isAdmin === 1) {
            $validatedData = $request->validate([
                'nama' => 'required|max:255',
                'slug' => 'required|unique:concerts',
                'tempat' => 'required',
                'pict' => 'required|image|file|max:10000',
                'tanggal' => 'required',
                'waktu' => 'required',
                'harga' => 'required',
                'categories_id' => 'required',
                'vendors_id' => 'required',
                'terms' => 'required'
            ]);
            $validatedData['pict'] = $request->file('pict')->store('concert-picts');
            // dd($validatedData);

            Concerts::create($validatedData);
            return redirect('/dashboard/concerts')->with('success', 'Succesfully Created');
        } else {
            return view('homepage');
        }
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
    public function edit(Concerts $concert)
    {
        if (auth()->user()->isAdmin === 1) {
            return view('dashboard.concerts.edit', [
                "concert" => $concert,
                "categories" => Categories::all(),
                "vendors" => Vendors::all()
            ]);
        } else {
            return view('homepage');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Concerts $concert)
    {
        if (auth()->user()->isAdmin === 1) {
            $rules = [
                'nama' => 'required|max:255',
                'tempat' => 'required',
                'pict' => 'required|image|file|max:10000',
                'tanggal' => 'required',
                'waktu' => 'required',
                'harga' => 'required',
                'categories_id' => 'required',
                'vendors_id' => 'required',
                'terms' => 'required'
            ];
            // dd($validatedData);

            if ($request->slug != $concert->slug) {
                $rules['slug'] = 'required|unique:concerts';
            }

            $validatedData = $request->validate($rules);

            Storage::delete($request->oldPict);
            $validatedData['pict'] = $request->file('pict')->store('concert-picts');

            Concerts::where('id', $concert->id)
                ->update($validatedData);
            return redirect('/dashboard/concerts')->with('success', 'Succesfully Updated');
        } else {
            return view('homepage');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Concerts $concert)
    {
        if (auth()->user()->isAdmin === 1) {
            Concerts::destroy($concert->id);
            return redirect('/dashboard/concerts')->with('success', 'Succesfully Deleted');
        } else {
            return view('homepage');
        }
    }
    public function checkSlug(Request $request)
    {
        if (auth()->user()->isAdmin === 1) {
            $slug = SlugService::createSlug(Concerts::class, 'slug', $request->nama);
            return response()->json(['slug' => $slug]);
        } else {
            return view('homepage');
        }
    }
}
