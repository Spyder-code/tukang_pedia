<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductFileImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $idx => $item) {
            $data = [];
            $judul = $item[1];
            $foto = $item[2];
            $product = Product::where('title',$judul)->first();
            $idx = strpos($foto,'?');
            $foto = substr($foto,0,$idx);
            $data['product_id'] = $product->id;
            $data['path'] = $foto;
            ProductImage::create($data);
        }
    }
}
