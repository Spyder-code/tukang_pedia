<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }


    public function index()
    {
        $data = $this->categoryService->all();
        return view('admin.category.index', compact('data'));
    }


    public function create()
    {
        return view('admin.category.create');
    }


    public function store(Request $request)
    {
        $this->categoryService->store($request->all());
        return redirect()->route('category.index')->with('success','Category has success created');
    }


    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }


    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $this->categoryService->update($request->all(),$category->id);
        return redirect()->route('category.index')->with('success','Category has success updated');
    }


    public function destroy(Category $category)
    {
        $this->categoryService->destroy($category->id);
        return redirect()->route('category.index')->with('success','Category has success deleted');
    }
}