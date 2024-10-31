<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cake;

class Pengalaman extends Model
{
    use HasFactory;

    protected $table = 'pengalaman';
    protected $primaryKey = 'id_pengalaman';
    protected $fillable = [
        'id_cake',
        'judul',
        'deskripsi',
        'jenis'
    ];

    public function cake()
    {
        return $this->belongsTo(Cake::class, 'id_cake', 'id_cake');
    }
}
