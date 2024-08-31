<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  DB::table('tahun_ajarans')
                 ->get();
        return view( 'data_tahun_ajaran.index', [
            'title' => 'Data Tahun Ajaran',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_tahun_ajaran.create', [
            'title' => 'Form Tambah Data'
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
            'tahun_ajaran' => 'required'
        ], $pesan_error);

        $flight = new TahunAjaran();
        $flight->tahun_ajaran = $request->tahun_ajaran;
        $flight->save();

        return redirect('tahun_ajaran')->with('sukses', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data =  DB::table('tahun_ajarans')
                 ->where('id', $id)
                 ->first();

        return view( 'data_tahun_ajaran.edit', [
            'title' => 'Edit Data Tahun Ajaran',
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
            'tahun_ajaran' => 'required'
        ], $pesan_error);

        DB::table('tahun_ajarans')
        ->where('id', $id)
        ->update([
            'tahun_ajaran' => $request->tahun_ajaran
        ]);
        return redirect('tahun_ajaran')->with('sukses', 'data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('tahun_ajarans')
        ->where('id', $id)
        ->delete();
        
        return redirect('tahun_ajaran')->with('sukses', 'data berhasil dihapus');
    }
}
