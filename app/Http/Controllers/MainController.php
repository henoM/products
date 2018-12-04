<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class MainController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::with('files')->orderBy('created_at', 'desc')->get();
        $categories = Category::with('subcategories')->get();

        return view('welcome', compact('products', 'categories'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        $product = Product::with('files')->where('id', $id)->first();

        return view('main.view', compact('product'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categoryGet($id)
    {
        $products = Product::with('files')->where('category_id', $id)->orderBy('created_at', 'desc')->get();
        $categories = Category::with('subcategories')->get();

        return view('welcome', compact('products', 'categories'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function subcategoryGet($id)
    {
        $products = Product::with('files')->where('subcategory_id', $id)->orderBy('created_at', 'desc')->get();
        $categories = Category::with('subcategories')->get();

        return view('welcome', compact('products', 'categories'));
    }


}
