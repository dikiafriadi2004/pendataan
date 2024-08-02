<?php

namespace App\Http\Controllers;

use App\Models\Village;
use App\Models\Category;
use App\Models\Coordinator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCoordinatorRequest;
use App\Http\Requests\UpdateCoordinatorRequest;

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

        return redirect()->route('admin.coordinators.index')->with('success', 'Data koordinator berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coordinator $coordinator)
    {

        if(request('output') == 'pdf') {
            $pdf = Pdf::loadView('admin.coordinators.print', compact('coordinator'))->setPaper('a4');
            return $pdf->download('print.pdf');
        } 
        return view('admin.coordinators.show', compact('coordinator'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coordinator $coordinator)
    {
        $villages = Village::orderByDesc('id')->get();
        $categories = Category::orderByDesc('id')->get();
        return view('admin.coordinators.edit', compact('coordinator', 'villages', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCoordinatorRequest $request, Coordinator $coordinator)
    {
        DB::transaction(function() use ($request, $coordinator) {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['name']);

            $coordinator->update($validated);
        });

        return redirect()->route('admin.coordinators.index')->with('success', 'Data koordinator berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coordinator $coordinator)
    {
        //
    }
}
