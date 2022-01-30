<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TransactionDetail;
use App\Repositories\CartService;
use App\Repositories\CategoryService;
use App\Repositories\ProductService;
use App\Repositories\ProvinceService;
use App\Repositories\RegencyService;
use App\Repositories\SubCategoryService;
use App\Repositories\TransactionDetailService;
use App\Repositories\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    private $categoryService;
    private $subCategoryService;
    private $regencyService;
    private $productService;
    private $cartService;
    private $transactionDetailService;
    private $transactionService;

    public function __construct(CategoryService $categoryService, RegencyService $regencyService, ProductService $productService, CartService $cartService, TransactionDetailService $transactionDetailService, SubCategoryService $subCategoryService, TransactionService $transactionService)
    {
        $this->categoryService = $categoryService;
        $this->subCategoryService = $subCategoryService;
        $this->regencyService = $regencyService;
        $this->productService = $productService;
        $this->cartService = $cartService;
        $this->transactionDetailService = $transactionDetailService;
        $this->transactionService = $transactionService;
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
        $category =  $this->subCategoryService->all();
        $regency = $this->regencyService->wilayah();
        $product = $this->productService->all()->where('regency_id',$id);
        return view('user.product', compact('product','category','regency'));
    }

    public function product_category($id)
    {
        $category = $this->subCategoryService->all()->where('category_id',$id);
        $regency = $this->regencyService->wilayah();
        $product = $this->productService->all()->where('category_id',$id);
        return view('user.product', compact('product','category','regency'));
    }

    public function detail_product(Product $product)
    {
        return view('user.detail_product', compact('product'));
    }

    public function detail_transaction(TransactionDetail $detailTransaction)
    {
        $transaction = $this->transactionService->all()->where('transaction_detail_id',$detailTransaction->id);
        return view('user.invoice', compact('detailTransaction','transaction'));
    }

    public function registerMitra()
    {
        $category = $this->categoryService->all();
        return view('user.mitra', compact('category'));
    }

    public function transaksi()
    {
        $data = $this->transactionDetailService->all()->where('user_id',Auth::id());
        return view('user.transaksi', compact('data'));
    }

    public function invoice()
    {
        return view('user.invoice');
    }
}
