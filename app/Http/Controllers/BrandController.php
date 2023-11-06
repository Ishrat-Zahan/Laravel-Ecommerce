<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brand = Brand::paginate(10);
        return view('admin.brand.index', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
        ];

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $path = $file->store('uploads');
            $data['logo'] = $path;
        }

        $brand = Brand::create($data);

        return redirect()->route("brand.index")->with("success", "brand saved successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view('admin.brand.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $brand->fill($request->all());

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $path = $file->store('uploads');


            if ($brand->logo && Storage::exists($brand->logo)) {
                Storage::delete($brand->logo);
            }

            $brand->logo = $path;
        }

        $brand->save();

        return redirect()->route("brand.index")->with("success", "brand updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if (brand::destroy($brand->id)) {
            return redirect("brand")->with("success", "Successfully Deleted");
        }
    }
}
