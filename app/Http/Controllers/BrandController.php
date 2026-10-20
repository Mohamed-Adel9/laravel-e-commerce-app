<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $brands = Brand::when($request->search_field, function ($query) use ($request) {
            return $query->whereAny([
                'name',
                'slug',
            ], 'like', '%' . $request->search_field . '%');
        })->paginate(10);
        return view('brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $path = '';
        if($request->hasFile('image')){
            $path= $request->file('image')->store('brands','public');
        }
        $item = new Brand();
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
        $brand = Brand::where('id', $id)->first();
        return view('brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $path = ' ';
        $item = Brand::where('id', $id)->first();

        if($request->hasFile('image')){
            if($item->image){
                Storage::disk('public')->delete($item->image);
            }
            $path= $request->file('image')->store('brands','public');
            $item->image= $path;
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
        $brand = Brand::where('id', $id)->first();

        if($brand->image){
            Storage::disk('public')->delete($brand->image);
        }

        $brand->delete();

        return back();
    }
}
