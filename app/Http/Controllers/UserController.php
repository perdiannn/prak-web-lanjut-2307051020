<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User_Model;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile($nama = '', $kelas = '', $npm = '')
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ];
        return view('profile', $data);
    }
    public function create() {
        return view('create_user', [
            'kelas' => Kelas::all(),
        ]);
    }

    // public function store(Request $request)
    // {
    //     $data = [
    //         'nama' => $request->input('nama'),
    //         'kelas' => $request->input('kelas'),
    //         'npm' => $request->input('npm'),
    //     ];
    //     return view('profile', $data);
    // }

    public function store()
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $user = User_Model::create($validatedData);

        $user->load('kelas');

        return view('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->nama_kelas->nama_kelas ?? 'Kelas tidak ditemukan',
        ]);
    }
}