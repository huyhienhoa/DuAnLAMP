<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listProduct(){
        $products = Product::with('category','branch')->get();
        return view('product.products',compact('products'));
    }

    public function showAddForm(){
        $categories = Category::all();
        $branches = Branch::all();
        return view('product.addproduct',compact('categories','branches'));
    }
    
    
    public function createProduct(Request $request){
        $product = new Product();
        $product->name = $request->input('name');
        $product->cost = $request->input('cost');
        $product->quantity = $request->input('quantity');
        $product->status = $request->input('status');
        $product->category_id = $request->input('category');
        $product->branch_id = $request->input('branch');
        $product->hot = $request->input('hot');
        $product->betterSale = $request->input('betterSale');
        $product->descriptionSummary = $request->input('descriptionSummary');
        $product->description = $request->input('description');
        $product->save();
        return redirect()->action('ProductController@listProduct');
    }

}
