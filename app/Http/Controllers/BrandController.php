<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //

    public function addData()
    {
        // $brand = new Brand();
        // $brand->name = 'Samsung';
        // $brand->slug = 'Samsung Electronics';
        // $brand->save();

        Brand::insert([
            [
                'name' => 'Samsung201',
                'slug' => 'Samsung Electronics010',
                'image' => 'samsung.jpg',
            ],
            [
                'name' => 'Apple',
                'slug' => 'Apple Electronics',
                'image' => 'apple.jpg',
            ],
            [
                'name' => 'Sony',
                'slug' => 'Sony Electronics',
                'image' => 'sony.jpg',
            ]
       ] );
        return 'redirect()->back()';
    }

    public function getData()
    {
        $brands = Brand::all();
        return $brands;
    }
}
