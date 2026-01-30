<?php

namespace App\Http\Controllers\ManagerController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Color;


class ManagerController extends Controller
{
    public function dashboard()
    {
        $brands = Brand::withCount('products')->get();
        // добавляет к каждому бренду поле products_count с количеством связанных продуктов
        $totalBrands = $brands->count();
        $brandProducts = $brands->sum('products_count');

        $colors = Color::withCount('products')->get();
        $totalColors = $colors->count();
        $colorProducts = $colors->sum('products_count');
        return view('admin.manager.references', compact('brands', 'totalBrands', 'brandProducts', 'colors', 'totalColors', 'colorProducts'));
    }
}