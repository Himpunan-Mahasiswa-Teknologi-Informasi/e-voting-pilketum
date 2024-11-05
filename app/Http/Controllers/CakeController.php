<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use Illuminate\Http\Request;

class CakeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cakes = Cake::all();
        return $cakes;
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
            'id_cake' => 'required|integer',
            'id_paslon' => 'required|integer',
            'nama' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'deskripsi' => 'required|string',
            'prodi' => 'required|string',
            'kelas' => 'required|string',
        ]);

        $foto = $request->file('foto')->store('foto_cake', 'public');

        Cake::create([
            'id_cake' => $request->id_cake,
            'id_paslon' => $request->id_paslon,
            'nama' => $request->nama,
            'foto' => $foto,
            'deskripsi' => $request->deskripsi,
            'prodi' => $request->prodi,
            'kelas' => $request->kelas,
        ]);

        return Cake::findOrFail($request->id_cake);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Cake::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Cake::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_paslon' => 'required|integer',
            'nama' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'deskripsi' => 'required|string',
            'prodi' => 'required|string',
            'kelas' => 'required|string',
        ]);

        $cake = Cake::findOrFail($id);

        $foto = $request->hasFile('foto') ? $request->file('foto')->store('foto_cake', 'public') : $cake->foto;

        $cake->update([
            'id_paslon' => $request->id_paslon,
            'nama' => $request->nama,
            'foto' => $foto,
            'deskripsi' => $request->deskripsi,
            'prodi' => $request->prodi,
            'kelas' => $request->kelas,
        ]);

        return $cake;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cake = Cake::findOrFail($id);

        $cake->delete();

        return "Berhasil menghapus cake";
    }
}
