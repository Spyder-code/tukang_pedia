<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'star',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo(Transaction::class);
    }
}
