<?php

namespace App\Http\Controllers;

use App\Models\DataKepsek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataKepsekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  DB::table('data_kepseks')
                 ->first();
        return view( 'data_kepsek.index', [
            'title' => 'Data Kepsek',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_kepsek.create', [
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
            'nip' => 'required',
            'nama' => 'required',
            'golongan' => 'required',
            'jabatan' => 'required'
        ], $pesan_error);

        $flight = new DataKepsek();
        $flight->nip = $request->nip;
        $flight->nama = $request->nama;
        $flight->golongan = $request->golongan;
        $flight->jabatan = $request->jabatan;
        $flight->save();

        return redirect('data_kepsek')->with('sukses', 'data berhasil ditambahkan');
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
        $data =  DB::table('data_kepseks')
                 ->where('id', $id)
                 ->first();

        return view( 'data_kepsek.edit', [
            'title' => 'Edit Data Kepsek',
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
            'nip' => 'required',
            'nama' => 'required',
            'golongan' => 'required',
            'jabatan' => 'required'
        ], $pesan_error);

        DB::table('data_kepseks')
        ->where('id', $id)
        ->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'golongan' => $request->golongan,
            'jabatan' => $request->jabatan
        ]);
        return redirect('data_kepsek')->with('sukses', 'data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('data_kepseks')
        ->where('id', $id)
        ->delete();
        
        return redirect('data_kepsek.index')->with('sukses', 'data berhasil dihapus');
    }
}
