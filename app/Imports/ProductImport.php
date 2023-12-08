<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $idx => $item) {
            $data = [];
            $user = User::whereHas('mitra')->inRandomOrder()->first();
            $judul = $item[1];
            $konten = $item[2];
            $harga = $item[3];
            $luas = $item[4];
            $ruang = $item[5];
            $kategori = $item[6];
            $foto = $item[8];
            $idx = strpos($foto,'?');
            $foto = substr($foto,0,$idx);
            $category = SubCategory::where('name','LIKE',$kategori)->first();
            if(!$category){
                $category = SubCategory::create([
                    'category_id' => 13,
                    'name' => $kategori
                ]);
            }
            $data['user_id'] = $user->id;
            $data['category_id'] = $category->id;
            $data['province_id'] = $user->mitra->provinsi;
            $data['regency_id'] = $user->mitra->kabupaten;
            $data['district_id'] = $user->mitra->kecamatan;
            $data['title'] = $judul;
            $data['price'] = $harga;
            $data['stock'] = rand(1,1000);
            $data['rating'] = 0;
            $data['description'] = $konten;
            $data['image'] = $foto;
            $data['is_grouping'] = rand(0,1);
            Product::create($data);
        }
    }
}
