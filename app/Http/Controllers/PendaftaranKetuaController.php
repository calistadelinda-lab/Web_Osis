<?php

namespace App\Http\Controllers;
use App\Models\PendaftaranKetua; 
use Illuminate\Http\Request;

class PendaftaranKetuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'nama'      => 'required',
            'nisn'      => 'required|numeric',
            'kelas'     => 'required',
            'no_hp'     => 'required|numeric',
            'jabatan'   => 'required',    // ✅ field ketua
            'visi'      => 'required',
            'misi'      => 'required',
            'motivasi'  => 'required',
        ]);

        PendaftaranKetua::create($request->all());

        return redirect()->back()->with('success_ketua', 'Pendaftaran ketua berhasil disimpan.');
        //                                 ^^^^^^^^^^^^^
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
