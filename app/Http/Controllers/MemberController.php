<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Village;
use App\Models\Coordinator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreMemberRequest;

class MemberController extends Controller
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
    public function create(Coordinator $coordinator)
    {
        $villages = Village::orderByDesc('id')->get();
        return view('admin.members.create', compact('coordinator', 'villages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request, Coordinator $coordinator)
    {
        DB::transaction(function () use ($request, $coordinator) {
            $validated = $request->validated();
            $validated['slug'] = Str::slug($validated['name']);

            $validated['coordinator_id'] = $coordinator->id;

            $member = Member::create($validated);
        });

        return redirect()->route('admin.coordinators.show', $coordinator->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coordinator $coordinator, Member $member)
    {
        DB::transaction(function ()  use ($member, $coordinator) {
            $member->delete();
        });

        return redirect()->route('admin.coordinators.show', $coordinator->id);
    }
}
