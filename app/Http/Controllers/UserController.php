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
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ],   [
        'nama.required' => 'Nama tidak boleh kosong.',
        'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
        'npm.required' => 'NPM tidak boleh kosong.',
        'npm.size' => 'NPM tidak boleh lebih dari 10 digit.',
        'foto.image' => 'File harus berupa gambar.',
        'foto.max' => 'ukuran gambar tidak boleh lebih dari 2MB.',
    ]);

     // Meng-handle upload foto
    if ($request->hasFile('foto')) {
        $foto = $request->file('foto'); // Menyimpan file foto di folder 'uploads'
        $fotoPath = time() . '_' . $foto->getClientOriginalName();
        $foto->move(public_path('upload/img'), $fotoPath);
    } 
    // Jika tidak ada file yang diupload, set fotoPath menjadi null atau default
    else { 
        $fotoPath = null;
    } 

    // Menyimpan data ke database termasuk path foto
    $this->userModel->create([
        'nama' => $request->input('nama'),
        'npm' => $request->input('npm'),
        'kelas_id' => $request->input('kelas_id'),
        'foto' => $fotoPath, // Menyimpan path foto
    ]);

        return redirect()->to('/user/list')->with('success', 'User berhasil ditambahkan');
    }

    // public function show ($id) {

    //     $user = UserModel::with('kelas')->find($id);
    //     $user = $this->userModel->getUser($id);
    //     $data = [
    //         'title' => 'Profile Mahasisiwa',
    //         'user' => $user,
    //     ];

    //     return view('profile', $data);
    // }

    public function edit($id)
    {
        $user = UserModel::findOrFail($id);
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $title = 'Edit User';
        return view('edit_user', compact('user', 'kelas', 'title'));
    }
    
    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);

        $user->nama = $request->nama;
        $user->npm = $request->npm;
        $user->kelas_id = $request->kelas_id;

        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads'), $fileName);
            $user->foto = 'uploads/' . $fileName;
        }

        $user->save();

        return redirect()->route('user.list')->with('success', 'User Berhasil di Update');
    }

    public function destroy($id) 
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->to('/user/list')->with('success', 'userhas been deleted successfully');
    }

    public function show($id)
    {
        $user = UserModel::findOrFail($id);
        $user = Kelas::find($user->kelas_id);

        $title = 'Detail' .$user->nama;

        return view('show.user', compact('useer', 'kelas', 'title'));
    } 
}