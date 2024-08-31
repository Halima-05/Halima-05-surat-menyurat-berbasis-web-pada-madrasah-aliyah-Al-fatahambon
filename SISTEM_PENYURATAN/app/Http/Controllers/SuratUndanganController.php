<?php

namespace App\Http\Controllers;

use App\Models\SuratUndangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratUndanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $undangan =  SuratUndangan::all();
        return view( 'undangan.index', [
            'title' => 'Data Undangan',
            'undangan' => $undangan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ta = DB::table('tahun_ajarans')->get();

        return view('undangan.create', [
            'title' => 'Form Buat Undangan',
            'ta' => $ta
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
            'acara' => 'required',
            'tahun_ajaran' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'lokasi' => 'required',
        ], $pesan_error);

        $flight = new SuratUndangan();
        $flight->no_surat = $request->no_surat;
        $flight->perihal = $request->perihal;
        $flight->acara = $request->acara;
        $flight->tanggal = $request->tanggal;
        $flight->tahun_ajaran = $request->tahun_ajaran;
        $flight->waktu = $request->waktu;
        $flight->lokasi = $request->lokasi;
        $flight->save();

        return redirect('undangan')->with('sukses', 'Undangan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $undangan = DB::table('surat_undangans')
                ->where('id', $id)
                ->first();
        $kepsek = DB::table('data_kepseks')->first();
        return view('undangan.template', [
            'title' => 'Cetak Undangan',
            'undangan' => $undangan,
            'kepsek' => $kepsek
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data =  DB::table('surat_undangans')
                 ->where('id', $id)
                 ->first();
        $ta = DB::table('tahun_ajarans')->get();
        return view( 'undangan.edit', [
            'title' => 'Edit Data Undangan',
            'data' => $data,
            'ta' => $ta
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
            'acara' => 'required',
            'tahun_ajaran' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'lokasi' => 'required'
        ], $pesan_error);

        DB::table('surat_undangans')
            ->where('id', $id)
            ->update([
                'no_surat' => $request->no_surat,
                'perihal' => $request->perihal,
                'acara' => $request->acara,
                'tahun_ajaran' => $request->tahun_ajaran,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
                'lokasi' => $request->lokasi
            ]);
        return redirect('undangan')->with('sukses', 'Undangan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('surat_undangans')
        ->where('id', $id)
        ->delete();
        
        return redirect('undangan')->with('sukses', 'data berhasil dihapus');
    }
}
