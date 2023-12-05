<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'province_id',
        'regency_id',
        'district_id',
        'title',
        'price',
        'stock',
        'rating',
        'description',
        'image',
        'is_grouping',
    ];

    public function category()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class,'regency_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
