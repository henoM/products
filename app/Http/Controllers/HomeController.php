<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\SubCategoryCreateRequest;
use App\Models\Category;
use App\Models\File;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::User()->id;
        $products = Product::with('files')->where('user_id',$id)->orderBy('created_at','desc')->get();

        return view('home.products',compact('products'));
    }
    public function products()
    {
        $id = Auth::User()->id;
        $products = Product::with('files')->where('user_id',$id)->orderBy('created_at','desc')->get();

        return view('home.products',compact('products'));
    }
    public function categories()
    {
        $categories = Category::paginate(10);
        return view('home.categories',compact('categories'));
    }
}
