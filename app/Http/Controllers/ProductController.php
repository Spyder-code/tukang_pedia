<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\CategoryService;
use App\Repositories\ProductService;
use App\Repositories\ProvinceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    private $productService;
    private $categoryService;
    private $provinceService;

    public function __construct(ProductService $productService, CategoryService $categoryService, ProvinceService $provinceService)
    {
        $this->provinceService = $provinceService;
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }


    public function index()
    {
        $data = $this->productService->all();
        return view('admin.product.index', compact('data'));
    }


    public function create()
    {
        $category = $this->categoryService->select();
        $province = $this->provinceService->select();
        return view('admin.product.create', compact('category','province'));
    }


    public function store(Request $request)
    {
        $image = $this->provinceService->insertFile($request->image,'product');
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['image'] = $image;
        $data['rating'] = 0;
        $this->productService->store($data);
        return redirect()->route('product.index')->with('success','Product has success created');
    }


    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }


    public function edit(Product $product)
    {
        $category = $this->categoryService->select();
        $province = $this->provinceService->select();
        return view('admin.product.edit', compact('product','category','province'));
    }


    public function update(Request $request, Product $product)
    {
        $this->productService->update($request->all(),$product->id);
        return redirect()->route('product.index')->with('success','Product has success updated');
    }


    public function destroy(Product $product)
    {
        $this->productService->destroy($product->id);
        return redirect()->route('product.index')->with('success','Product has success deleted');
    }
}
