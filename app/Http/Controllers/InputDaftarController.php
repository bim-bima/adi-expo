<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputDaftarController extends Controller
{
    public function index()
    {
        return view('backend/page/inputDataPendaftar',[
            'halaman'=>'Input Data Pendaftar'
        ]);
    }
}
