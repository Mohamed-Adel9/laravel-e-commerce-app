<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $item = new Brand();
        $item->name = $request->name;
        $item->slug = $request->slug;
        $item->image = " ";
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
        $item =Brand::where('id', $id)->first();
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
        $brand->delete();

        return back();
    }
}
