<?php

namespace App\Http\Controllers;



use App\Mail\BuktiPendaftaran;
use App\Mail\BuktiPendaftaranLombaDebatBahasaInggris;
use App\Mail\BuktiPendaftaranPeserta;
use App\Mail\BuktiPendaftaranPesertaSmp;
use App\Models\DataPendaftaran;
use App\Models\Kegiatan;
use App\Models\Lomba;
use App\Models\Mc;
use App\Models\Pendaftaran;
use App\Models\Sponsor;
use App\Models\Tamu;
use App\Services\KickboxService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use LaravelQRCode\Facades\QRCode;

class HomeController extends Controller
{
   /**
    * Create a new controller instance.
    *
    * @return void
    */


   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */

   public function __construct()
   {
      $imagePath = public_path('imageQr');
      if (!is_dir($imagePath)) {

         mkdir($imagePath);
      }
   }

   public function landingPage()
   {
      $tamus = Tamu::get()->take(3);
      $mcs = Mc::all();
      $kegiatan = Kegiatan::all();
      $sponsors = Sponsor::orderBy('created_at','asc')->get();
      $lombas = Lomba::all();

      return view('welcome', [
         'tamus' => $tamus,
         'mcs' => $mcs,
         'kegiatans' => $kegiatan,
         'sponsors' => $sponsors,
         'lombas' => $lombas,
      ]);
   }

   public function daftar()
   {
      $tamus = Tamu::get()->take(3);
      $mcs = Mc::all();
      $kegiatan = Kegiatan::all();
      $sponsors = Sponsor::all();
      $lombas = Lomba::all();

      return view('daftar', [
         'lomba' => Lomba::all(),
         'tamus' => $tamus,
         'mcs' => $mcs,
         'kegiatans' => $kegiatan,
         'sponsors' => $sponsors,
         'lombas' => $lombas,
      ]);
   }

   public function formCerdasCermat()
   {
      $tamus = Tamu::get()->take(3);
      $mcs = Mc::all();
      $kegiatan = Kegiatan::all();
      $sponsors = Sponsor::all();
      $lombas = Lomba::all();
      return view('form_cerdas_cermat', [
         'lomba' => Lomba::all(),
         'tamus' => $tamus,
         'mcs' => $mcs,
         'kegiatans' => $kegiatan,
         'sponsors' => $sponsors,
         'lombas' => $lombas,
      ]);
   }

   public function formDebatBahasaInggris()
   {
      $tamus = Tamu::get()->take(3);
      $mcs = Mc::all();
      $kegiatan = Kegiatan::all();
      $sponsors = Sponsor::all();
      $lombas = Lomba::all();
      return view('form_debat_bahasa_inggris', [
         'lomba' => Lomba::all(),
         'tamus' => $tamus,
         'mcs' => $mcs,
         'kegiatans' => $kegiatan,
         'sponsors' => $sponsors,
         'lombas' => $lombas,
      ]);
   }
   public function formDaftarCosplay()
   {
      $tamus = Tamu::get()->take(3);
      $mcs = Mc::all();
      $kegiatan = Kegiatan::all();
      $sponsors = Sponsor::all();
      $lombas = Lomba::all();
      return view('form_daftar_cosplay', [
         'lomba' => Lomba::all(),
         'tamus' => $tamus,
         'mcs' => $mcs,
         'kegiatans' => $kegiatan,
         'sponsors' => $sponsors,
         'lombas' => $lombas,
      ]);
   }

   public function CerdasCermat(Request $req)
   {
      $req->validate([
         'nama_sekolah' => 'required',
         'alamat_sekolah' => 'required',
         'nama_pembimbing' => 'required',
         'no_pembimbing' => 'required',
         'email_pembimbing' => 'required',
         'nama_ketua' => 'required',
         'nama_anggota1' => 'required',
         'nama_anggota2' => 'required',
      ]);
      $token = md5($req->email_pembimbing) . '-' . uniqid() . date('ymdhis') . uniqid();
      $namaQr = $req->email_pembimbing . uniqid() . date('ymdhis') . '.' . 'png';

      QRCode::text($token)->setOutfile(public_path('imageQr/' . $namaQr))->png();

      if (file_exists(public_path('imageQr/' . $namaQr))) {

         $data = [
            'nama_sekolah' => $req->nama_sekolah,
            'alamat_sekolah' => $req->alamat_sekolah,
            'nama_pembimbing' => $req->nama_pembimbing,
            'no_pembimbing' => $req->no_pembimbing,
            'email_pembimbing' => $req->email_pembimbing,
            'nama_ketua' => $req->nama_ketua,
            'nama_anggota1' => $req->nama_anggota1,
            'nama_anggota2' => $req->nama_anggota2,
            'bidang_lomba' => $req->bidang_lomba
         ];

         DataPendaftaran::create([
            'nama_sekolah' => $req->nama_sekolah,
            'alamat_sekolah' => $req->alamat_sekolah,
            'nama_pembimbing' => $req->nama_pembimbing,
            'no_pembimbing' => $req->no_pembimbing,
            'email_pembimbing' => $req->email_pembimbing,
            'nama_ketua' => $req->nama_ketua,
            'nama_anggota1' => $req->nama_anggota1,
            'nama_anggota2' => $req->nama_anggota2,
            'bidang_lomba' => $req->bidang_lomba,
            'qr' => $namaQr,
            'token' => $token,
         ]);
         Mail::to($req->email_pembimbing)->send(new BuktiPendaftaran($data));
         return redirect('/')->with(session()->flash('daftarS', $req->email_pembimbing));
      } else {
         return redirect('/')->with(session()->flash('gagalS', $req->email_pembimbing));
      }
   }

   public function DebatBahasaInggris(Request $req)
   {
      $req->validate([
         'nama_sekolah' => 'required',
         'alamat_sekolah' => 'required',
         'nama_pembimbing' => 'required',
         'no_pembimbing' => 'required',
         'email_pembimbing' => 'required',
         'kelas' => 'required',
         'nama_lengkap' => 'required',
         'no_peserta' => 'required',
      ]);

      $token = md5($req->email_pembimbing) . '-' . uniqid() . date('ymdhis') . uniqid();
      $namaQr = $req->email_pembimbing . uniqid() . date('ymdhis') . '.' . 'png';

      QRCode::text($token)->setOutfile(public_path('imageQr/' . $namaQr))->png();

      if (file_exists(public_path('imageQr/' . $namaQr))) {
         DataPendaftaran::create([
            'nama_sekolah' => $req->nama_sekolah,
            'alamat_sekolah' => $req->alamat_sekolah,
            'nama_pembimbing' => $req->nama_pembimbing,
            'no_pembimbing' => $req->no_pembimbing,
            'email_pembimbing' => $req->email_pembimbing,
            'kelas' => $req->kelas,
            'nama_lengkap' => $req->nama_lengkap,
            'no_peserta' => $req->no_peserta,
            'bidang_lomba' => $req->bidang_lomba,
            'qr' => $namaQr,
            'token' => $token,
         ]);

         $data = [
            'nama_sekolah' => $req->nama_sekolah,
            'alamat_sekolah' => $req->alamat_sekolah,
            'nama_pembimbing' => $req->nama_pembimbing,
            'no_pembimbing' => $req->no_pembimbing,
            'email_pembimbing' => $req->email_pembimbing,
            'kelas' => $req->kelas,
            'nama_lengkap' => $req->nama_lengkap,
            'no_peserta' => $req->no_peserta,
            'bidang_lomba' => $req->bidang_lomba,


         ];

         Mail::to($req->email_pembimbing)->send(new BuktiPendaftaranLombaDebatBahasaInggris($data));

         return redirect('/')->with(session()->flash('daftarS', $req->email_pembimbing));
      } else {
         return redirect('/')->with(session()->flash('gagalS', $req->email_pembimbing));
      }
   }

   public function DaftarCosplaySmp(Request $req)
   {

      $req->validate([
         'nama_sekolah' => 'required',
         'alamat_sekolah' => 'required',
         'nama_lengkap' => 'required',
         'no_peserta' => 'required',
         'no_kartu_identitas' => 'required',
         'alamat_peserta' => 'required',
         'email_peserta' => 'required',
         'umur' => 'required',
         'chara_anime' => 'required',
      ]);

      $token = md5($req->email_peserta) . '-' . uniqid() . date('ymdhis') . uniqid();
      $namaQr = $req->email_peserta . uniqid() . date('ymdhis') . '.' . 'png';

      QRCode::text($token)->setOutfile(public_path('imageQr/' . $namaQr))->png();

      if (file_exists(public_path('imageQr/' . $namaQr))) {

         $data = [
            'nama_sekolah' => $req->nama_sekolah,
            'alamat_sekolah' => $req->alamat_sekolah,
            'nama_lengkap' => $req->nama_lengkap,
            'no_peserta' => $req->no_peserta,
            'no_kartu_identitas' => $req->no_kartu_identitas,
            'alamat_peserta' => $req->alamat_peserta,
            'email_peserta' => $req->email_peserta,
            'umur' => $req->umur,
            'chara_anime' => $req->chara_anime,
            'kategori_peserta' => $req->kategori_peserta,
         ];

         $tambah = DataPendaftaran::create([
            'nama_sekolah' => $req->nama_sekolah,
            'alamat_sekolah' => $req->alamat_sekolah,
            'nama_lengkap' => $req->nama_lengkap,
            'no_peserta' => $req->no_peserta,
            'no_kartu_identitas' => $req->no_kartu_identitas,
            'alamat_peserta' => $req->alamat_peserta,
            'email_peserta' => $req->email_peserta,
            'umur' => $req->umur,
            'chara_anime' => $req->chara_anime,
            'kategori_peserta' => $req->kategori_peserta,
            'bidang_lomba' => 'Cosplay-Coswalk',
            'qr' => $namaQr,
            'token' => $token,
         ]);

         if ($tambah) {
            Mail::to($req->email_peserta)->send(new BuktiPendaftaranPesertaSmp($data));

            return redirect('/')->with(session()->flash('daftarSumum', $req->email_peserta));
         }
      } else {
         return redirect('/')->with(session()->flash('gagalS', $req->email_pembimbing));
      }
   }


   public function DaftarCosplaySma(Request $req)
   {

      $req->validate([
         'nama_sekolah' => 'required',
         'alamat_sekolah' => 'required',
         'nama_lengkap' => 'required',
         'no_peserta' => 'required',
         'no_kartu_identitas' => 'required',
         'alamat_peserta' => 'required',
         'email_peserta' => 'required',
         'umur' => 'required',
         'chara_anime' => 'required',
      ]);

      $token = md5($req->email_peserta) . '-' . uniqid() . date('ymdhis') . uniqid();
      $namaQr = $req->email_peserta . uniqid() . date('ymdhis') . '.' . 'png';

      QRCode::text($token)->setOutfile(public_path('imageQr/' . $namaQr))->png();

      if (file_exists(public_path('imageQr/' . $namaQr))) {

         $data = [
            'nama_sekolah' => $req->nama_sekolah,
            'alamat_sekolah' => $req->alamat_sekolah,
            'nama_lengkap' => $req->nama_lengkap,
            'no_peserta' => $req->no_peserta,
            'no_kartu_identitas' => $req->no_kartu_identitas,
            'alamat_peserta' => $req->alamat_peserta,
            'email_peserta' => $req->email_peserta,
            'umur' => $req->umur,
            'chara_anime' => $req->chara_anime,
            'kategori_peserta' => $req->kategori_peserta,
         ];

         $tambah = DataPendaftaran::create([
            'nama_sekolah' => $req->nama_sekolah,
            'alamat_sekolah' => $req->alamat_sekolah,
            'nama_lengkap' => $req->nama_lengkap,
            'no_peserta' => $req->no_peserta,
            'no_kartu_identitas' => $req->no_kartu_identitas,
            'alamat_peserta' => $req->alamat_peserta,
            'email_peserta' => $req->email_peserta,
            'umur' => $req->umur,
            'chara_anime' => $req->chara_anime,
            'kategori_peserta' => $req->kategori_peserta,
            'bidang_lomba' => 'Cosplay-Coswalk',
            'qr' => $namaQr,
            'token' => $token,

         ]);

         if ($tambah) {
            Mail::to($req->email_peserta)->send(new BuktiPendaftaranPesertaSmp($data));
            return redirect('/')->with(session()->flash('daftarSumum', $req->email_peserta));
         }
      } else {
         return redirect('/')->with(session()->flash('gagalS', $req->email_pembimbing));
      }
   }

   public function DaftarCosplayUmum(Request $req)
   {

      $req->validate([
         'daftar_sebagai' => 'required',
         'nama_lengkap' => 'required',
         'no_peserta' => 'required',
         'no_kartu_identitas' => 'required',
         'alamat_peserta' => 'required',
         'email_peserta' => 'required',
         'umur' => 'required',
         'chara_anime' => 'required',
      ]);

      $token = md5($req->email_peserta) . '-' . uniqid() . date('ymdhis') . uniqid();
      $namaQr = $req->email_peserta . uniqid() . date('ymdhis') . '.' . 'png';

      QRCode::text($token)->setOutfile(public_path('imageQr/' . $namaQr))->png();

      if (file_exists(public_path('imageQr/' . $namaQr))) {

         $tambah = DataPendaftaran::create([
            'daftar_sebagai' => $req->daftar_sebagai,
            'nama_lengkap' => $req->nama_lengkap,
            'no_peserta' => $req->no_peserta,
            'no_kartu_identitas' => $req->no_kartu_identitas,
            'alamat_peserta' => $req->alamat_peserta,
            'email_peserta' => $req->email_peserta,
            'umur' => $req->umur,
            'chara_anime' => $req->chara_anime,
            'kategori_peserta' => $req->kategori_peserta,
            'bidang_lomba' => 'Cosplay-Coswalk',
            'qr' => $namaQr,
            'token' => $token,

         ]);

         $data = [
            'daftar_sebagai' => $req->daftar_sebagai,
            'nama_lengkap' => $req->nama_lengkap,
            'no_peserta' => $req->no_peserta,
            'no_kartu_identitas' => $req->no_kartu_identitas,
            'alamat_peserta' => $req->alamat_peserta,
            'email_peserta' => $req->email_peserta,
            'umur' => $req->umur,
            'chara_anime' => $req->chara_anime,
            'kategori_peserta' => $req->kategori_peserta,
         ];

         if ($tambah) {
            Mail::to($req->email_peserta)->send(new BuktiPendaftaranPeserta($data));

            return redirect('/')->with(session()->flash('daftarSumum', $req->email_peserta));
         }
      } else {
         return redirect('/')->with(session()->flash('gagalS', $req->email_pembimbing));
      }
   }


   public function DaftarCosplayAlumni(Request $req)
   {

      $req->validate([
         'jurusan_alumni' => 'required',
         'daftar_sebagai' => 'required',
         'nama_lengkap' => 'required',
         'no_peserta' => 'required',
         'no_kartu_identitas' => 'required',
         'alamat_peserta' => 'required',
         'email_peserta' => 'required',
         'umur' => 'required',
         'chara_anime' => 'required',
      ]);

      $token = md5($req->email_peserta) . '-' . uniqid() . date('ymdhis') . uniqid();
      $namaQr = $req->email_peserta . uniqid() . date('ymdhis') . '.' . 'png';

      QRCode::text($token)->setOutfile(public_path('imageQr/' . $namaQr))->png();

      if (file_exists(public_path('imageQr/' . $namaQr))) {

         $tambah = DataPendaftaran::create([
            'jurusan_alumni' => $req->jurusan_alumni,
            'daftar_sebagai' => $req->daftar_sebagai,
            'nama_lengkap' => $req->nama_lengkap,
            'no_peserta' => $req->no_peserta,
            'no_kartu_identitas' => $req->no_kartu_identitas,
            'alamat_peserta' => $req->alamat_peserta,
            'email_peserta' => $req->email_peserta,
            'umur' => $req->umur,
            'chara_anime' => $req->chara_anime,
            'kategori_peserta' => $req->kategori_peserta,
            'bidang_lomba' => 'Cosplay-Coswalk',
            'qr' => $namaQr,
            'token' => $token,

         ]);

         $data = [
            'daftar_sebagai' => $req->daftar_sebagai,
            'nama_lengkap' => $req->nama_lengkap,
            'no_peserta' => $req->no_peserta,
            'no_kartu_identitas' => $req->no_kartu_identitas,
            'alamat_peserta' => $req->alamat_peserta,
            'email_peserta' => $req->email_peserta,
            'umur' => $req->umur,
            'chara_anime' => $req->chara_anime,
            'kategori_peserta' => $req->kategori_peserta,
         ];

         if ($tambah) {
            Mail::to($req->email_peserta)->send(new BuktiPendaftaranPeserta($data));

            return redirect('/')->with(session()->flash('daftarSumum', $req->email_peserta));
         }
      } else {
         return redirect('/')->with(session()->flash('gagalS', $req->email_pembimbing));
      }

      // dd($req->jurusan_alumni);
   }

































   public function P_daftar(Request $req)
   {
      $req->validate([
         'email' => 'required',
         'nama' => 'required',
         'nis' => 'required|min:7',
         'asal_sekolah' => 'required',
         'tingkat_pendidikan' => 'required',
         'kelas' => 'required',
         'kartu_pelajar' => 'image|required',
         'foto_diri' => 'image|required',
         'nama_pembimbing' => 'min:3',
         'jenis_kelamin' => 'required',
         'umur' => 'required',
         'id_lomba' => 'required',
      ], [
         'id_lomba.required' => 'The Lomba field is required. '
      ]);


      $namaIdentitas = 'Kartu-Identitas-' . uniqid() . '.' . $req->kartu_pelajar->getClientOriginalExtension();
      $namaFoto = 'Foto-' . uniqid() . '.' . $req->foto_diri->getClientOriginalExtension();



      $token = $req->input('g-recaptcha-response');

      if (strlen($token) > 0) {
         $daftar = Pendaftaran::create([
            'email' => $req->email,
            'nama' => $req->nama,
            'nis' => $req->nis,
            'asal_sekolah' => $req->asal_sekolah,
            'tingkat_pendidikan' => $req->tingkat_pendidikan,
            'kelas' => $req->kelas,
            'kartu_pelajar' => $namaIdentitas,
            'foto_diri' => $namaFoto,
            'nama_pembimbing' => $req->nama_pembimbing,
            'jenis_kelamin' => $req->jenis_kelamin,
            'umur' => $req->umur,
            'id_lomba' => $req->id_lomba,
         ]);

         if ($daftar) {
            $req->kartu_pelajar->storeAs('public/image/identitas', $namaIdentitas, 'local');
            $req->foto_diri->storeAs('public/image/foto', $namaFoto, 'local');

            return redirect('/')->with(session()->flash('daftarS', 'Daftar Berhasil'));
         }
      } else {
         return redirect('/daftar')->with(session()->flash('chapcha', 'Isi Chapcha Dulu Mas Broo'));
      }
   }
}
