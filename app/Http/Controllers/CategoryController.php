<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function store()
    {
        DB::table('categories')->insert(
        
                [
                    'name' => 'Electronics',
                    'slug' => 'Electronic and gadgets',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
           
            
        );
    }
}
