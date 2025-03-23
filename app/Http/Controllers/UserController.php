<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    // public function profile($nama = '', $kelas = '', $npm = '')
    // {
    //     $data = [
    //         'nama' => $nama,
    //         'kelas' => $kelas,
    //         'npm' => $npm,
    //     ];
    //     return view('profile', $data);
    // }

    // public function create() {
    //     return view('create_user');
    // }

    // public function store(Request $request)
    // {
    //     $data = [
    //         'nama' => $request->input('nama'),
    //         'kelas' => $request->input('kelas'),
    //         'npm' => $request->input('npm'),
    //     ];
    //     return view('profile', $data);
    // }

    public function create()
    {
        $kelasModel = new Kelas();

        $kelas = $kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }
    
    public $userModel;
    public $kelasModel;
    
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();

        $kelas = $this->kelasModel->getKelas();
    }
    
    public function index()
    {
        $user = UserModel::all(); 

        return view('list_user', ['user' => $user]); 
    }

    // public function store(Request $request) 
    // { 
    //     $this->userModel->create([ 
    //     'nama' => $request->input('nama'), 
    //     'npm' => $request->input('npm'), 
    //     'kelas_id' => $request->input('kelas_id'), 
    // ]); 
    
    // return redirect()->to('/user'); 
    // }
    

    public function store(Request $request)
    {
    $request->validate([
        'nama' => 'required|string|max:255',
        'npm' => 'required|string|max:20|unique:user,npm',
        'kelas_id' => 'required|exists:kelas,id',
    ]);

    UserModel::create([
        'nama' => $request->input('nama'),
        'npm' => $request->input('npm'),
        'kelas_id' => $request->input('kelas_id'),
    ]);

    // Redirect ke halaman list user setelah penyimpanan sukses
    return redirect()->route('user')->with('success', 'User berhasil ditambahkan!');
    }
}