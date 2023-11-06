<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $latest = Product::with(['category', 'subcategory'])->latest()->take(4)->get();
        $product = Product::with(['category', 'subcategory'])->get();
        return view('website.content', ['p' => $latest, 'product'=> $product]);
        
    }

    public function cart($id){
        $cartId = Product::with(['category', 'subcategory','images'])->findOrFail($id);
        return response()->json($cartId);
    }

    public function cartitem(){
        return view('website.cart');
    }
}
