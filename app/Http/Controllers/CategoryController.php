<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
     //
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $categories = Category::when($request->search_field , function($query) use ($request){
        $query->whereAny([
            'name',
            'slug',
            ] 
            , 'like','%'.$request->search_field.'%');
        })->paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $path = '';
        if($request->hasFile('image')){
            $path= $request->file('image')->store('categories','public');
        }
        $item = new Category();
        $item->name = $request->name;
        $item->slug = $request->slug;
        $item->image = $path;
        $item->save();

        return back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category = Category::where('id', $id)->first();
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $path = '';
        $item =Category::where('id', $id)->first();

        if($request->hasFile('image')){
            if($item->image){
                Storage::disk('public')->delete($item->image);
            }
            $path= $request->file('image')->store('categories','public');
            $item->image = $path;
        }

        $item->name = $request->name;
        $item->slug = $request->slug;
        $item->update();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::where('id', $id)->first();
        if($category->image){
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();

        return back();
    }
}
