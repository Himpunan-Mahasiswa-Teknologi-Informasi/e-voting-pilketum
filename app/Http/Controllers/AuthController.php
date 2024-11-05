<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'nim' => 'required|string',
            'password' => 'required|string',
        ]);

        $nim = $request->input('nim');
        $password = $request->input('password');

        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        if (!$mahasiswa) {
            return response()->json(['message' => 'NIM tidak terdaftar'], 401);
        }

        if ($mahasiswa->status == 1) {
            return response()->json(['message' => 'Anda sudah melakukan vote, tidak dapat login kembali'], 403);
        }

        if ($password == $nim) {
            session(['id_mahasiswa' => $mahasiswa->id_mahasiswa, 'nim' => $mahasiswa->nim]);
            return response()->json([
                'message' => 'Login berhasil',
                'mahasiswa' => $mahasiswa,
            ], 200);
        }

        return response()->json(['message' => 'Password salah'], 401);
    }

    public function getSession()
    {
        return response()->json(session()->all(), 200);
    }
}
