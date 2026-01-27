<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\MainCategory;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Style;
use App\Models\Size;
use App\Models\Color;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['subCategory.category.mainCategory', 'brands', 'styles', 'sizes', 'colors']);

        // Filters
        if ($request->filled('main_category')) {
            $query->whereHas('subCategory.category.mainCategory', function ($q) use ($request) {
                $q->where('id', $request->main_category);
            });
        }

        if ($request->filled('category')) {
            $query->whereHas('subCategory.category', function ($q) use ($request) {
                $q->where('id', $request->category);
            });
        }

        if ($request->filled('sub_category')) {
            $query->where('category_id', $request->sub_category);
        }

        if ($request->filled('brand')) {
            $query->whereHas('brands', function ($q) use ($request) {
                $q->where('id', $request->brand);
            });
        }

        if ($request->filled('style')) {
            $query->whereHas('styles', function ($q) use ($request) {
                $q->where('id', $request->style);
            });
        }

        if ($request->filled('size')) {
            $query->whereHas('sizes', function ($q) use ($request) {
                $q->where('id', $request->size);
            });
        }

        if ($request->filled('color')) {
            $query->whereHas('colors', function ($q) use ($request) {
                $q->where('id', $request->color);
            });
        }

        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }

        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->paginate(12);

        // Get all options for filters
        $mainCategories = MainCategory::all();
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();
        $styles = Style::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view('products.index', compact(
            'products',
            'mainCategories',
            'categories',
            'subCategories',
            'brands',
            'styles',
            'sizes',
            'colors'
        ));
    }
}