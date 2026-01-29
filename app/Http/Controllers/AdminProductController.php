<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Style;
use App\Models\Size;
use App\Models\Color;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['subCategory.category.mainCategory', 'brands', 'styles', 'sizes', 'colors', 'warehouses']);

        // Filters
        if ($request->filled('main_category')) {
            $query->whereHas('subCategory.category.mainCategory', function ($q) use ($request) {
                $q->where('id', $request->main_category);
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

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->paginate(15);

        // Get all options for filters
        $mainCategories = MainCategory::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();
        $styles = Style::all();
        $sizes = Size::all();
        $colors = Color::all();

        $warehouses = \App\Models\Warehouse::all();

        return view('admin.products', compact('products', 'mainCategories', 'subCategories', 'brands', 'styles', 'sizes', 'colors', 'warehouses'));
    }

    public function create()
    {
        return redirect()->route('admin.products.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:sub_categories,id',
            'price' => 'required|numeric|min:0',
            'sku' => 'required|string|unique:products',
            'brands' => 'array',
            'styles' => 'array',
            'sizes' => 'array',
            'colors' => 'array',
            'warehouses' => 'array',
            'warehouses.*.id' => 'exists:warehouses,id',
            'warehouses.*.stocks' => 'nullable|integer|min:0',
            'warehouses.*.income' => 'nullable|integer|min:0',
        ]);

        $product = Product::create($request->only(['name', 'category_id', 'price', 'discount_price', 'sku', 'description', 'is_active']));

        if ($request->brands) {
            $product->brands()->attach($request->brands);
        }
        if ($request->styles) {
            $product->styles()->attach($request->styles);
        }
        if ($request->sizes) {
            $product->sizes()->attach($request->sizes);
        }
        if ($request->colors) {
            $product->colors()->attach($request->colors);
        }
        if ($request->warehouses) {
            foreach ($request->warehouses as $warehouseData) {
                if (isset($warehouseData['id'])) {
                    $product->warehouses()->attach($warehouseData['id'], [
                        'stocks' => $warehouseData['stocks'] ?? 0,
                        'income' => $warehouseData['income'] ?? 0,
                    ]);
                }
            }
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'product' => $product,
                'message' => 'Product created successfully.'
            ]);
        }

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $product->load(['brands', 'styles', 'sizes', 'colors', 'subCategory.category.mainCategory', 'warehouses']);

        if (request()->ajax()) {
            return response()->json($product);
        }

        $mainCategories = MainCategory::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();
        $styles = Style::all();
        $sizes = Size::all();
        $colors = Color::all();

        $warehouses = \App\Models\Warehouse::all();

        return view('admin.products.edit', compact('product', 'mainCategories', 'subCategories', 'brands', 'styles', 'sizes', 'colors', 'warehouses'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:sub_categories,id',
            'price' => 'required|numeric|min:0',
            'sku' => 'required|string|unique:products,sku,' . $product->id,
            'brands' => 'array',
            'styles' => 'array',
            'sizes' => 'array',
            'colors' => 'array',
            'warehouses' => 'array',
            'warehouses.*.id' => 'exists:warehouses,id',
            'warehouses.*.stocks' => 'nullable|integer|min:0',
            'warehouses.*.income' => 'nullable|integer|min:0',
        ]);

        $product->update($request->only(['name', 'category_id', 'price', 'discount_price', 'sku', 'description', 'is_active']));

        $product->brands()->sync($request->brands ?? []);
        $product->styles()->sync($request->styles ?? []);
        $product->sizes()->sync($request->sizes ?? []);
        $product->colors()->sync($request->colors ?? []);

        if ($request->has('warehouses')) {
            $syncData = [];
            foreach ($request->warehouses as $warehouseData) {
                if (isset($warehouseData['id'])) {
                    $syncData[$warehouseData['id']] = [
                        'stocks' => $warehouseData['stocks'] ?? 0,
                        'income' => $warehouseData['income'] ?? 0,
                    ];
                }
            }
            $product->warehouses()->sync($syncData);
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'product' => $product,
                'message' => 'Product updated successfully.'
            ]);
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    // AJAX methods for creating related entities
    public function storeBrand(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands',
            'slug' => 'required|string|max:255|unique:brands',
        ]);

        $brand = Brand::create($request->only(['name', 'slug', 'description', 'logo']));

        return response()->json([
            'success' => true,
            'brand' => $brand,
            'message' => 'Brand created successfully.'
        ]);
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'main_category_id' => 'required|exists:main_categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories',
        ]);

        $category = Category::create($request->only(['main_category_id', 'name', 'slug', 'description']));

        return response()->json([
            'success' => true,
            'category' => $category,
            'message' => 'Category created successfully.'
        ]);
    }

    public function storeSubCategory(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:sub_categories',
        ]);

        $subCategory = SubCategory::create($request->only(['category_id', 'name', 'slug', 'description']));

        return response()->json([
            'success' => true,
            'subCategory' => $subCategory,
            'message' => 'Sub Category created successfully.'
        ]);
    }

    public function storeStyle(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:styles',
        ]);

        $style = Style::create($request->only(['name']));

        return response()->json([
            'success' => true,
            'style' => $style,
            'message' => 'Style created successfully.'
        ]);
    }

    public function storeSize(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:sizes',
            'code' => 'required|string|max:10|unique:sizes',
        ]);

        $size = Size::create($request->only(['name', 'code']));

        return response()->json([
            'success' => true,
            'size' => $size,
            'message' => 'Size created successfully.'
        ]);
    }

    public function storeColor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:colors',
            'hex_code' => 'required|string|regex:/^#[a-fA-F0-9]{6}$/',
        ]);

        $color = Color::create($request->only(['name', 'hex_code']));

        return response()->json([
            'success' => true,
            'color' => $color,
            'message' => 'Color created successfully.'
        ]);
    }
}
