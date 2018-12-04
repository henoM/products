<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
   public function index()
   {
       $products = Product::with('files')->orderBy('created_at','desc')->get();

       $categories = Category::with('subcategories')->get();
//       dd($categories->subcategories);

       return view('welcome',compact('products','categories'));
   }
   public function view($id)
   {
       $product = Product::with('files')->where('id',$id)->first();

       return view('main.view',compact('product'));
   }

   public function categoryGet($id)
   {
       $products = Product::with('files')->where('category_id',$id)->orderBy('created_at','desc')->get();

       $categories = Category::with('subcategories')->get();

       return view('welcome',compact('products','categories'));
   }
   public function subcategoryGet($id)
   {
       $products = Product::with('files')->where('subcategory_id',$id)->orderBy('created_at','desc')->get();

       $categories = Category::with('subcategories')->get();

       return view('welcome',compact('products','categories'));
   }


}
