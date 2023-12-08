<?php

namespace App\Http\Controllers;

use App\Imports\ProductFileImport;
use App\Models\Product;
use App\Repositories\CategoryService;
use App\Repositories\ProductService;
use App\Repositories\RegencyService;
use App\Repositories\SubCategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;

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
        $data = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'category_id' => 'required',
            'regency_id' => 'required',
            'district_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required',
            'is_grouping' => 'required',
            'images' => 'nullable',
            'description' => 'required',
        ]);
        $image = $this->regencyService->insertFile($request->image,'product', '.png');
        $data['province_id'] = 15;
        $data['user_id'] = Auth::id();
        $data['image'] = $image;
        $data['rating'] = 0;
        $product = $this->productService->store($data);
        if($product){
            foreach ($data['images'] as $image) {
                $this->productService->insertImage($image,$product->id);
            }
        }
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
        $sub = $product->category->pluck('name','id');
        return view('admin.product.edit', compact('product','category','province','sub'));
    }


    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'category_id' => 'required',
            'regency_id' => 'required',
            'district_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'nullable',
            'images' => 'nullable',
            'is_grouping' => 'required',
            'description' => 'required',
        ]);

        if($request->image){
            $image = $this->regencyService->insertFile($request->image,'product', '.png');
            $data['image'] = $image;
        }
        $this->productService->update($data,$product->id);
        return redirect()->route('product.index')->with('success','Product has success updated');
    }


    public function destroy(Product $product)
    {
        $this->productService->destroy($product->id);
        return redirect()->route('product.index')->with('success','Product has success deleted');
    }

    public function import(Request $request)
    {
        Excel::import(new ProductFileImport, $request->file);
        return back()->with('success', 'All good!');
    }
}
