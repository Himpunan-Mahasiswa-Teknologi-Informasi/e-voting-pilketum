<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    use HasFactory;

    protected $table = 'cake';
    protected $primary_key = 'id_cake';

    protected $fillable = ['id_paslon', 'nama', 'foto', 'deskripsi', 'prodi', 'kelas'];

    public function paslon()
    {
        return $this->belongsTo('');
    }
}
