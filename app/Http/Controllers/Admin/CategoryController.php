<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::paginate(10);
        return view('admin.category.index', ['category' => $category]);
    }


    public function create()
    {
        return view('admin.category.create');
    }


    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'position' => $request->position,
            'home_status' => $request->home_status,
            'priority' => $request->priority,
        ];

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $path = $file->store('uploads');
            $data['icon'] = $path;
        }

        $category = Category::create($data);

        return redirect()->route("category.index")->with("success", "Category saved successfully.");
    }


    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }



    public function edit(Category $category)
    {
        return view('admin.category.edit', ['category' => $category]);
    }



    public function update(Request $request, Category $category)
    {
        $category->fill($request->all());

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $path = $file->store('uploads');


            if ($category->icon && Storage::exists($category->icon)) {
                Storage::delete($category->icon);
            }

            $category->icon = $path;
        }

        $category->save();

        return redirect()->route("category.index")->with("success", "Category updated successfully.");
    }




    public function destroy(Category $category)
    {
        if (Category::destroy($category->id)) {
            return redirect("category")->with("success", "Successfully Deleted");
        }
    }
}
