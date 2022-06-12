<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'seller_id',
        'code',
        'total',
        'arrive',
        'address',
        'payment_method',
        'payment_proof',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class,'transaction_detail_id');
    }
}
