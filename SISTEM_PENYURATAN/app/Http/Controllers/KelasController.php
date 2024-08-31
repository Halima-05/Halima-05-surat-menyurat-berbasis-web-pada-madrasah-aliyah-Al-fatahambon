<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  DB::table('kelas')
                 ->get();
        return view( 'data_kelas.index', [
            'title' => 'Data Kelas',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_kelas.create', [
            'title' => 'Form Tambah Data Kelas'
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
            'kelas' => 'required'
        ], $pesan_error);

        $flight = new Kelas();
        $flight->kelas = $request->kelas;
        $flight->save();

        return redirect('data_kelas')->with('sukses', 'data kelas berhasil ditambahkan');
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
        $data =  DB::table('kelas')
                 ->where('id', $id)
                 ->first();

        return view( 'data_kelas.edit', [
            'title' => 'Edit Data Kelas',
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
            'kelas' => 'required'
        ], $pesan_error);

        DB::table('kelas')
        ->where('id', $id)
        ->update([
            'kelas' => $request->kelas
        ]);
        return redirect('data_kelas')->with('sukses', 'data kelas berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('kelas')
        ->where('id', $id)
        ->delete();
        
        return redirect('kelas')->with('sukses', 'data kelas berhasil dihapus');
    }
}
