<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    use HasFactory;

    protected $table = 'cake';
    protected $primaryKey = 'id_cake';

    protected $fillable = ['id_paslon', 'nama', 'foto', 'deskripsi', 'prodi', 'kelas'];

    public function paslon()
    {
        return $this->belongsTo(Paslon::class, 'id_paslon', 'id_paslon');
    }

    public function pengalaman() {
        return $this->hasMany(Pengalaman::class);
    }
}
