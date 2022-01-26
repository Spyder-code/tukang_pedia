<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\CartService;
use App\Repositories\CategoryService;
use App\Repositories\ProductService;
use App\Repositories\ProvinceService;
use App\Repositories\RegencyService;
use App\Repositories\TransactionDetailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    private $categoryService;
    private $regencyService;
    private $productService;
    private $cartService;
    private $transactionDetailService;

    public function __construct(CategoryService $categoryService, RegencyService $regencyService, ProductService $productService, CartService $cartService, TransactionDetailService $transactionDetailService)
    {
        $this->categoryService = $categoryService;
        $this->regencyService = $regencyService;
        $this->productService = $productService;
        $this->cartService = $cartService;
        $this->transactionDetailService = $transactionDetailService;
    }

    public function home()
    {
        $category = $this->categoryService->all();
        $regency = $this->regencyService->all()->where('province_id',15)->sortBy(function($string) {
            return strlen($string->name);
        });
        $product = $this->productService->all();
        return view('user.home', compact('category','regency','product'));
    }

    public function account()
    {
        return view('user.account');
    }

    public function cart()
    {
        $cart = $this->cartService->all()->where('user_id',Auth::id());
        return view('user.cart', compact('cart'));
    }

    public function product_wilayah($id)
    {
        $category = $this->categoryService->all();
        $regency = $this->regencyService->all()->sortBy(function($string) {
            return strlen($string->name);
        });
        $product = $this->productService->all()->where('regency_id',$id);
        return view('user.product', compact('product','category','regency'));
    }

    public function product_category($id)
    {
        $category = $this->categoryService->all();
        $regency = $this->regencyService->all()->sortBy(function($string) {
            return strlen($string->name);
        });
        $product = $this->productService->all()->where('category_id',$id);
        return view('user.product', compact('product','category','regency'));
    }

    public function detail_product(Product $product)
    {
        return view('user.detail_product', compact('product'));
    }

    public function registerMitra()
    {
        return view('user.mitra');
    }

    public function transaksi()
    {
        $data = $this->transactionDetailService->all()->where('user_id',Auth::id());
        return view('user.transaksi', compact('data'));
    }
}
