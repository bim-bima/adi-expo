<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Tamu;
use Illuminate\Http\Request;

class ControllerBintangTamu extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $tamus = Tamu::orderBy('created_at', 'desc')->get();
        return view('backend/page/tamu', [
            'halaman' => 'Bintang Tamu',
            'tamus' => $tamus
        ]);
    }

    public function viewAdd()
    {
        return view('backend/page/addTamu', [
            'halaman' => 'Add Tamu'
        ]);
    }

    public function ActionAdd(Request $req)
    {
        $req->validate([
            'deskripsi' => 'required',
            'image' => 'image|required'
        ]);

        $namaImage = 'Tamu-' . uniqid() . '.' . $req->image->getClientOriginalExtension();
        $add = Tamu::create([
            'image' => $namaImage,
            'deskripsi' => $req->deskripsi,
        ]);

        if ($add) {
            $req->image->storeAs('public/image/tamu', $namaImage, 'local');
            return redirect('/admin/tamu')->with(session()->flash('success', 'Data Berhasil Di Tambahkan'));
        }
    }


    public function viewEdit($id)
    {
        $tamu = Tamu::find($id);
        return view('backend/page/editTamu', [
            'halaman' => 'Edit Tamu',
            'tamu' => $tamu
        ]);
    }


    function ActionEdit(Request $req, $id)
    {

        $cek = Tamu::find($id);
        $req->validate([
            'deskripsi' => 'required'
        ]);

        $image = $req->imageLama;

        if (!$req->image == "") {
            $req->validate([
                'image' => 'image',
            ]);
            $namaImage = 'Tamu-' . uniqid() . '.' . $req->image->getClientOriginalExtension();
            $image = $namaImage;
            $req->image->storeAs('public/image/tamu', $image, 'local');
            $file = public_path('storage/image/tamu/' . $cek->image);
            if (file_exists($file)) {
                unlink($file);
            }
        }

        $edit = Tamu::where('id', $id)->update([
            'image' => $image,
            'deskripsi' => $req->deskripsi
        ]);

        if ($edit) {


            return redirect('/admin/tamu')->with(session()->flash('success', 'Update Berhasil'));
        }
    }

    public function delete($id)
    {
        $cek = Tamu::find($id);

        $file = public_path('storage/image/tamu/' . $cek->image);
        if (file_exists($file)) {
            unlink($file);
        }
        $cek->delete();
        return redirect('/admin/tamu')->with(session()->flash('danger', 'Delete Berhasil'));
    }
}
