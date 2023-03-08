<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Mc;
use Illuminate\Http\Request;

class McController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $mcs = Mc::orderBy('created_at', 'desc')->get();
        return view('backend/page/mc', [
            'halaman' => 'Master Of Ceremony',
            'mcs' => $mcs
        ]);
    }

    public function viewAdd()
    {
        return view('backend/page/addMc', [
            'halaman' => 'Add MC'
        ]);
    }



    public function ActionAdd(Request $req)
    {
        $req->validate([
            'nama'=>'required|min:1',
            'jabatan'=>'required|min:1',
            'deskripsi' => 'required',
            'image' => 'image|required'
        ]);

        $namaImage = 'MC-' . uniqid() . '.' . $req->image->getClientOriginalExtension();
        $add = Mc::create([
            'nama'=>$req->nama,
            'jabatan'=>$req->jabatan,
            'deskripsi' => $req->deskripsi,
            'image' => $namaImage,
        ]);

        if ($add) {
            $req->image->storeAs('public/image/mc', $namaImage, 'local');
            return redirect('/admin/mc')->with(session()->flash('success', 'Data Berhasil Di Tambahkan'));
        }
    }


    public function viewEdit($id)
    {
        $mc = Mc::find($id);
        return view('backend/page/editMc', [
            'halaman' => 'Edit Tamu',
            'mc' => $mc
        ]);
    }


    function ActionEdit(Request $req, $id)
    {

        $cek = Mc::find($id);
        $req->validate([
            'nama'=>'required|min:1',
            'jabatan'=>'required|min:1',
            'deskripsi' => 'required',
        ]);

        $image = $req->imageLama;

        if (!$req->image == "") {
            $req->validate([
                'image' => 'image',
            ]);
            $namaImage = 'MC-' . uniqid() . '.' . $req->image->getClientOriginalExtension();
            $image = $namaImage;
            $req->image->storeAs('public/image/mc', $image, 'local');
            $file = public_path('storage/image/mc/' . $cek->image);
            if (file_exists($file)) {
                unlink($file);
            }
        }

        $edit = Mc::where('id_mc', $id)->update([
            'nama'=>$req->nama,
            'jabatan'=>$req->jabatan,
            'deskripsi' => $req->deskripsi,
            'image' => $image,
        ]);

        if ($edit) {

            return redirect('/admin/mc')->with(session()->flash('success', 'Update Berhasil'));
        }
    }

    public function delete($id)
    {
        $cek = Mc::find($id);

        $file = public_path('storage/image/mc/' . $cek->image);
        if (file_exists($file)) {
            unlink($file);
        }
        $cek->delete();
        return redirect('/admin/mc')->with(session()->flash('danger', 'Delete Berhasil'));
    }
}
