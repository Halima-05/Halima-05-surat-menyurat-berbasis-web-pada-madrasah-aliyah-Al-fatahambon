<?php

namespace App\Http\Controllers;

use App\Models\SuratPanggilan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class SuratPanggilanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  SuratPanggilan::all();
        return view('surat_panggilan.index', [
            'title' => 'Data Surat Panggilan',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surat_panggilan.create', [
            'title' => 'Form Buat Surat Panggilan'
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
            'perihal' => 'required',
            'nama_siswa' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'tempat' => 'required',
            'nama_guru' => 'required'
        ], $pesan_error);

        $flight = new SuratPanggilan();
        $flight->no_surat = $request->no_surat;
        $flight->perihal = $request->perihal;
        $flight->nama_siswa = $request->nama_siswa;
        $flight->tanggal = $request->tanggal;
        $flight->waktu = $request->waktu;
        $flight->tempat = $request->tempat;
        $flight->nama_guru = $request->nama_guru;
        $flight->save();

        return redirect('panggilan')->with('sukses', 'Surat berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('surat_panggilans')
                ->where('id', $id)
                ->first();
                
        $kepsek = DB::table('data_kepseks')->first();
        return view('surat_panggilan.template', [
            'title' => 'Cetak Surat Panggilan',
            'data' => $data,
            'kepsek' => $kepsek
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data =  DB::table('surat_panggilans')
                 ->where('id', $id)
                 ->first();

        return view( 'surat_panggilan.edit', [
            'title' => 'Edit surat panggilan',
            'data' => $data
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
            'perihal' => 'required',
            'nama_siswa' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'tempat' => 'required',
            'nama_guru' => 'required'
        ], $pesan_error);

        DB::table('surat_panggilans')
        ->where('id', $id)
        ->update([
            'no_surat' => $request->no_surat,
            'perihal' => $request->perihal,
            'nama_siswa' => $request->nama_siswa,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'tempat' => $request->tempat,
            'nama_guru' => $request->nama_guru
        ]);

        return redirect('panggilan')->with('sukses', 'Surat berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('surat_panggilans')
        ->where('id', $id)
        ->delete();
        return redirect('panggilan')->with('sukses', 'Surat berhasil dihapus');
    }
}
