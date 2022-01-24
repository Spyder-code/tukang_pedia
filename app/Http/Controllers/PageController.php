<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\CategoryService;
use App\Repositories\ProductService;
use App\Repositories\ProvinceService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private $categoryService;
    private $provinceService;
    private $productService;

    public function __construct(CategoryService $categoryService, ProvinceService $provinceService, ProductService $productService)
    {
        $this->categoryService = $categoryService;
        $this->provinceService = $provinceService;
        $this->productService = $productService;
    }

    public function home()
    {
        $category = $this->categoryService->all();
        $province = $this->provinceService->all()->sortBy(function($string) {
            return strlen($string->name);
        });
        $product = $this->productService->all();
        return view('user.home', compact('category','province','product'));
    }

    public function account()
    {
        return view('user.account');
    }

    public function cart()
    {
        return view('user.cart');
    }

    public function product_wilayah($id)
    {
        $category = $this->categoryService->all();
        $province = $this->provinceService->all()->sortBy(function($string) {
            return strlen($string->name);
        });
        $product = $this->productService->all()->where('province_id',$id);
        return view('user.product', compact('product','category','province'));
    }

    public function product_category($id)
    {
        $category = $this->categoryService->all();
        $province = $this->provinceService->all()->sortBy(function($string) {
            return strlen($string->name);
        });
        $product = $this->productService->all()->where('category_id',$id);
        return view('user.product', compact('product','category','province'));
    }

    public function detail_product(Product $product)
    {
        return view('user.detail_product', compact('product'));
    }
}
