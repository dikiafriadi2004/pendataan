<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $villages = DB::table('villages')->count();
        $categories = DB::table('categories')->count();
        $coordinators = DB::table('coordinators')->count();
        $members = DB::table('members')->count();

        return view('admin.dashboard', compact('villages', 'categories', 'coordinators', 'members'));
    }
}
