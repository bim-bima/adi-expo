<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\DataPendaftaran;
use Illuminate\Http\Request;

class scanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('backend/page/scan', [
            'halaman' => 'Scan',
        ]);
    }
    public function validasi(Request $req)
    {
        $qr = $req->qr_code;
        $data = DataPendaftaran::where('token', $qr)->get()->first();
        $nama = "";
        $lomba = "";
        if ($data) {
            if ($data->bidang_lomba == 'Cosplay-Coswalk' && ($data->kategori_peserta == 'alumni' || $data->kategori_peserta == 'umum')) {
                $lomba = ' ' . $data->daftar_sebagai . ' ' . $data->kategori_peserta;
            } elseif ($data->bidang_lomba == 'Cosplay-Coswalk' && ($data->kategori_peserta == 'smp' || $data->kategori_peserta == 'sma')) {
                $lomba = ' ' . 'Peserta Coswalk ' . $data->kategori_peserta;
            } else {

                $lomba =  ' Lomba ' . $data->bidang_lomba;
            }
        }

        if ($data && $data->nama_pembimbing == null) {
            $nama = 'Nama Lengkap : ' . $data->nama_lengkap;
        } elseif ($data && $data->nama_lengkap == null) {

            $nama = 'Nama Pembimbing : ' . $data->nama_pembimbing;
        } elseif ($data && $data->nama_lengkap && $data->nama_pembimbing) {

            $nama = 'Nama Pembimbing : ' . $data->nama_pembimbing;
        } else {
            $nama = "";
        }


        if ($data && $data->status == 'pending') {

            $data->update([
                'status' => 'verified'
            ]);
            $data->save();
            return response()->json([
                'status' => 200,
                'message' => 'Data Ditemukan ' . $nama . $lomba
            ]);
        } elseif ($data && $data->status == 'verified') {
            return response()->json([
                'status' => 201,
                'message' => 'Data Ditemukan ' . $nama . $lomba
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Data "' . $qr . '" Tidak Ditemukan'
            ]);
        }
    }
}
