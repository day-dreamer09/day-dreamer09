<?php

namespace App\Http\Controllers;

use App\Models\CateModel;
use App\Models\MenuModel;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CateModel::all();
        return view('dashboard.menu.add')->with(['categories'=> $categories]);
    }
   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         
        $request->validate([
            'title' =>'required|string|max:255',
            'category_id' =>'required|exists:category_models,id',
            'description' =>'required|string|max:255',
            'quantity' =>'required|string|max:500',
            'made_by' =>'required|string|max:255',
            'price' =>'required|string',
            'image' =>'required|image|mimes:jpeg,png,jpg,gif,webp',

            ]);
        //    dd($validatedData);
            $image_path="";
            if($request->hasFile('image'))
            {
                $file =$request->file('image');
                $image_name= 'Royal Cusine'. time().rand(100000,5000000000). "." .$file->getClientOriginalExtension();
                $file->move(public_path('uploads/menu/'),$image_name);
                $image_path='uploads/menu/'.$image_name;
            }
            $menu = new MenuModel();
            $menu->title =$request->title;
            $menu->category_id =$request->category_id;
            $menu->Description =$request->description;
            $menu->Quantity =$request->quantity;
            $menu->Made_by =$request->made_by;
            $menu->Price =$request->price;
            $menu->image =$image_path;
            $menu->save();
        
          return redirect()->route('menu.show')->with('success', 'Menu Added Successfully.');
        }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $menu = MenuModel::all();
        return view('dashboard.menu.show')->with(['menu'=> $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editdata = MenuModel::find($id);
        $categories = CateModel::all(); 
        return view('dashboard.menu.update', compact('editdata', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' =>'required|string|max:255',
            'category_id' =>'required|exists:category_models,id',
            'description' =>'required|string|max:255',
            'quantity' =>'required|string|max:500',
            'made_by' =>'required|string|max:255',
            'price' =>'required|string',
            'image' =>'required|image|mimes:jpeg,png,jpg,gif,webp',

            ]);
        
            $image_path="";
            if($request->hasFile('image'))
            {
                $file =$request->file('image');
                $image_name= 'Royal Cusine'. time().rand(100000,5000000000). "." .$file->getClientOriginalExtension();
                $file->move(public_path('uploads/menu/'),$image_name);
                $image_path='uploads/menu/'.$image_name;
            }
            $menu = MenuModel::find($id);
            $menu->title =$request->title;
            $menu->category_id =$request->category_id;
            $menu->Description =$request->description;
            $menu->Quantity =$request->quantity;
            $menu->Made_by =$request->made_by;
            $menu->Price =$request->price;
            $menu->image =$image_path;
            $menu->save();
        
          return redirect()->route('menu.show')->with('success', 'Menu Updated Successfully.');
        }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delid = MenuModel::find($id);
      
        
        $delid->delete();
        return redirect()->route('menu.show')->with(['failure' => "Category Deleted Successfully" ]);
    }
}
