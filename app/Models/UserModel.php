<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    // protected $table = 'user'; // Sesuaikan dengan nama tabel di database

    // protected $fillable = ['nama', 'npm', 'kelas_id'];

    // public $timestamps = true; // Jika ada kolom created_at & updated_at
    

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    
    // public function getUser() 
    // {
    //     return $this->join('kelas', 'kelas_id', '=', 'kelas_id')
    //     ->select('user.*', 'kelas.nama_kelas as nama_kelas')->get();
    // }

    protected $table = 'user';
    protected $guarded = ['id'];
    
    public function getUser($id = null){
        if ($id!= null){
            return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')
            ->select('user.*', 'kelas.nama_kelas')
            ->where('user.id', $id) // Menambahkan kondisi untuk menambahkan data berdasarkan id
            ->first(); 
        }

        return $this->join('kelas', 'kelas.nama_kelas', '=', 'user.nama_kelas',)
        ->select('user.*', 'kelas.nama_kelas')
        ->get();
    }
}