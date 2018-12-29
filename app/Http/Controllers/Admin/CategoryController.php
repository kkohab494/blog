<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:categories',
            'image' => 'required|image|mimes:jpeg,bmp,png,jpg'
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) 
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            // Existing Image check in Category folder
            if (!Storage::disk('public')->exists('category')) 
            {
                Storage::disk('public')->makeDirectory('category');
            }

            // Image resize For Category Folder
            $category = Image::make($image)->resize(1600,479)->stream();
            Storage::disk('public')->put('category/'.$imageName, $category);

             // Existing Image check in Slider folder
            if (!Storage::disk('public')->exists('category/slider/')) 
            {
                Storage::disk('public')->makeDirectory('category/slider/');
            }

            // Image resize for Slider folder
            $slider = Image::make($image)->resize(500,333)->stream();
            Storage::disk('public')->put('category/slider/'.$imageName, $slider);
        }else {
            $imageName = "defualt.png";
        }

        $categories = new Category();
        $categories->name = $request->name;
        $categories->slug = $slug;
        $categories->image = $imageName;
        $categories->save();
        Toastr::success('Categroy Successfully Saved', 'Saved');
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin.categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = $request->file('image');
        $slug = str_slug($request->name);
        $categories = Category::find($id);
        if (isset($image)) 
        {
            
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            // Existing Image check in Category folder
            if (!Storage::disk('public')->exists('category')) 
            {
                Storage::disk('public')->delete('category');
            }

            // Image resize For Category Folder
            $category = Image::make($image)->resize(1600,479)->stream();
            Storage::disk('public')->put('category/'.$imageName, $category);

             // Existing Image check in Slider folder
            if (!Storage::disk('public')->exists('category/slider/')) 
            {
                Storage::disk('public')->delete('category/slider/');
            }

            // Image resize for Slider folder
            $slider = Image::make($image)->resize(500,333)->stream();
            Storage::disk('public')->put('category/slider/'.$imageName, $slider);
        }else {
            $imageName = $categories->image;
        }
        $categories->name = $request->name;
        $categories->slug = $slug;
        $categories->image = $imageName;
        $categories->save();
        Toastr::success('Categroy Successfully Updated', 'Updated');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (Storage::disk('public')->exists('category/'.$category->image)) 
        {
            Storage::disk('public')->delete('category/'.$category->image);
        }
        if (Storage::disk('public')->exists('category/slider/'.$category->image)) 
        {
            Storage::disk('public')->delete('category/slider/'.$category->image);
        }
        $category->delete();
        Toastr::success('Category Successfully Deleted', 'Deleted');
        return redirect()->back();
    }
}
