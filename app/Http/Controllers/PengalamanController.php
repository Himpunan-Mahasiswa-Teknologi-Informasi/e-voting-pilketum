<?php

namespace App\Http\Controllers;

use App\Models\Pengalaman;
use Illuminate\Http\Request;

class PengalamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengalaman = Pengalaman::all();
        return $pengalaman;
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
            'id_pengalaman' => 'required|integer',
            'id_cake' => 'required|integer',
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'jenis' => 'required|string',
        ]);

        Pengalaman::create([
            'id_pengalaman' => $request->id_pengalaman,
            'id_cake' => $request->id_cake,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'jenis' => $request->jenis,
        ]);

        return Pengalaman::findOrFail($request->id_pengalaman);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Pengalaman::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Pengalaman::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_cake' => 'required|integer',
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'jenis' => 'required|string',
        ]);

        $pengalaman = Pengalaman::findOrFail($id);

        $pengalaman->update([
            'id_cake' => $request->id_cake,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'jenis' => $request->jenis,
        ]);

        return $pengalaman;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengalaman = Pengalaman::findOrFail($id);

        $pengalaman->delete();

        return "Berhasil menghapus pengalaman";
    }
}
