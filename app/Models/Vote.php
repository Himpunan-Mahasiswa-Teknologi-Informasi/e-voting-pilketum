<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $table = 'vote';
    protected $primaryKey = 'id_vote';
    protected $fillable = [
        'id_paslon',
        'id_user'
    ];

    public function paslon() {
        return $this->belongsTo();
    }

    public function user() {
        return $this->belongsTo();
    }
}
