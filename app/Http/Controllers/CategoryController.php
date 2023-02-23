<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::get();
        return response()->json($data,200);
    }

    public function add(Request $request)
    {
        $label = $request->label;

        if (Category::create(['label' => $label])) {
            return response()->json(['message' => 'Category added successfully'],200);
        } else {
            return response()->json(['message' => 'Category not added'],500);
        }
        
    }
}
