<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\CategoryService;
use App\Repositories\ProductService;
use App\Repositories\RegencyService;
use App\Repositories\SubCategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    private $productService;
    private $categoryService;
    private $subCategoryService;
    private $regencyService;

    public function __construct(ProductService $productService, CategoryService $categoryService, RegencyService $regencyService, SubCategoryService $subCategoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->subCategoryService = $subCategoryService;
        $this->regencyService = $regencyService;
    }


    public function index()
    {
        if (Auth::id()==1) {
            $data = $this->productService->all();
        } else {
            $data = $this->productService->all()->where('user_id',Auth::id());
        }

        return view('admin.product.index', compact('data'));
    }


    public function create()
    {
        $category = $this->categoryService->select();
        $sub_category = $this->subCategoryService->select();
        $regency = $this->regencyService->select();
        return view('admin.product.create', compact('category','regency','sub_category'));
    }


    public function store(Request $request)
    {
        $image = $this->regencyService->insertFile($request->image,'product', '.png');
        $data = $request->all();
        $data['province_id'] = 15;
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
        $province = $this->regencyService->select();
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
