<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latest = Product::with(['category', 'subcategory'])->latest()->take(4)->get();
        $product = Product::with(['category', 'subcategory'])->get();
        $brands = Brand::all();
        $categories = Category::all();
        return view('website.content', ['p' => $latest, 'product' => $product, 'brands' => $brands, 'categories' => $categories]);
    }

    public function cart($id)
    {
        $cartId = Product::with(['category', 'subcategory', 'images'])->findOrFail($id);
        return response()->json($cartId);
    }

    public function cartitem()
    {
        return view('website.cart');
    }

    public function homesubcat($id)
    {
        $subcat = Subcategory::where('category_id', $id)->get();
        return view('website.subcategory', ['subcat' => $subcat]);
    }
    
}
