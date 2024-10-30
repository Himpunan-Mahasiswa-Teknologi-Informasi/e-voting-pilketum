<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    use HasFactory;
    protected $table = 'user'; // target nama tabel
    protected $primaryKey = 'id';
    protected $fillable = [
        'nim',
        'status'
    ]; // target nama kolom
}
