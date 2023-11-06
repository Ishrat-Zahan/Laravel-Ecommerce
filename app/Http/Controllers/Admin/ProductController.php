<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with(['category', 'subcategory', 'subsubcategory', 'images'])->paginate(10);
        // dd($product);
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $colors = [

            "#000000" => "Black",
            "#FF0000" => "Red",
            "#0000FF" => "Blue",
            "#FFFF00" => "Yellow",
            "#FFC0CB" => "Pink",
            "#008000" => "Green",
            "#008080" => "Teal",
            "#240A40" => "Violet",
            "#800000" => "Maroon",
            "#800080" => "Purple",
            "#808000" => "Olive",
            "#808080" => "Gray",
            "#FFFFFF" => "White",
            "#4F69C6" => "Indigo",
            "#76D7EA" => "Sky Blue",
            "#FFF1D8" => "Pink Lady",
            "#FF9900" => "Orange",
            "#00FFFF" => "Cyan",
            "#FFF0DB" => "Peach Cream",
            "#FFF0F5" => "Lavender blush",
            "#FFF14F" => "Gorse",
            "#FFF1B5" => "Buttermilk",


        ];


        $cats = Category::pluck('name', 'id');
        $brand = Brand::pluck('name', 'id');

        return view("admin.product.create")
            ->with("product", null)
            ->with("categories", $cats)
            ->with("colors", $colors)
            ->with("brands", $brand)
            ->with("subcategories", [])
            ->with("subsubcategories", []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();

        $product->name = $request->input('name');
        $product->description = $request->input('description');

        $product->product_type = $request->input('product_type');
        $product->category_id = $request->input('category_id');
        $product->subcategory_id = $request->input('subcategory_id');
        $product->subsubcategory_id = $request->input('subsubcategory_id');
        $product->brand_id = $request->input('brand_id');

        $product->sku = $request->input('sku');
        $product->unit = $request->input('unit');
        $product->color = json_encode($request->input('colors'), JSON_UNESCAPED_SLASHES);

        $product->attributes = $request->input('attributes');

        $product->unit_price = $request->input('unit_price');
        $product->purchase_price = $request->input('purchase_price');
        $product->selling_price = $request->input('selling_price');
        $product->tax = $request->input('tax');
        $product->tax_model = $request->input('tax_model');
        $product->discount = $request->input('discount');
        $product->discount_type = $request->input('discount_type');
        $product->total_quantity = $request->input('total_quantity');
        $product->minimum_quantity = $request->input('minimum_quantity');
        $product->shipping_cost = $request->input('shipping_cost');

        $product->featured = $request->input('featured');
        $product->search_tags = $request->input('search_tags');
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');

        $product->save();

        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create product.',
            ]);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $loc = $file->store('uploads');
                $i = new Image();
                $i->name = $loc;
                $product->images()->save($i);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Image not available.',
            ]);
        }

        return redirect()->route("product.index")->with("success", "Product saved successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)

    {
        $colors = [
            "#000000" => "Black",
            "#000080" => "Navy Blue",
            "#0000C8" => "Dark Blue",
            "#0000FF" => "Blue",
            "#FFFF00" => "Yellow",
            "#008000" => "Green",
            "#008080" => "Teal",
            "#240A40" => "Violet",
            "#800000" => "Maroon",
            "#800080" => "Purple",
            "#808000" => "Olive",
            "#808080" => "Gray",
            "#FFFFFF" => "White",
            "#4F69C6" => "Indigo",
            "#76D7EA" => "Sky Blue",
            "#FF0000" => "Red",
            "#FF9900" => "Orange",
            "#00FFFF" => "Cyan",
            "#FFC0CB" => "Pink",
            "#FFF0DB" => "Peach Cream",
            "#FFF0F5" => "Lavender blush",
            "#FFF14F" => "Gorse",
            "#FFF1B5" => "Buttermilk",
            "#FFF1D8" => "Pink Lady",

        ];

        $cats = Category::pluck('name', 'id');
        $brand = Brand::pluck('name', 'id');
        $subsubcategories = Subsubcategory::all();
        $subcategories = Subcategory::all();

        return view("admin.product.edit")
            ->with("menu", null)
            ->with("categories", $cats)
            ->with("product", $product)
            ->with("colors", $colors)
            ->with("brands", $brand)
            ->with("subcategories", $subcategories)
            ->with("subsubcategories", $subsubcategories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->input('name');
        $product->description = $request->input('description');

        $product->product_type = $request->input('product_type');
        $product->category_id = $request->input('category_id');
        $product->subcategory_id = $request->input('subcategory_id');
        $product->subsubcategory_id = $request->input('subsubcategory_id');
        $product->brand_id = $request->input('brand_id');

        $product->sku = $request->input('sku');
        $product->unit = $request->input('unit');
       $product->color = json_encode($request->input('colors'), JSON_UNESCAPED_SLASHES);

        $product->attributes = $request->input('attributes');

        $product->unit_price = $request->input('unit_price');
        $product->purchase_price = $request->input('purchase_price');
        $product->selling_price = $request->input('selling_price');
        $product->tax = $request->input('tax');
        $product->tax_model = $request->input('tax_model');
        $product->discount = $request->input('discount');
        $product->discount_type = $request->input('discount_type');
        $product->total_quantity = $request->input('total_quantity');
        $product->minimum_quantity = $request->input('minimum_quantity');
        $product->shipping_cost = $request->input('shipping_cost');

        $product->featured = $request->input('featured');
        $product->search_tags = $request->input('search_tags');
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');

        $product->save();

        if ($request->hasFile('images')) {
            $files = $request->file('images');

            foreach ($files as $file) {

                $loc = $file->store('uploads');
                $i = new Image();
                $i->name = $loc;
                $product->images()->save($i);
            }

            return redirect()->route("product.index")->with("success", "Product updated successfully. ID is " . $product->id);
        } else {

            return redirect()->route("product.index");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (Product::destroy($product->id)) {
            return redirect("product")->with("success", "Successfully Deleted");
        }
    }

    public function delete_img(Request $request)
    {

        $img = Image::find($request->id);

        if ($img) {

            Storage::delete($img->name);
            $img->delete();

            return response()->json(['type' => "info", "message" => "Successfully deleted"]);
        } else {

            return response()->json(['type' => "warning", "message" => "Error Deleting Images"]);
        }
    }
}
