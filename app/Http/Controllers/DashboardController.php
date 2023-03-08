<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('home',[
            'halaman'=>'Dashboard'
        ]);
    }

    public function dataRegis()
    {
        $registrations = DB::table('data_pendaftaran')
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
        ->groupBy('date')
        ->get();

    return response()->json($registrations);
    }

}
