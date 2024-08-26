<?php

namespace App\Http\Controllers;

use App\Models\Village;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreVillageRequest;
use App\Http\Requests\UpdateVillageRequest;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $villages = Village::orderByDesc('id')->get();
        return view('admin.villages.index', compact('villages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.villages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVillageRequest $request)
    {
        DB::transaction(function() use ($request) {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['name']);

            $newData = Village::create($validated);
        });

        return redirect()->route('admin.villages.index')->with('success', 'Data gampong berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Village $village)
    {
        return view('admin.villages.show', compact('village'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Village $village)
    {
        return view('admin.villages.edit', compact('village'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVillageRequest $request, Village $village)
    {
        DB::transaction(function() use ($request, $village) {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['name']);

            $village->update($validated);
        });

        return redirect()->route('admin.villages.index')->with('success', 'Data gampong berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Village $village)
    {
        DB::transaction(function() use ($village) {
            $village->delete();
        });

        return redirect()->route('admin.villages.index');
    }
}
