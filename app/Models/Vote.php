<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paslon;

class Vote extends Model
{
    use HasFactory;

    protected $table = 'vote';
    protected $primaryKey = 'id_vote';
    protected $fillable = [
        'id_paslon',
        'id_user'
    ];

    public function paslon()
    {
        return $this->belongsTo(Paslon::class, 'id_paslon', 'id_paslon');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id_mahasiswa');
    }
}
