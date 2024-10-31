<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paslon extends Model
{
    use HasFactory;
    protected $table = 'paslon'; // nama tabel
    protected $primaryKey = 'id_paslon';
    protected $fillable = [
        'no_urut',
        'visi',
        'misi',
        'foto',
    ]; // nama kolom
}
