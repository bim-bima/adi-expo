<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $kegiatans = Kegiatan::orderBy('created_at', 'desc')->get();
        return view('backend/page/kegiatan', [
            'halaman' => 'Daftar Kegiatan',
            'kegiatans' => $kegiatans
        ]);
    }

    public function viewAdd()
    {
        return view('backend/page/addKegiatan', [
            'halaman' => 'Add Data Kegiatan'
        ]);
    }



    public function ActionAdd(Request $req)
    {
        $req->validate([
            'nama_kegiatan'=>'required|min:1',
            'deskripsi' => 'required',
            'image' => 'image|required'
        ]);
        // |dimensions:max_width=576,max_height=576

        $namaImage = 'kegiatan-' . uniqid() . '.' . $req->image->getClientOriginalExtension();
        $add = Kegiatan::create([
            'nama_kegiatan'=>$req->nama_kegiatan,
            'deskripsi' => $req->deskripsi,
            'image' => $namaImage,
        ]);

        if ($add) {
            $req->image->storeAs('public/image/kegiatan', $namaImage, 'local');
            return redirect('/admin/kegiatan')->with(session()->flash('success', 'Data Berhasil Di Tambahkan'));
        }
    }


    public function viewEdit($id)
    {
        $kegiatan = Kegiatan::find($id);
        return view('backend/page/editKegiatan', [
            'halaman' => 'Edit Tamu',
            'kegiatan' => $kegiatan
        ]);
    }


    function ActionEdit(Request $req, $id)
    {

        $cek = Kegiatan::find($id);
        $req->validate([
            'nama_kegiatan'=>'required|min:1',
            'deskripsi' => 'required',
        ]);

        $image = $req->imageLama;

        if (!$req->image == "") {
            $req->validate([
                'image' => 'image',
            ]);
            $namaImage = 'kegiatan-' . uniqid() . '.' . $req->image->getClientOriginalExtension();
            $image = $namaImage;
            $req->image->storeAs('public/image/kegiatan', $image, 'local');
            $file = public_path('storage/image/kegiatan/' . $cek->image);
            if (file_exists($file)) {
                unlink($file);
            }
        }

        $edit = Kegiatan::where('id', $id)->update([
            'nama_kegiatan'=>$req->nama_kegiatan,
            'deskripsi' => $req->deskripsi,
            'image' => $image,
        ]);

        if ($edit) {

            return redirect('/admin/kegiatan')->with(session()->flash('success', 'Update Berhasil'));
        }
    }

    public function delete($id)
    {
        $cek = Kegiatan::find($id);

        $file = public_path('storage/image/kegiatan/' . $cek->image);
        if (file_exists($file)) {
            unlink($file);
        }
        $cek->delete();
        return redirect('/admin/kegiatan')->with(session()->flash('danger', 'Delete Berhasil'));
    }
}
