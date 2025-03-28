<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'kelas';

    public function getKelas() {
        return $this->all();
    } 

    public function user() {
        return $this->hasMany(User_Model::class, 'kelas_id');
    }
}