<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        if(request('output') == 'pdf') {
            $pdf = Pdf::loadView('admin.categories.printcategory', compact('categories'))->setPaper('a4', 'portrait');
            return $pdf->download('print_categories.pdf');
        } 
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        DB::transaction(function() use ($request) {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['name']);

            $newCategory = Category::create($validated);
        });

        return redirect()->route('admin.categories.index')->with('success', 'Data Kategori berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        if(request('output') == 'pdf') {
            $pdf = Pdf::loadView('admin.categories.print', compact('category'))->setPaper('a4', 'portrait');
            return $pdf->download('print_categories.pdf');
        } 
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        DB::transaction(function() use ($request, $category) {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['name']);

            $category->update($validated);
        });

        return redirect()->route('admin.categories.index')->with('success', 'Data kategori berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        DB::transaction(function() use ($category) {
            $category->delete();
        });

        return redirect()->route('admin.categories.index');
    }
}
