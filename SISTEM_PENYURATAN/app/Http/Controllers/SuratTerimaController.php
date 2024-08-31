<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\SuratTerima;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratTerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  SuratTerima::all();
        return view( 'terima.index', [
            'title' => 'Data Siswa Pindahan Masuk',
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
        return view('terima.create', [
            'title' => 'Form buat surat Terima',
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
            'nama_siswa' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nisn' => 'required',
            'kelas' => 'required',
            'asal_sekolah' => 'required'
        ], $pesan_error);

        $flight = new SuratTerima();
        $flight->no_surat = $request->no_surat;
        $flight->nama_siswa = $request->nama_siswa;
        $flight->tempat_lahir = $request->tempat_lahir;
        $flight->tanggal_lahir = $request->tanggal_lahir;
        $flight->nisn = $request->nisn;
        $flight->kelas = $request->kelas;
        $flight->asal_sekolah = $request->asal_sekolah;
        $flight->save();

        return redirect('surat_terima')->with('sukses', 'Surat berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('surat_terimas')
                ->where('id', $id)
                ->first();

        $kepsek = DB::table('data_kepseks')->first();
        
        return view('terima.template', [
            'title' => 'Cetak surat Terima',
            'data' => $data,
            'kepsek' => $kepsek
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas =  Kelas::all();
        $data =  DB::table('surat_terimas')
                 ->where('id', $id)
                 ->first();

        return view( 'terima.edit', [
            'title' => 'Edit surat terima',
            'data' => $data,
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
            'nama_siswa' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nisn' => 'required',
            'kelas' => 'required',
            'asal_sekolah' => 'required'
        ], $pesan_error);

        DB::table('surat_terimas')
            ->where('id', $id)
            ->update([  
                'no_surat' => $request->no_surat,
                'nama_siswa' => $request->nama_siswa,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nisn' => $request->nisn,
                'kelas' => $request->kelas,
                'asal_sekolah' => $request->asal_sekolah
            ]);

        return redirect('surat_terima')->with('sukses', 'Surat berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('surat_terimas')
        ->where('id', $id)
        ->delete();
        
        return redirect('surat_terima')->with('sukses', 'data berhasil dihapus');
    }
}
