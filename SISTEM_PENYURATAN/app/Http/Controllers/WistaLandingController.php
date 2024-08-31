<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WistaLandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_wisata = DB::table('wisatas')->get();
        return view('wisata_landing.index', [
            'data_wisata' => $data_wisata
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data_wisata_show = DB::table('wisatas')->where('id_wisata', $id)->first();
        
        return view('wisata_landing.show', [
            'data' => $data_wisata_show
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
        //
    }
}
