<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa'; // target nama tabel
    protected $primaryKey = 'id_mahasiswa';
    protected $fillable = [
        'nim',
        'status'
    ]; // target nama kolom
}
