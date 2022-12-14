<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'kelas_mahasiswas');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
