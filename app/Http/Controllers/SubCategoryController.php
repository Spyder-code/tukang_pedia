<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Repositories\CategoryService;
use App\Repositories\SubCategoryService;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    private $subcategoryService;
    private $categoryService;

    public function __construct(SubCategoryService $subcategoryService, CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->subcategoryService = $subcategoryService;
    }


    public function index()
    {
        $data = $this->subcategoryService->all();
        return view('admin.subcategory.index', compact('data'));
    }


    public function create()
    {
        $category = $this->categoryService->select();
        return view('admin.subcategory.create', compact('category'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required'
        ]);
        $this->subcategoryService->store($data);
        return redirect()->route('subcategory.index')->with('success','SubCategory has success created');
    }


    public function show(SubCategory $subcategory)
    {
        return view('admin.subcategory.show', compact('subcategory'));
    }


    public function edit(SubCategory $subcategory)
    {
        $category = $this->categoryService->select();
        return view('admin.subcategory.edit', compact('subcategory','category'));
    }


    public function update(Request $request, SubCategory $subcategory)
    {
        $this->subcategoryService->update($request->all(),$subcategory->id);
        return redirect()->route('subcategory.index')->with('success','SubCategory has success updated');
    }


    public function destroy(SubCategory $subcategory)
    {
        $this->subcategoryService->destroy($subcategory->id);
        return redirect()->route('subcategory.index')->with('success','SubCategory has success deleted');
    }
}
