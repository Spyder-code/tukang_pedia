<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Regency;

class RegencyService extends Repository
{

    public function __construct()
    {
        $this->model = new Regency();
    }

    public function select()
    {
        return $this->model->all()->where('province_id',15)->pluck('name','id');
    }

    public function wilayah()
    {
        $product = Product::all()->groupBy('regency_id');
        $array = array();
        foreach ($product as $item => $value) {
            array_push($array, $value->first()->regency->id);
        };
        $data = $this->model->all()->whereIn('id',$array)->sortBy(function($string) {
            return strlen($string->name);
        });
        return $data;
    }
}
