<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getCategory($category_id)
    {
        $data = SubCategory::where('category_id', $category_id)->get();
        return response()->json($data);
    }
}
