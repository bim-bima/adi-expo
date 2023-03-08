<?php

namespace App\Http\Controllers\backend;

use App\Exports\DataPendaftaranExport;
use App\Http\Controllers\Controller;
use App\Mail\BuktiPendaftaranLombaDebatBahasaInggris;
use App\Mail\PesanMail;
use App\Models\DataPendaftaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use LaravelQRCode\Facades\QRCode;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DataImport;

class PendaftarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $dataCosplaySmp = DataPendaftaran::where('bidang_lomba', 'Cosplay-Coswalk')->where('kategori_peserta', 'smp')
            ->orderBy('created_at', 'desc')->get();

        $dataCosplaySma = DataPendaftaran::where('bidang_lomba', 'Cosplay-Coswalk')->where('kategori_peserta', 'sma')
            ->orderBy('created_at', 'desc')->get();

        $dataCosplayUmum = DataPendaftaran::where('bidang_lomba', 'Cosplay-Coswalk')->where('kategori_peserta', 'umum')
            ->orderBy('created_at', 'desc')->get();

        $dataCosplayAlumni = DataPendaftaran::where('bidang_lomba', 'Cosplay-Coswalk')->where('kategori_peserta', 'alumni')
            ->orderBy('created_at', 'desc')->get();

        $dataLombaCerdasCermat = DataPendaftaran::where('bidang_lomba', 'Cerdas Cermat')
            ->orderBy('created_at', 'desc')->get();

        $dataLombaDebatBahasaInggris = DataPendaftaran::where('bidang_lomba', 'Debat Bahasa Inggris')
            ->orderBy('created_at', 'desc')->get();
        return view('backend/page/pendaftar', [
            'halaman' => 'Data Pendaftaran',
            'dataCosplaySmp' => $dataCosplaySmp,
            'dataCosplaySma' => $dataCosplaySma,
            'dataCosplayUmum' => $dataCosplayUmum,
            'dataCosplayAlumni' => $dataCosplayAlumni,
            'dataLombaCerdasCermat' => $dataLombaCerdasCermat,
            'dataLombaDebatBahasaInggris' => $dataLombaDebatBahasaInggris,

        ]);
    }
    public function delete($id)
    {
        $cek = Pendaftaran::find($id);

        $file = public_path('storage/image/kegiatan/' . $cek->image);
        if (file_exists($file)) {
            unlink($file);
            $cek->delete();
        }
        return redirect('/admin/kegiatan')->with(session()->flash('danger', 'Delete Berhasil'));
    }


    public function verifikasiDaftar($id)
    {
        $cek = DataPendaftaran::where('id_daftar', $id)->get()->first();
        $cek->update(['status' => 'pending']);
        $cek->save();

        $data = [
            'qr' => $cek->qr
        ];

        $email = "";
        if ($cek && $cek->email_pembimbing == null) {
            $email = $cek->email_peserta;
        } elseif ($cek && $cek->email_peserta == null) {

            $email = $cek->email_pembimbing;
        } else {
            $email = "";
        }
        Mail::to($email)->send(new PesanMail($data));


        return redirect('/admin/pendaftar')->with(session()->flash('success', 'Verified Success'));
    }

    public function exel()
    {
        // $pendaftar = DataPendaftaran::all();
        // $data = [];
        // foreach ($pendaftar as $row) {
        //     $data = [
        //         'nama_sekolah'=>$row->nama_sekolah,
        //         'alamat_sekolah'=>$row->alamat_sekolah,
        //         'nama_pembimbing'=>$row->nama_pembimbing,
        //         'no_pembimbing'=>$row->no_pembimbing,
        //         'email_pembimbing'=>$row->email_pembimbing,
        //         'nama_ketua'=>$row->nama_sekolah,
        //         'nama_anggota1'=>$row->nama_anggota1,
        //         'nama_anggota2'=>$row->nama_anggota2,
        //         'nama_lengkap'=>$row->nama_lengkap,
        //         'no_peserta'=>$row->no_peserta,
        //         'no_kartu_identitas'=>$row->no_kartu_identitas,
        //         'alamat_peserta'=>$row->alamat_peserta,
        //         'email_peserta'=>$row->email_peserta,
        //         'umur'=>$row->umur,
        //         'chara_anime'=>$row->chara_anime,
        //         'jurusan_alumni'=>$row->jurusan_alumni,
        //         'bidang_lomba'=>$row->bidang_lomba,
        //         'kelas'=>$row->kelas,
        //         'kategori_peserta'=>$row->kategori_peserta,
        //         'daftar_sebagai'=>$row->daftar_sebagai,
        //         'status'=>$row->status,
        //     ];
        // }

        return Excel::download(new DataPendaftaranExport, 'DataPendaftaran.xlsx');
    }

    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        $import = new DataImport();
        Excel::import($import, $file);

        if($import->failures()->isNotEmpty()) {
            $failures = $import->failures();
        
            $errorArray = [];
            foreach ($failures as $failure) {
                $row = $failure->row();
                $column = $failure->attribute();
                $error = $failure->errors()[0];
                $errorArray[] = "Baris ke-$row, kolom $column: $error";
            }
        
            return redirect()->back()->with('error', $errorArray);
        }
        

        return redirect()->back()->with('success', 'Data berhasil diimpor.');
    }
}
