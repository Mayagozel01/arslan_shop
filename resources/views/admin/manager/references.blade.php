@extends('admin.layouts.app')

@section('header', 'References Manager')
@section('subheader', 'Manage your product attributes and global settings.')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8">

        <!-- Tabs Navigation container -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-6">
            <nav class="flex overflow-x-auto" id="tabs-nav">
                <button onclick="switchTab('categories')" id="tab-btn-categories"
                    class="tab-btn w-full sm:w-auto px-6 py-4 text-sm font-medium transition-all duration-200 ease-in-out flex items-center justify-center gap-2 min-w-[120px] focus:outline-none text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Categories
                </button>

                <button onclick="switchTab('brands')" id="tab-btn-brands"
                    class="tab-btn active w-full sm:w-auto px-6 py-4 text-sm font-medium transition-all duration-200 ease-in-out flex items-center justify-center gap-2 min-w-[120px] focus:outline-none text-blue-600 border-b-2 border-blue-600 bg-blue-50/50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    Brands
                </button>
                <button onclick="switchTab('styles')" id="tab-btn-styles" class="tab-btn w-full sm:w-auto px-6 py-4 text-sm font-medium transition-all duration-200 ease-in-out flex items-center
                         justify-center gap-2 min-w-[120px] focus:outline-none ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                    </svg>

                    Styles
                </button>
                <button onclick="switchTab('sizes')" id="tab-btn-sizes"
                    class="tab-btn w-full sm:w-auto px-6 py-4 text-sm font-medium transition-all duration-200 ease-in-out flex items-center justify-center gap-2 min-w-[120px] focus:outline-none text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                    </svg>
                    Sizes
                </button>

                <button onclick="switchTab('colors')" id="tab-btn-colors"
                    class="tab-btn w-full sm:w-auto px-6 py-4 text-sm font-medium transition-all duration-200 ease-in-out flex items-center justify-center gap-2 min-w-[120px] focus:outline-none text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                    </svg>
                    Colors
                </button>




            </nav>
        </div>

        <!-- Content Panels -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 min-h-[400px]">
            <!-- Categories Panel -->
            <div id="panel-categories" class="tab-panel hidden transition-opacity duration-300 ease-in-out p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-800">Category Structure</h3>
                    <button type="button" onclick="openAddCategoryModal()"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        + Add Main Category
                    </button>
                </div>
                <!-- Categories Summary -->
                <div class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-blue-50 p-4 rounded-xl border border-blue-100">
                        <p class="text-sm text-blue-600 font-medium mb-1">Main Categories</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $totalMainCategories }}</h3>
                        <button  type="button" onclick="openAddCategoryModal()"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            + Add Main Category
                        </button>
                    </div>
                    <div class="bg-indigo-50 p-4 rounded-xl border border-indigo-100">
                        <p class="text-sm text-indigo-600 font-medium mb-1">Middle Categories</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $totalCategories }}</h3>
                        <button
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            + Add Middle Category
                        </button>
                    </div>
                    <div class="bg-purple-50 p-4 rounded-xl border border-purple-100">
                        <p class="text-sm text-purple-600 font-medium mb-1">Sub Categories</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $totalSubCategories }}</h3>
                        <button
                            class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            + Add Sub Category
                        </button>
                    </div>
                </div>

                @if($mainCategories->isNotEmpty())
                    <!-- Categories Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 border border-gray-200 rounded-lg">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Main Category
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Middle Category
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Sub Category
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Products
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($mainCategories as $mainCategory)
                                    @php
                                        $mainCategoryRowspan = 0;
                                        foreach ($mainCategory->categories as $category) {
                                            $mainCategoryRowspan += max(1, $category->subCategories->count());
                                        }
                                        $mainCategoryRowspan = max(1, $mainCategoryRowspan);
                                    @endphp

                                    @if($mainCategory->categories->isNotEmpty())
                                        @foreach($mainCategory->categories as $categoryIndex => $category)
                                            @php
                                                $categoryRowspan = max(1, $category->subCategories->count());
                                            @endphp

                                            @if($category->subCategories->isNotEmpty())
                                                @foreach($category->subCategories as $subCategoryIndex => $subCategory)
                                                    <tr class="hover:bg-gray-50 transition-colors">
                                                        @if($categoryIndex === 0 && $subCategoryIndex === 0)
                                                            <td rowspan="{{ $mainCategoryRowspan }}"
                                                                class="px-6 py-4 whitespace-nowrap border-r border-gray-200 bg-blue-50/30">
                                                                <div class="flex items-center justify-between">
                                                                    <div>
                                                                        <div class="text-sm font-bold text-gray-900">{{ $mainCategory->name }}</div>
                                                                        <div class="text-xs text-gray-500">{{ $mainCategory->products_count }} products
                                                                        </div>
                                                                    </div>
                                                                    <button class="ml-2 p-1 text-red-600 hover:bg-red-50 rounded transition-colors delete-main-category-btn" data-slug="{{ $mainCategory->slug }}" data-name="{{ $mainCategory->name }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        @endif

                                                        @if($subCategoryIndex === 0)
                                                            <td rowspan="{{ $categoryRowspan }}"
                                                                class="px-6 py-4 whitespace-nowrap border-r border-gray-200 bg-indigo-50/20">
                                                                <div class="flex items-center justify-between">
                                                                    <div>
                                                                        <div class="text-sm font-semibold text-gray-800">{{ $category->name }}</div>
                                                                        <div class="text-xs text-gray-500">{{ $category->products_count }} products
                                                                        </div>
                                                                    </div>
                                                                    <button class="ml-2 p-1 text-red-600 hover:bg-red-50 rounded transition-colors">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        @endif

                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="text-sm text-gray-900">{{ $subCategory->name }}</div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <span
                                                                class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                {{ $subCategory->products_count }}
                                                            </span>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                                            <button class="text-red-600 hover:text-red-900 transition-colors">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr class="hover:bg-gray-50 transition-colors">
                                                    @if($categoryIndex === 0)
                                                        <td rowspan="{{ $mainCategoryRowspan }}"
                                                            class="px-6 py-4 whitespace-nowrap border-r border-gray-200 bg-blue-50/30">
                                                            <div class="flex items-center justify-between">
                                                                <div>
                                                                    <div class="text-sm font-bold text-gray-900">{{ $mainCategory->name }}</div>
                                                                    <div class="text-xs text-gray-500">{{ $mainCategory->products_count }} products
                                                                    </div>
                                                                </div>
                                                                <button class="ml-2 p-1 text-red-600 hover:bg-red-50 rounded transition-colors">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    @endif
                                                    <td class="px-6 py-4 whitespace-nowrap border-r border-gray-200 bg-indigo-50/20">
                                                        <div class="flex items-center justify-between">
                                                            <div>
                                                                <div class="text-sm font-semibold text-gray-800">{{ $category->name }}</div>
                                                                <div class="text-xs text-gray-500">{{ $category->products_count }} products
                                                                </div>
                                                            </div>
                                                            <button class="ml-2 p-1 text-red-600 hover:bg-red-50 rounded transition-colors">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-gray-400 italic">
                                                        No subcategories
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span
                                                            class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-600">
                                                            0
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                                        <button class="text-blue-600 hover:text-blue-900 transition-colors">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M12 4v16m8-8H4" />
                                                            </svg>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @else
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <td class="px-6 py-4 whitespace-nowrap border-r border-gray-200 bg-blue-50/30">
                                                <div class="flex items-center justify-between">
                                                    <div>
                                                        <div class="text-sm font-bold text-gray-900">{{ $mainCategory->name }}</div>
                                                        <div class="text-xs text-gray-500">{{ $mainCategory->products_count }} products
                                                        </div>
                                                    </div>
                                                    <button class="ml-2 p-1 text-red-600 hover:bg-red-50 rounded transition-colors delete-main-category-btn" data-slug="{{ $mainCategory->slug }}" data-name="{{ $mainCategory->name }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-gray-400 italic" colspan="2">
                                                No categories
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-600">
                                                    0
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <button class="text-blue-600 hover:text-blue-900 transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 4v16m8-8H4" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="border-2 border-dashed border-gray-200 rounded-lg p-12 text-center text-gray-400">
                        <div
                            class="bg-gray-50 text-gray-300 rounded-full h-16 w-16 flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900">No Categories Found</h3>
                        <p class="mt-2 text-sm text-gray-500">Get started by creating your first Main Category.</p>
                    </div>
                @endif
            </div>

            <!-- Brands Panel -->
            <div id="panel-brands" class="tab-panel transition-opacity duration-300 ease-in-out p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-800">Brands Management</h3>
                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        + Add Brand
                    </button>
                </div>
                @if ($brands && $brands->count() > 0)
                    <div class="mb-6 flex items-center justify-between bg-gray-50 p-4 rounded-lg border border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-blue-100 rounded-lg text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 font-medium">Total Brands</p>
                                <p class="text-2xl font-bold text-gray-800">{{ $totalBrands }}</p>
                            </div>
                        </div>
                        <div class="text-sm text-gray-400">
                            Showing all available brands
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                        @foreach($brands as $brand)
                            <div
                                class="group relative bg-white border border-gray-200 rounded-xl p-4 hover:shadow-lg hover:shadow-blue-500/10 transition-all duration-300 hover:border-blue-400 hover:-translate-y-1 cursor-pointer">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div
                                            class="h-12 w-12 rounded-xl bg-gradient-to-br from-blue-50 to-indigo-50 border border-blue-100 flex items-center justify-center text-blue-600 font-bold text-lg group-hover:from-blue-600 group-hover:to-indigo-600 group-hover:text-white group-hover:border-transparent transition-all duration-300 shadow-sm">
                                            {{ substr($brand->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <h4
                                                class="font-bold text-gray-800 group-hover:text-blue-600 transition-colors text-base">
                                                {{ $brand->name }}
                                            </h4>
                                            <p class="text-xs text-gray-400 group-hover:text-blue-400 transition-colors">
                                                View {{ $brand->products_count }}
                                                {{ Str::plural('product', $brand->products_count) }}
                                            </p>
                                        </div>
                                    </div>
                                    <div
                                        class="h-8 w-8 rounded-full bg-gray-50 flex items-center justify-center opacity-0 group-hover:opacity-100 group-hover:bg-blue-50 text-blue-600 transform translate-x-2 group-hover:translate-x-0 transition-all duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div
                        class="border-2 border-dashed border-gray-200 rounded-xl p-12 text-center text-gray-400 flex flex-col items-center justify-center min-h-[300px] bg-gray-50 hover:bg-white hover:border-blue-300 transition-all duration-300">
                        <div
                            class="bg-white p-4 rounded-full mb-4 shadow-sm border border-gray-100 group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-300" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No Brands Found</h3>
                        <p class="text-gray-500 max-w-xs mx-auto mb-6">It looks like there are no brands added to the system
                            yet.</p>
                        <button
                            class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium shadow-sm hover:shadow-md transition-all duration-200 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Create First Brand
                        </button>
                    </div>
                @endif

            </div>

            <!-- Styles Panel -->
            <div id="panel-styles" class="tab-panel hidden transition-opacity duration-300 ease-in-out p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-800">Styles</h3>
                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        + Add Style
                    </button>
                </div>
                @if ($styles->isNotEmpty())
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($styles as $style)
                            <div
                                class="border-2 border-dashed border-gray-200 rounded-lg p-6 text-center hover:border-blue-300 transition-all duration-300">
                                <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $style->name }}</h3>
                                <p class="text-gray-500">{{ $style->products_count }}
                                    {{ Str::plural('product', $style->products_count) }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="border-2 border-dashed border-gray-200 rounded-lg p-12 text-center text-gray-400">
                        <p>Manage your category tree and hierarchy here.</p>
                    </div>
                @endif
            </div>
            <!-- Colors Panel -->
            <div id="panel-colors" class="tab-panel hidden transition-opacity duration-300 ease-in-out p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-800">Colors Palette</h3>
                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        + Add Color
                    </button>
                </div>
                @if ($colors->isNotEmpty())
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($colors as $color)
                            <div
                                class="border-2 border-dashed border-gray-200 rounded-lg p-6 text-center hover:border-blue-300 transition-all duration-300">
                                <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $color->name }}</h3>
                                <p class="text-gray-500">{{ $color->products_count }}
                                    {{ Str::plural('product', $color->products_count) }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="border-2 border-dashed border-gray-200 rounded-lg p-12 text-center text-gray-400">
                        <p>Color management settings will appear here.</p>
                    </div>
                @endif
            </div>

            <!-- Sizes Panel -->
            <div id="panel-sizes" class="tab-panel hidden transition-opacity duration-300 ease-in-out p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-800">Size Configurations</h3>
                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        + Add Size
                    </button>
                </div>
                @if ($sizes->isNotEmpty())
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($sizes as $size)
                            <div
                                class="border-2 border-dashed border-gray-200 rounded-lg p-6 text-center hover:border-blue-300 transition-all duration-300">
                                <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $size->name }}</h3>
                                <p class="text-gray-500">{{ $size->products_count }}
                                    {{ Str::plural('product', $size->products_count) }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="border-2 border-dashed border-gray-200 rounded-lg p-12 text-center text-gray-400">
                        <p>Size charts and management will appear here.</p>
                    </div>
                @endif
            </div>


        </div>
    </div>

    <!-- Add Main Category Modal -->
    <div id="addCategoryModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-lg rounded-lg bg-white">
            <!-- Modal Header -->
            <div class="flex items-center justify-between pb-3 border-b">
                <h3 class="text-xl font-bold text-gray-900">Add New Main Category</h3>
                <button type="button" onclick="closeAddCategoryModal()"
                    class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="mt-4">
                <div id="modalMessage" class="hidden mb-4 p-3 rounded-lg text-sm"></div>
                <form id="addCategoryForm" class="space-y-4">
                    <!-- Category Name -->
                    <div>
                        <label for="categoryName" class="block text-sm font-medium text-gray-700 mb-1">
                            Category Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="categoryName" name="name" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="e.g., Electronics">
                    </div>

                    <!-- Category Slug -->
                    <div>
                        <label for="categorySlug" class="block text-sm font-medium text-gray-700 mb-1">
                            Slug <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="categorySlug" name="slug" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="e.g., electronics">
                        <p class="mt-1 text-xs text-gray-500">URL-friendly version (lowercase, no spaces)</p>
                    </div>

                    <!-- Category Description -->
                    <div>
                        <label for="categoryDescription" class="block text-sm font-medium text-gray-700 mb-1">
                            Description
                        </label>
                        <textarea id="categoryDescription" name="description" rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Brief description of this category"></textarea>
                    </div>

                    <!-- Modal Footer -->
                    <div class="flex items-center justify-end gap-3 pt-4 border-t">
                        <button type="button" onclick="closeAddCategoryModal()"
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            Add Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function switchTab(tabId) {
            // Hide all panels
            const panels = document.querySelectorAll('.tab-panel');
            panels.forEach(panel => {
                panel.classList.add('hidden');
                panel.classList.remove('opacity-100');
                panel.classList.add('opacity-0');
            });

            // Reset all tab buttons
            const buttons = document.querySelectorAll('.tab-btn');
            buttons.forEach(btn => {
                btn.classList.remove('text-blue-600', 'border-b-2', 'border-blue-600', 'bg-blue-50/50');
                btn.classList.add('text-gray-500', 'hover:text-gray-700', 'hover:bg-gray-50');
            });

            // Show active panel
            const activePanel = document.getElementById('panel-' + tabId);
            activePanel.classList.remove('hidden');
            // Small timeout to allow display change to register before opacity transition
            setTimeout(() => {
                activePanel.classList.remove('opacity-0');
                activePanel.classList.add('opacity-100');
            }, 10);

            // Activate button
            const activeBtn = document.getElementById('tab-btn-' + tabId);
            activeBtn.classList.remove('text-gray-500', 'hover:text-gray-700', 'hover:bg-gray-50');
            activeBtn.classList.add('text-blue-600', 'border-b-2', 'border-blue-600', 'bg-blue-50/50');
        }

        // Modal functions
        function openAddCategoryModal() {
            console.log('Opening modal...');
            const modal = document.getElementById('addCategoryModal');
            console.log('Modal element:', modal);
            if (modal) {
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                console.log('Modal opened');
            } else {
                console.error('Modal not found!');
            }
        }

        function closeAddCategoryModal() {
            console.log('Closing modal...');
            const modal = document.getElementById('addCategoryModal');
            if (modal) {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
                // Reset form
                const form = document.getElementById('addCategoryForm');
                if (form) form.reset();
                console.log('Modal closed');
            }
        }

        // Close modal when clicking outside
        window.addEventListener('DOMContentLoaded', function () {
            console.log('DOM loaded, setting up modal...');
            const modal = document.getElementById('addCategoryModal');
            console.log('Found modal:', modal);

            if (modal) {
                modal.addEventListener('click', function (e) {
                    if (e.target === modal) {
                        closeAddCategoryModal();
                    }
                });
            }

            // Slug auto-generation
            const nameInput = document.getElementById('categoryName');
            const slugInput = document.getElementById('categorySlug');
            
            if (nameInput && slugInput) {
                nameInput.addEventListener('input', function() {
                    const slug = this.value
                        .toLowerCase()
                        .replace(/[^\w\s-]/g, '') // Remove non-word chars
                        .replace(/\s+/g, '-')     // Replace spaces with -
                        .replace(/-+/g, '-')      // Replace multiple - with single -
                        .trim();
                    slugInput.value = slug;
                });
            }

            // Handle form submission (AJAX)
            const form = document.getElementById('addCategoryForm');
            const messageDiv = document.getElementById('modalMessage');

            if (form) {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    
                    // Reset message state
                    messageDiv.classList.add('hidden');
                    messageDiv.className = 'mb-4 p-3 rounded-lg text-sm hidden';
                    
                    const formData = new FormData(form);
                    const submitBtn = form.querySelector('button[type="submit"]');
                    const originalBtnText = submitBtn.innerHTML;
                    
                    // Disable button and show loading state
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<span class="flex items-center gap-2">Creating... <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg></span>';

                    fetch("{{ route('admin.manager.add-main-category') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(Object.fromEntries(formData))
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Show success message
                            messageDiv.textContent = data.message;
                            messageDiv.classList.remove('hidden');
                            messageDiv.classList.add('bg-green-100', 'text-green-800', 'border', 'border-green-200');
                            
                            // Success! Reload after a short delay to show the new category
                            setTimeout(() => {
                                window.location.reload();
                            }, 1500);
                        } else {
                            // Handle validation errors or overall error
                            let errorMessage = data.message;
                            if (data.errors) {
                                errorMessage = Object.values(data.errors).flat().join('\n');
                            }
                            
                            messageDiv.textContent = errorMessage;
                            messageDiv.classList.remove('hidden');
                            messageDiv.classList.add('bg-red-100', 'text-red-800', 'border', 'border-red-200');
                            
                            // Enable button again
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = originalBtnText;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        messageDiv.textContent = 'A network error occurred. Please try again.';
                        messageDiv.classList.remove('hidden');
                        messageDiv.classList.add('bg-red-100', 'text-red-800', 'border', 'border-red-200');
                        
                        // Enable button again
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalBtnText;
                    });
                });
            }

            // Handle delete main category buttons
            document.querySelectorAll('.delete-main-category-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const categorySlug = this.getAttribute('data-slug');
                    const categoryName = this.getAttribute('data-name');
                    
                    // Show confirmation dialog
                    if (!confirm(`Are you sure you want to delete the main category "${categoryName}"? This action cannot be undone.`)) {
                        return;
                    }
                    
                    // Send AJAX request
                    fetch(`{{ route('admin.manager.delete-main-category', '__SLUG__') }}`.replace('__SLUG__', categorySlug), {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Show success message
                            alert(data.message);
                            // Reload the page to reflect changes
                            window.location.reload();
                        } else {
                            // Show error message
                            alert(data.message || 'Failed to delete category');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('A network error occurred. Please try again.');
                    });
                });
            });
        });
    </script>
@endsection