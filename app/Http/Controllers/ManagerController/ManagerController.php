<?php

namespace App\Http\Controllers\ManagerController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainCategory;
use App\Models\Brand;
use App\Models\Style;
use App\Models\Size;
use App\Models\Color;


class ManagerController extends Controller
{
    public function dashboard()
    {
        $mainCategories = MainCategory::with([
            'categories.subCategories' => function ($q) {
                $q->withCount('products');
            }
        ])->get();

        // Process product counts recursively
        $mainCategories->each(function ($mainCategory) {
            $mainCategory->products_count = 0;
            $mainCategory->categories->each(function ($category) use ($mainCategory) {
                $category->products_count = $category->subCategories->sum('products_count');
                $mainCategory->products_count += $category->products_count;
            });
        });

        // Calculate totals
        $totalMainCategories = $mainCategories->count();
        $totalCategories = $mainCategories->pluck('categories')->flatten()->count();
        $totalSubCategories = $mainCategories->pluck('categories')->flatten()->pluck('subCategories')->flatten()->count();

        $brands = Brand::withCount('products')->get();
        // добавляет к каждому бренду поле products_count с количеством связанных продуктов
        $totalBrands = $brands->count();
        $brandProducts = $brands->sum('products_count');



        $styles = Style::withCount('products')->get();
        $totalStyles = $styles->count();
        $styleProducts = $styles->sum('products_count');

        $sizes = Size::withCount('products')->get();
        $totalSizes = $sizes->count();

        $colors = Color::withCount('products')->get();
        $totalColors = $colors->count();
        $colorProducts = $colors->sum('products_count');
        return view('admin.manager.references', compact(
            'brands',
            'totalBrands',
            'brandProducts',
            'styles',
            'totalStyles',
            'styleProducts',
            'sizes',
            'totalSizes',
            'colors',
            'totalColors',
            'colorProducts',
            'mainCategories',
            'totalMainCategories',
            'totalCategories',
            'totalSubCategories'
        ));
    }
    public function storeMaincategory(Request $request)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:main_categories,name',
                'slug' => 'required|string|max:255|unique:main_categories,slug',
                'description' => 'nullable|string|max:1000',
            ], [
                'name.required' => 'Category name is required.',
                'name.unique' => 'A category with this name already exists.',
                'slug.required' => 'Slug is required.',
                'slug.unique' => 'A category with this slug already exists.',
            ]);

            // Create the main category
            $mainCategory = MainCategory::create([
                'name' => $validated['name'],
                'slug' => $validated['slug'],
                'description' => $validated['description'] ?? null,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Main category created successfully!',
                'data' => $mainCategory
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating the category.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function deleteMainCategory(Request $request, $slug)
    {
        try {
            // Find the main category using the slug from the route parameter
            $mainCategory = MainCategory::where('slug', $slug)->first();
            
            if (!$mainCategory) {
                return response()->json([
                    'success' => false,
                    'message' => 'Category not found.'
                ], 404);
            }

            // Check if category has related categories (prevent deletion if has children)
            if ($mainCategory->categories()->exists()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot delete main category because it has child categories. Please delete child categories first.'
                ], 400);
            }

            // Delete the main category
            $mainCategory->delete();

            return response()->json([
                'success' => true,
                'message' => 'Main category deleted successfully!'
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the category.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}