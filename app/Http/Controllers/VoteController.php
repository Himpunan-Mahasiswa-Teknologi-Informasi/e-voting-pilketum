<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\Vote;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    // vote dari mahasiswa
    public function store_mahasiswa(Request $request)
    {
        $request->validate([
            'id_paslon' => 'required|exists:paslon,id_paslon',
            'id_mahasiswa' => 'required|exists:mahasiswa,id_mahasiswa',
        ]);

        // Check if the student has already voted
        $existingVote = Vote::where('id_mahasiswa', $request->id_mahasiswa)->first();
        if ($existingVote) {
            return response()->json(['error' => 'You have already voted'], 403);
        }

        // Store the vote
        $vote = new Vote();
        $vote->id_paslon = $request->id_paslon;
        $vote->id_mahasiswa = $request->id_mahasiswa;
        $vote->save();

        // Update the status of the mahasiswa to 1 after voting
        $mahasiswa = Mahasiswa::find($request->id_mahasiswa);
        $mahasiswa->status = 1;
        $mahasiswa->save();

        return response()->json(['message' => 'Vote submitted successfully'], 200);
    }
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
            'id_paslon' => 'required|exists:paslon,id_paslon',
            'id_mahasiswa' => 'required|exists:mahasiswa,id_mahasiswa',
        ]);

        // Store the vote
        $vote = new Vote();
        $vote->id_paslon = $request->id_paslon;
        $vote->id_mahasiswa = $request->id_mahasiswa;
        $vote->save();

        return response()->json(['message' => 'Vote submitted successfully'], 200);
    }

    /**
     * Display vote all.
     */
    public function show_all()
    {
        $votes = Vote::with('mahasiswa:id_mahasiswa,nim') // Load nim field from mahasiswa
            ->select('id_paslon', 'id_mahasiswa', 'created_at', 'updated_at') // Select relevant fields
            ->get();

        // Return result in JSON format
        return response()->json([
            'data' => $votes
        ], 200);
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
    public function edit(string $id, Request $request)
    {
        $request->validate([
            'id_paslon' => 'required|exists:paslon,id_paslon',
            'id_mahasiswa' => 'required|exists:mahasiswa,id_mahasiswa',
        ]);

        // find vote id
        $vote = Vote::find($id);

        // check vote id
        if (!$vote) {
            return response()->json(['message' => 'Vote not found'], 404);
        }

        // Update data vote
        $vote->id_paslon = $request->id_paslon;
        $vote->id_mahasiswa = $request->id_mahasiswa;
        $vote->save();

        return response()->json(['message' => 'Vote updated successfully'], 200);
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
        // find vote id
        $vote = Vote::find($id);

        // check vote id
        if (!$vote) {
            return response()->json(['message' => 'Vote not found'], 404);
        }

        // delete vote
        $vote->delete();

        return response()->json(['message' => 'Vote deleted successfully'], 200);
    }

    /**
     * Show calculate vote paslon.
     */
    public function hasil_paslon()
    {
        // Hitung jumlah vote untuk setiap paslon
        $votes = DB::table('vote')
            ->select('id_paslon', DB::raw('count(*) as total_votes'))
            ->groupBy('id_paslon')
            ->get();

        // Mengembalikan hasil dalam format JSON
        return response()->json([
            'data' => $votes
        ], 200);
    }
}
