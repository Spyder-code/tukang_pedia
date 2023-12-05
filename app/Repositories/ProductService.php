<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductService extends Repository
{

    public function __construct()
    {
        $this->model = new Product;
    }

    public function insertImage($data, $product_id)
    {
        $file_name = time().rand(1,99999999).'.'.$data->getClientOriginalExtension();
        $path = $data->storeAs('public/'.$product_id,$file_name);
        $url = Storage::url($path);
        $file_url = url($url);
        $image = ProductImage::create([
            'product_id' => $product_id,
            'path' => $file_url
        ]);
        return $image;
    }

}
