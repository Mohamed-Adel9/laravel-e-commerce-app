<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index()
    {
        $items = Product::where('status', 'draft' )
        ->where('stock_status', 'in_stock')
        ->get();

        return $items;

    }

    public function getDraft()
    {
        $item = Product::draft()->get();

        return $item;
    }
}
