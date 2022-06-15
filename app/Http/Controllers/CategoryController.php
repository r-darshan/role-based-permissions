<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(config('constants.paginate.itemcount'));
        
        return view('categories.view-all', compact('categories'));
    }
}
