<?php

namespace App\Http\Controllers;

use App\Models\Paslon;
use Illuminate\Http\Request;

class PaslonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paslons = Paslon::all();
        return $paslons;
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
            'id_paslon' => 'required|integer',
            'no_urut' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $foto = $request->file('foto')->store('foto_paslon', 'public');

        Paslon::create([
            'id_paslon' => $request->id_paslon,
            'no_urut' => $request->no_urut,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'foto' => $foto,
        ]);

        return Paslon::findOrFail($request->id_paslon);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Paslon::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Paslon::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'no_urut' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $paslon = Paslon::findOrFail($id);

        $foto = $request->hasFile('foto') ? $request->file('foto')->store('foto_paslon', 'public') : $paslon->foto;

        $paslon->update([
            'no_urut' => $request->no_urut,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'foto' => $foto,
        ]);

        return $paslon;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paslon = Paslon::findOrFail($id);

        $paslon->delete();

        return "Berhasil menghapus paslon";
    }
}
