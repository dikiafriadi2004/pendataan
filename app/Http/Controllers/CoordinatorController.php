<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCoordinatorRequest;
use App\Models\Village;
use App\Models\Category;
use App\Models\Coordinator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoordinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $villages = Village::orderByDesc('id')->get();
        $coordinators = Coordinator::with(['members'])->orderByDesc('id')->get();
        return view('admin.coordinators.index', compact('coordinators', 'villages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villages = Village::orderByDesc('id')->get();
        $categories = Category::orderByDesc('id')->get();
        
        return view('admin.coordinators.create', compact('villages', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCoordinatorRequest $request)
    {
        DB::transaction(function() use ($request) {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['name']);

            $newCoordinator = Coordinator::create($validated);
        });

        return redirect()->route('admin.coordinators.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coordinator $coordinator)
    {
        return view('admin.coordinators.show', compact('coordinator'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coordinator $coordinator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coordinator $coordinator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coordinator $coordinator)
    {
        //
    }
}
