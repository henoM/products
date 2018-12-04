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

       $categories = Category::with('')->get();
//       dd($categories);

       return view('welcome',compact('products','categories'));
   }
   public function view($id)
   {
       $product = Product::with('files')->where('id',$id)->first();

       return view('main.view',compact('product'));
   }
}
