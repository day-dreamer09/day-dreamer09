<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CategaryControllers;
use App\Models\cateModel;
use Illuminate\Http\Request;

class CategaryController extends Controller
{
    public function add()
    {
        return view('dashboard.Category.add');

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
        $image_path = "";

        if($request->hasFile('image'))
        {
            $file =$request->file('image');
            $path = $request->file('image')->store('category', 'public');
            $image_name= "meerab".time().rand(1000000,50000000000). ".".$file->getClientOriginalExtension();
            $image = $file->move(public_path('uploads/category/'),$image_name);
            $image_path = 'uploads/category/'.$image_name;
        }
        $category = new cateModel();
        $category->cate_name =$request->input('name');
        $category->cate_image =$image_path;
        $category->description =$request->input('description');
        $category->save();
        return redirect()->route('cate.show')->with(['success' => "Category Added Successfully" ]);
    }
    public function show()
    {
        $category = cateModel::all();
        return view('dashboard.Category.show')->with(['category' =>  $category]);
    }

    public function delete($id)
    {
        $delid = cateModel::find($id);
        $delid->delete();
        return redirect()->route('cate.show')->with(['failure' => "Category Deleted Successfully" ]);
    }

    public function edit($id)
    {   
        $editdata = cateModel::find($id);
        return view('dashboard.Category.update')->with(['editdata' => $editdata]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
        $image_path = "";

        if($request->hasFile('image'))
        {
            $file =$request->file('image');
            $image_name= "meerab".time().rand(1000000,50000000000). "." .$file->getClientOriginalExtension();
            $image = $file->move(public_path('uploads/category/'),$image_name);
            $image_path = 'uploads/category/'.$image_name;
        }


        $category = cateModel::find($id);
        $category->cate_name =$request->input('name');
        $category->cate_image =$image_path;
        $category->description =$request->input('description');
        $category->save();
        return redirect()->route('cate.show')->with(['sucess' => "Category Updated Successfully" ]);

    }



}
