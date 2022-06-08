<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'name',
        'nik',
        'npwp',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'address',
        'cv',
        'avatar',
        'file',
        'skill',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
