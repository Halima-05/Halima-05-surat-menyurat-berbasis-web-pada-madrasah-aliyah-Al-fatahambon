<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\SuratPindah;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratPindahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  SuratPindah::all();
        return view( 'pindah.index', [
            'title' => 'Data Siswa Pindahan keluar',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ta =  TahunAjaran::all();
        $kelas =  Kelas::all();
        return view('pindah.create', [
            'title' => 'Form buat surat pindah/keluar',
            'ta' => $ta,
            'kelas' => $kelas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pesan_error = [
            'required' => '*Kolom ini wajib diisi'
        ];
        $request->validate([
            'no_surat' => 'required',
            'nama' => 'required',
            'nisn' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'kelas' => 'required',
            'tahun_ajaran' => 'required',
            'tanggal_surat' => 'required'
        ], $pesan_error);

        $flight = new SuratPindah();
        $flight->no_surat = $request->no_surat;
        $flight->nama = $request->nama;
        $flight->nisn = $request->nisn;
        $flight->tempat_lahir = $request->tempat_lahir;
        $flight->tanggal_lahir = $request->tanggal_lahir;
        $flight->kelas = $request->kelas;
        $flight->tahun_ajaran = $request->tahun_ajaran;
        $flight->tanggal_surat = $request->tanggal_surat;
        $flight->save();

        return redirect('pindah')->with('sukses', 'Surat berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('surat_pindahs')
                ->where('id', $id)
                ->first();
        $kepsek = DB::table('data_kepseks')->first();
        return view('pindah.template', [
            'title' => 'Cetak surat pindah/keluar',
            'data' => $data,
            'kepsek' => $kepsek
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ta =  TahunAjaran::all();
        $kelas =  Kelas::all();
        $data =  DB::table('surat_pindahs')
                 ->where('id', $id)
                 ->first();

        return view( 'pindah.edit', [
            'title' => 'Edit data surat pindah',
            'data' => $data,
            'ta' => $ta,
            'kelas' => $kelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pesan_error = [
            'required' => '*Kolom ini wajib diisi'
        ];

        $request->validate([
            'no_surat' => 'required',
            'nama' => 'required',
            'nisn' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'kelas' => 'required',
            'tahun_ajaran' => 'required',
            'tanggal_surat' => 'required'
        ], $pesan_error);

        DB::table('surat_pindahs')
            ->where('id', $id)
            ->update([  
                'no_surat' => $request->no_surat,
                'nama' => $request->nama,
                'nisn' => $request->nisn,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kelas' => $request->kelas,
                'tahun_ajaran' => $request->tahun_ajaran,
                'tanggal_surat' => $request->tanggal_surat
            ]);

        return redirect('pindah')->with('sukses', 'Surat berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('surat_pindahs')
        ->where('id', $id)
        ->delete();
        
        return redirect('pindah')->with('sukses', 'data berhasil dihapus');
    }
}
