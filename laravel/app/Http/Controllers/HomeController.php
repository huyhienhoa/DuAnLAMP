<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function product(){
        $product1 = new Product();
        $product1->id = 1;
        $product1->name = "name 1";

        $product2 = new Product();
        $product2->id = 10;
        $product2->name = "name 2";

        $products = [$product1, $product2];
        return view('product', compact('products'));
    }
}
