<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Lomba;
use Illuminate\Http\Request;

class LombaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $lombas = Lomba::orderBy('created_at', 'desc')->get();
        return view('backend/page/lomba', [
            'halaman' => 'Daftar Lomba',
            'lombas' => $lombas
        ]);
    }

    public function viewAdd()
    {
        return view('backend/page/addLomba', [
            'halaman' => 'Add Data Lomba'
        ]);
    }



    public function ActionAdd(Request $req)
    {
        $req->validate([
            'nama_lomba'=>'required|min:1',
            'deskripsi' => 'required',
            'harga' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
        ]);
        // |dimensions:max_width=576,max_height=576

        
        $add = Lomba::create([
            'nama_lomba'=>$req->nama_lomba,
            'deskripsi' => $req->deskripsi,
            'harga' => $req->harga,
            'tgl_mulai' => $req->tgl_mulai,
            'tgl_selesai' => $req->tgl_selesai,
        ]);

        if ($add) {
            
            return redirect('/admin/lomba')->with(session()->flash('success', 'Data Berhasil Di Tambahkan'));
        }
    }


    public function viewEdit($id)
    {
        $lomba = Lomba::find($id);
        return view('backend/page/editLomba', [
            'halaman' => 'Edit Lomba',
            'lomba' => $lomba
        ]);
    }


    function ActionEdit(Request $req, $id)
    {

        $req->validate([
            'nama_lomba'=>'required|min:1',
            'deskripsi' => 'required',
            'harga' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
        ]);

        $edit = Lomba::where('id_lomba', $id)->update([
            'nama_lomba'=>$req->nama_lomba,
            'deskripsi' => $req->deskripsi,
            'harga' => $req->harga,
            'tgl_mulai' => $req->tgl_mulai,
            'tgl_selesai' => $req->tgl_selesai,
        ]);

        if ($edit) {
            return redirect('/admin/lomba')->with(session()->flash('success', 'Update Berhasil'));
        }
    }

    public function delete($id)
    {
        $cek = Lomba::find($id);
        $cek->delete();
        return redirect('/admin/lomba')->with(session()->flash('danger', 'Delete Berhasil'));
    }
}
