<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $member = Member::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $months = Member::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index => $month)
        {
            $datas[$month] = $member[$index];
        }


        $villages = DB::table('villages')->count();
        $categories = DB::table('categories')->count();
        $coordinators = DB::table('coordinators')->count();
        $members = DB::table('members')->count();

        $datavillage = Village::withCount(['members', 'coordinators'])->get();
        $column = $datavillage->chunk(20);

        return view('admin.dashboard', compact('villages', 'categories', 'coordinators', 'members', 'datas', 'column'));
    }

    public function dashboard()
    {


        $member = Member::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $months = Member::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index => $month)
        {
            $datas[$month] = $member[$index];
        }

        $villages = DB::table('villages')->count();
        $categories = DB::table('categories')->count();
        $coordinators = DB::table('coordinators')->count();
        $members = DB::table('members')->count();

        $datavillage = Village::withCount(['members', 'coordinators'])->get();
        $column = $datavillage->chunk(20);

        return view('admin.dashboard', compact('villages', 'categories', 'coordinators', 'members', 'datas', 'column'));
    }
}
