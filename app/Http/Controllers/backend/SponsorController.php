<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }   
    public function index()
    {

        $sponsors = Sponsor::orderBy('created_at', 'desc')->get();
        return view('backend/page/sponsor', [
            'halaman' => 'Sponsor ADIEXPO',
            'sponsors' => $sponsors
        ]);
    }

    public function viewAdd()
    {
        return view('backend/page/addSponsor', [
            'halaman' => 'Add Sponsor'
        ]);
    }

    public function ActionAdd(Request $req)
    {
        $req->validate([
            'nama_sponsor' => 'required',
            'image' => 'image|required'
        ]);

        $namaImage = 'sponsor-' . uniqid() . '.' . $req->image->getClientOriginalExtension();
        $add = Sponsor::create([
            'nama_sponsor' => $req->nama_sponsor,
            'image' => $namaImage,
        ]);

        if ($add) {
            $req->image->storeAs('public/image/sponsor', $namaImage, 'local');
            return redirect('/admin/sponsor')->with(session()->flash('success', 'Data Berhasil Di Tambahkan'));
        }
    }


    public function viewEdit($id)
    {
        $tamu = Sponsor::find($id);
        return view('backend/page/editTamu', [
            'halaman' => 'Edit Tamu',
            'tamu' => $tamu
        ]);
    }


    

    public function delete($id)
    {
        $cek = Sponsor::find($id);

        $file = public_path('storage/image/sponsor/' . $cek->image);
        if (file_exists($file)) {
            unlink($file);
        }
        $cek->delete();
        return redirect('/admin/sponsor')->with(session()->flash('danger', 'Delete Berhasil'));
    }
}
