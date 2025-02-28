<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($nama = '', $kelas = '', $npm = '')
    {
        $data = [
            'nama' => 'FERDIAN',
            'kelas' => 'D3 MI',
            'npm' => '2307051020'
        ];
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ];
        return view('profile', $data);
    }
}
