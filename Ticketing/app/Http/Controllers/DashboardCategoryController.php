<?php

namespace App\Http\Controllers;

use App\Models\Concerts;
use App\Models\Categories;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->isAdmin === 1) {
            return view('dashboard.categories.index', [
                'categories' => Categories::latest()->paginate(15)->withQueryString()
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
            return view('dashboard.categories.create');
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
                'kategori' => 'required|max:255',
                'slug' => 'required|unique:categories'
            ]);
            Categories::create($validatedData);
            return redirect('/dashboard/categories')->with('success', 'Succesfully Created');
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
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $category)
    {
        //
        if (auth()->user()->isAdmin === 1) {
            return view('dashboard.categories.edit', [
                "category" => $category
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
    public function update(Request $request, Categories $category)
    {
        if (auth()->user()->isAdmin === 1) {
            $rules = [
                'kategori' => 'required|max:255',
                // 'slug' => 'required|unique:categories'
            ];
            if ($request->slug != $category->slug) {
                $rules['slug'] = 'required|unique:categories';
            }

            $validatedData = $request->validate($rules);
            Categories::where('id', $category->id)
                ->update($validatedData);
            return redirect('/dashboard/categories')->with('success', 'Succesfully Updated');
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
    public function destroy(Categories $category)
    {
        if (auth()->user()->isAdmin === 1) {
            Categories::destroy($category->id);
            return redirect('/dashboard/categories')->with('success', 'Succesfully Deleted');
        } else {
            return view('homepage', [
                "title" => '',
                "concerts" => Concerts::latest()->filter(request(['search', 'category']))->paginate(6)->withQueryString()

            ]);
        }
    }
    public function checkSlug(Request $request)
    {
        if (auth()->user()->isAdmin === 1) {
            $slug = SlugService::createSlug(Categories::class, 'slug', $request->kategori);
            return response()->json(['slug' => $slug]);
        } else {
            return view('homepage', [
                "title" => '',
                "concerts" => Concerts::latest()->filter(request(['search', 'category']))->paginate(6)->withQueryString()

            ]);
        }
    }
}
