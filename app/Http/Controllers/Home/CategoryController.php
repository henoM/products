<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\SubCategoryCreateRequest;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function createCategory()
    {
        return view('home.category.create');
    }
    public function storeCategory(CategoryCreateRequest $request)
    {
        $category = new Category;
        $category->category = $request->category;
        $category->save();
        return redirect()->to('categories')->with('create', 'New category created');
    }
    public function addSubcategory($id)
    {
        return view('home.category.addSubcategory',compact('id'));
    }
    public function storeSubcategory($id,SubCategoryCreateRequest $request)
    {
        $subCategory = new Subcategory;
        $subCategory->subCategory = $request->subcategory;
        $subCategory->category_id = $id;
        $subCategory->save();
        return redirect()->to('categories')->with('create', 'New subcategory added');
    }
}
