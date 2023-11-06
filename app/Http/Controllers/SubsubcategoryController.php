<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Http\Request;

class SubsubcategoryController extends Controller
{
    public function index()
    {
        $sscats = Subsubcategory::paginate(10);
        return view('admin.subsubcategory.index', ['sscats' => $sscats]);
    }


    public function create()
    {
        $cats = Category::pluck('name', 'id');
        return view("admin.subsubcategory.create")
            ->with("subsubcategory", null)
            ->with("categories", $cats)
            ->with("subcategories", []);
    }


    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'priority' => $request->priority,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
        ];

        $sscats = Subsubcategory::create($data);

        return redirect()->route("subsubcategory.index")->with("success", "sub sub-category saved successfully.");
    }


    public function show(Subsubcategory $subsubcategory)
    {
        return view('admin.subsubcategory.show', compact('subsubcategory'));
    }


    public function edit(Subsubcategory $subsubcategory)
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('admin.subsubcategory.edit', [
            'subsubcategory' => $subsubcategory,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }



    public function update(Request $request, Subsubcategory $subsubcategory)
    {
        $subsubcategory->name = $request->name;
        $subsubcategory->priority = $request->priority;
        $subsubcategory->category_id = $request->category_id;
        $subsubcategory->subcategory_id = $request->subcategory_id;

        $subsubcategory->save();

        return redirect()->route("subsubcategory.index")->with("success", "Sub sub-category updated successfully.");
    }


    public function destroy(Subsubcategory $subsubcategory)
    {

        if (Subsubcategory::destroy($subsubcategory->id)) {
            return redirect("subsubcategory")->with("success", "Sub sub Category deleted successfully.");
        }
    }

    public function getSubsubcat($subcatid)
    {
        $sc = Subsubcategory::where("subcategory_id", $subcatid)->pluck("name", "id");
        return response()->json($sc);
    }
}
