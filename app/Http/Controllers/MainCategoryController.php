<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use Illuminate\Http\Request;

class MainCategoryController extends Controller
{
    public function index()
    {
        $main_categories = MainCategory::all();
        return view('admin.main-controller', compact('main_categories'));
    }
    public function store(Request $request)
    {
        MainCategory::create([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.main-controller')->with('success', 'Main Category created successfully');
    }
    
}

