@extends('layouts.app')

@section('title', 'Products - SHOP.CO')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex gap-8">
            <!-- Filters Sidebar -->
            <div class="w-64 flex-shrink-0">
                <h3 class="text-lg font-bold mb-4">Filters</h3>
                <form method="GET" action="{{ route('products.index') }}">
                    <!-- Main Category -->
                    <div class="mb-6">
                        <h4 class="font-semibold mb-2">Category</h4>
                        <select name="main_category" class="w-full border border-gray-300 rounded px-3 py-2">
                            <option value="">All Categories</option>
                            @foreach($mainCategories as $mainCat)
                                <option value="{{ $mainCat->id }}" {{ request('main_category') == $mainCat->id ? 'selected' : '' }}>{{ $mainCat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Sub Category -->
                    <div class="mb-6">
                        <h4 class="font-semibold mb-2">Sub Category</h4>
                        <select name="sub_category" class="w-full border border-gray-300 rounded px-3 py-2">
                            <option value="">All Sub Categories</option>
                            @foreach($subCategories as $subCat)
                                <option value="{{ $subCat->id }}" {{ request('sub_category') == $subCat->id ? 'selected' : '' }}>{{ $subCat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Brand -->
                    <div class="mb-6">
                        <h4 class="font-semibold mb-2">Brand</h4>
                        <select name="brand" class="w-full border border-gray-300 rounded px-3 py-2">
                            <option value="">All Brands</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Style -->
                    <div class="mb-6">
                        <h4 class="font-semibold mb-2">Style</h4>
                        <select name="style" class="w-full border border-gray-300 rounded px-3 py-2">
                            <option value="">All Styles</option>
                            @foreach($styles as $style)
                                <option value="{{ $style->id }}" {{ request('style') == $style->id ? 'selected' : '' }}>
                                    {{ $style->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Size -->
                    <div class="mb-6">
                        <h4 class="font-semibold mb-2">Size</h4>
                        <select name="size" class="w-full border border-gray-300 rounded px-3 py-2">
                            <option value="">All Sizes</option>
                            @foreach($sizes as $size)
                                <option value="{{ $size->id }}" {{ request('size') == $size->id ? 'selected' : '' }}>
                                    {{ $size->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Color -->
                    <div class="mb-6">
                        <h4 class="font-semibold mb-2">Color</h4>
                        <select name="color" class="w-full border border-gray-300 rounded px-3 py-2">
                            <option value="">All Colors</option>
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}" {{ request('color') == $color->id ? 'selected' : '' }}>
                                    {{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Price Range -->
                    <div class="mb-6">
                        <h4 class="font-semibold mb-2">Price Range</h4>
                        <div class="flex gap-2">
                            <input type="number" name="price_min" value="{{ request('price_min') }}" placeholder="Min"
                                class="w-1/2 border border-gray-300 rounded px-3 py-2">
                            <input type="number" name="price_max" value="{{ request('price_max') }}" placeholder="Max"
                                class="w-1/2 border border-gray-300 rounded px-3 py-2">
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-black text-white py-2 rounded hover:bg-gray-900 transition-colors">Apply
                        Filters</button>
                    <a href="{{ route('products.index') }}"
                        class="block text-center mt-2 text-gray-600 hover:text-black">Clear Filters</a>
                </form>
            </div>

            <!-- Products Grid -->
            <div class="flex-1">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">Products</h1>
                    <span class="text-gray-600">{{ $products->total() }} products found</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($products as $product)
                        <div class="group cursor-pointer">
                            <div class="bg-[#F0EEED] rounded-[20px] p-0 mb-4 overflow-hidden relative aspect-[1/1.1]">
                                <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?q=80&w=400&auto=format&fit=crop"
                                    alt="{{ $product->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <button
                                    class="absolute bottom-4 right-4 bg-white p-3 rounded-full shadow-lg translate-y-20 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300 z-10 hover:bg-black hover:text-white">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4"></path>
                                    </svg>
                                </button>
                            </div>
                            <h4 class="font-bold text-lg mb-1 group-hover:text-gray-600 transition-colors">
                                {{ $product->name }}</h4>
                            <div class="flex items-center gap-2 mb-2">
                                <div class="flex text-yellow-400 text-sm">★★★★☆</div>
                                <span class="text-gray-500 text-sm">4.5/5</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-2xl font-bold">${{ number_format($product->price, 2) }}</span>
                                @if($product->discount_price)
                                    <span
                                        class="text-gray-400 font-bold line-through text-lg">${{ number_format($product->discount_price, 2) }}</span>
                                    <span
                                        class="bg-red-100 text-red-600 text-xs font-medium px-3 py-1 rounded-full">-{{ round((1 - $product->price / $product->discount_price) * 100) }}%</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $products->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection