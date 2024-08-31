<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('contacts')->get();
        return view('kontak.index', [
            'title' => 'Kontak',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = DB::table('setting_landings')->first();
        return view('kontak.create', [
            'title' => 'Hubungi Kami',
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = ['required' => '*Kolom ini wajib diisi'];
        $request->validate([
            'nama' => 'required',
            'nomor_hp' => 'required',
            'subjek' => 'required',
            'pesan' => 'required'
        ], $message);

        $flash = new Contact();
        $flash->nama = $request->nama; 
        $flash->nomor_hp = $request->nomor_hp; 
        $flash->subjek = $request->subjek; 
        $flash->pesan = $request->pesan; 
        $flash->save();
        return back()->with('sukses', 'Pesan anda berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('contacts')->where('id', $id)->first();
        return view('kontak.show', [
            'title' => 'Detail Kontak',
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('contacts')->where('id', $id)->delete();
        return back()->with('Sukses', 'Data berhasil dihapus');
    }
}
