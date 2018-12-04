<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\SubCategoryCreateRequest;
use App\Models\Category;
use App\Models\Subcategory;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createCategory()
    {
        return view('home.category.create');
    }

    /**
     * @param CategoryCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeCategory(CategoryCreateRequest $request)
    {
        $category = new Category;
        $category->category = $request->category;
        $category->save();
        return redirect()->to('categories')->with('create', 'New category created');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addSubcategory($id)
    {
        return view('home.category.addSubcategory', compact('id'));
    }

    /**
     * @param $id
     * @param SubCategoryCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeSubcategory($id, SubCategoryCreateRequest $request)
    {
        $subCategory = new Subcategory;
        $subCategory->subCategory = $request->subcategory;
        $subCategory->category_id = $id;
        $subCategory->save();
        
        return redirect()->to('categories')->with('create', 'New subcategory added');
    }
}
