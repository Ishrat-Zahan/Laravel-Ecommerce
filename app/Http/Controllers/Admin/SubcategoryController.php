<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategory = Subcategory::paginate(10);
        return view('admin.subcategory.index', ['subcategory' => $subcategory]);
    }


    public function create()
    {

        $category = Category::all();
        return view('admin.subcategory.create', ['category' => $category]);
    }


    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'priority' => $request->priority,
            'category_id' => $request->category_id,
        ];

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $path = $file->store('uploads');
            $data['icon'] = $path;
        }

        $category = Subcategory::create($data);

        return redirect()->route("subcategory.index")->with("success", "subcategory saved successfully.");
    }



    public function show(Subcategory $subcategory)
    {
        return view('admin.subcategory.show', compact('subcategory'));
    }


    public function edit(Subcategory $subcategory)
    {
        $category = Category::all();
        return view('admin.subcategory.edit', ['subcategory' => $subcategory, 'category' => $category]);
    }



    public function update(Request $request, Subcategory $subcategory)
    {
        $subcategory->fill($request->all());

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $path = $file->store('uploads');


            if ($subcategory->icon && Storage::exists($subcategory->icon)) {
                Storage::delete($subcategory->icon);
            }

            $subcategory->icon = $path;
        }

        $subcategory->save();

        return redirect()->route("subcategory.index")->with("success", "Subategory updated successfully.");
    }




    public function destroy(Subcategory $subcategory)
    {
        if (Subcategory::destroy($subcategory->id)) {
            return redirect("subcategory")->with("success", "Successfully Deleted");
        }
    }


    public function getSubcat($catid)
    {
        $sc = Subcategory::where("category_id", $catid)->pluck("name", "id");
        return response()->json($sc);
    }
}
