@extends('admin.layouts.app')

@section('header', 'Products Management')
@section('subheader', 'Manage products in your store')

@section('content')
    <div class="px-4 py-6">
        <!-- Header with Add Button -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Products</h2>
                <p class="text-gray-600">Manage your product catalog</p>
            </div>
            <button onclick="openModal('createProductModal')"
                class="bg-black text-white px-6 py-3 rounded-full font-semibold hover:bg-gray-800 transition-colors shadow-lg">
                + Add New Product
            </button>
        </div>

        <!-- Filters -->
        <div class="bg-white p-4 rounded-lg shadow mb-6">
            <form method="GET" action="{{ route('admin.products.index') }}" class="flex flex-wrap gap-4">
                <div class="flex-1 min-w-48">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Main Category</label>
                    <select name="main_category" class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="">All Categories</option>
                        @foreach($mainCategories as $mainCat)
                            <option value="{{ $mainCat->id }}" {{ request('main_category') == $mainCat->id ? 'selected' : '' }}>
                                {{ $mainCat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex-1 min-w-48">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Sub Category</label>
                    <select name="sub_category" class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="">All Sub Categories</option>
                        @foreach($subCategories as $subCat)
                            <option value="{{ $subCat->id }}" {{ request('sub_category') == $subCat->id ? 'selected' : '' }}>
                                {{ $subCat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex-1 min-w-48">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Brand</label>
                    <select name="brand" class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="">All Brands</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex-1 min-w-48">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..."
                        class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div class="flex items-end gap-2">
                    <button type="submit"
                        class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition-colors">
                        Filter
                    </button>
                    <a href="{{ route('admin.products.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition-colors">
                        Clear
                    </a>
                </div>
            </form>
        </div>

        <!-- Products Table -->
        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Products ({{ $products->total() }})
                </h3>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Product</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Category</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($products as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded bg-gray-200 flex items-center justify-center">
                                                <span class="text-gray-500 text-sm">{{ substr($product->name, 0, 2) }}</span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $product->name }}</div>
                                            <div class="text-sm text-gray-500">SKU: {{ $product->sku }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $product->subCategory->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $product->subCategory->category->mainCategory->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    ${{ number_format($product->price, 2) }}
                                    @if($product->discount_price)
                                        <div class="text-red-600">${{ number_format($product->discount_price, 2) }}</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $product->stock }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $product->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button onclick="openEditModal({{ $product->id }})"
                                        class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</button>
                                    <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="inline"
                                        onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                    No products found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-4 py-3 border-t border-gray-200">
                {{ $products->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

    <!-- Create Product Modal -->
    <div id="createProductModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div
            class="relative top-4 mx-auto p-5 border w-full max-w-4xl shadow-lg rounded-md bg-white max-h-screen overflow-y-auto">
            <div class="mt-3">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Create New Product</h3>
                    <button onclick="closeModal('createProductModal')" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>

                <form id="createProductForm">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div>
                            <label for="modal_name" class="block text-sm font-medium text-gray-700">Product Name</label>
                            <input type="text" name="name" id="modal_name" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <!-- SKU -->
                        <div>
                            <label for="modal_sku" class="block text-sm font-medium text-gray-700">SKU</label>
                            <input type="text" name="sku" id="modal_sku" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <!-- Sub Category -->
                        <div>
                            <label for="modal_category_id" class="block text-sm font-medium text-gray-700">Sub
                                Category</label>
                            <div class="flex gap-2">
                                <select name="category_id" id="modal_category_id" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="">Select Sub Category</option>
                                    @foreach($subCategories as $subCat)
                                        <option value="{{ $subCat->id }}">
                                            {{ $subCat->name }} ({{ $subCat->category->name }})
                                        </option>
                                    @endforeach
                                </select>
                                <button type="button" onclick="openModal('subCategoryModal')"
                                    class="mt-1 px-3 py-2 bg-gray-100 text-gray-600 rounded-md hover:bg-gray-200">
                                    +
                                </button>
                            </div>
                        </div>

                        <!-- Price -->
                        <div>
                            <label for="modal_price" class="block text-sm font-medium text-gray-700">Price</label>
                            <input type="number" step="0.01" name="price" id="modal_price" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <!-- Discount Price -->
                        <div>
                            <label for="modal_discount_price" class="block text-sm font-medium text-gray-700">Discount Price
                                (Optional)</label>
                            <input type="number" step="0.01" name="discount_price" id="modal_discount_price"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <!-- Stock -->
                        <div>
                            <label for="modal_stock" class="block text-sm font-medium text-gray-700">Stock</label>
                            <input type="number" name="stock" id="modal_stock" value="0" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <!-- Is Active -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <div class="mt-2">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="is_active" value="1" checked
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                    <span class="ml-2">Active</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mt-6">
                        <label for="modal_description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="modal_description" rows="3"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    </div>

                    <!-- Brands -->
                    <div class="mt-6">
                        <div class="flex justify-between items-center">
                            <label class="block text-sm font-medium text-gray-700">Brands</label>
                            <button type="button" onclick="openModal('brandModal')"
                                class="px-3 py-1 bg-gray-100 text-gray-600 rounded text-sm hover:bg-gray-200">
                                + Add Brand
                            </button>
                        </div>
                        <div class="mt-2 grid grid-cols-2 md:grid-cols-4 gap-2 max-h-32 overflow-y-auto">
                            @foreach($brands as $brand)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="brands[]" value="{{ $brand->id }}"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                    <span class="ml-2 text-sm">{{ $brand->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Styles -->
                    <div class="mt-6">
                        <div class="flex justify-between items-center">
                            <label class="block text-sm font-medium text-gray-700">Styles</label>
                            <button type="button" onclick="openModal('styleModal')"
                                class="px-3 py-1 bg-gray-100 text-gray-600 rounded text-sm hover:bg-gray-200">
                                + Add Style
                            </button>
                        </div>
                        <div class="mt-2 grid grid-cols-2 md:grid-cols-4 gap-2 max-h-32 overflow-y-auto">
                            @foreach($styles as $style)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="styles[]" value="{{ $style->id }}"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                    <span class="ml-2 text-sm">{{ $style->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Sizes -->
                    <div class="mt-6">
                        <div class="flex justify-between items-center">
                            <label class="block text-sm font-medium text-gray-700">Sizes</label>
                            <button type="button" onclick="openModal('sizeModal')"
                                class="px-3 py-1 bg-gray-100 text-gray-600 rounded text-sm hover:bg-gray-200">
                                + Add Size
                            </button>
                        </div>
                        <div class="mt-2 grid grid-cols-2 md:grid-cols-4 gap-2 max-h-32 overflow-y-auto">
                            @foreach($sizes as $size)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="sizes[]" value="{{ $size->id }}"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                    <span class="ml-2 text-sm">{{ $size->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Colors -->
                    <div class="mt-6">
                        <div class="flex justify-between items-center">
                            <label class="block text-sm font-medium text-gray-700">Colors</label>
                            <button type="button" onclick="openModal('colorModal')"
                                class="px-3 py-1 bg-gray-100 text-gray-600 rounded text-sm hover:bg-gray-200">
                                + Add Color
                            </button>
                        </div>
                        <div class="mt-2 grid grid-cols-2 md:grid-cols-4 gap-2 max-h-32 overflow-y-auto">
                            @foreach($colors as $color)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="colors[]" value="{{ $color->id }}"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                    <span class="ml-2 text-sm">{{ $color->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="mt-8 flex justify-end space-x-3">
                        <button type="button" onclick="closeModal('createProductModal')"
                            class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition-colors">
                            Cancel
                        </button>
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors">
                            Create Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div id="editProductModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div
            class="relative top-4 mx-auto p-5 border w-full max-w-4xl shadow-lg rounded-md bg-white max-h-screen overflow-y-auto">
            <div class="mt-3">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Edit Product</h3>
                    <button onclick="closeModal('editProductModal')" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>

                <form id="editProductForm">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div>
                            <label for="edit_name" class="block text-sm font-medium text-gray-700">Product Name</label>
                            <input type="text" name="name" id="edit_name" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <!-- SKU -->
                        <div>
                            <label for="edit_sku" class="block text-sm font-medium text-gray-700">SKU</label>
                            <input type="text" name="sku" id="edit_sku" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <!-- Sub Category -->
                        <div>
                            <label for="edit_category_id" class="block text-sm font-medium text-gray-700">Sub
                                Category</label>
                            <div class="flex gap-2">
                                <select name="category_id" id="edit_category_id" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="">Select Sub Category</option>
                                    @foreach($subCategories as $subCat)
                                        <option value="{{ $subCat->id }}">
                                            {{ $subCat->name }} ({{ $subCat->category->name }})
                                        </option>
                                    @endforeach
                                </select>
                                <button type="button" onclick="openModal('subCategoryModal')"
                                    class="mt-1 px-3 py-2 bg-gray-100 text-gray-600 rounded-md hover:bg-gray-200">
                                    +
                                </button>
                            </div>
                        </div>

                        <!-- Price -->
                        <div>
                            <label for="edit_price" class="block text-sm font-medium text-gray-700">Price</label>
                            <input type="number" step="0.01" name="price" id="edit_price" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <!-- Discount Price -->
                        <div>
                            <label for="edit_discount_price" class="block text-sm font-medium text-gray-700">Discount Price
                                (Optional)</label>
                            <input type="number" step="0.01" name="discount_price" id="edit_discount_price"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <!-- Stock -->
                        <div>
                            <label for="edit_stock" class="block text-sm font-medium text-gray-700">Stock</label>
                            <input type="number" name="stock" id="edit_stock" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <!-- Is Active -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <div class="mt-2">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="is_active" id="edit_is_active" value="1"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                    <span class="ml-2">Active</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mt-6">
                        <label for="edit_description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="edit_description" rows="3"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    </div>

                    <!-- Brands -->
                    <div class="mt-6">
                        <div class="flex justify-between items-center">
                            <label class="block text-sm font-medium text-gray-700">Brands</label>
                            <button type="button" onclick="openModal('brandModal')"
                                class="px-3 py-1 bg-gray-100 text-gray-600 rounded text-sm hover:bg-gray-200">
                                + Add Brand
                            </button>
                        </div>
                        <div class="mt-2 grid grid-cols-2 md:grid-cols-4 gap-2 max-h-32 overflow-y-auto"
                            id="edit_brands_container">
                            @foreach($brands as $brand)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="brands[]" value="{{ $brand->id }}"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                    <span class="ml-2 text-sm">{{ $brand->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Styles -->
                    <div class="mt-6">
                        <div class="flex justify-between items-center">
                            <label class="block text-sm font-medium text-gray-700">Styles</label>
                            <button type="button" onclick="openModal('styleModal')"
                                class="px-3 py-1 bg-gray-100 text-gray-600 rounded text-sm hover:bg-gray-200">
                                + Add Style
                            </button>
                        </div>
                        <div class="mt-2 grid grid-cols-2 md:grid-cols-4 gap-2 max-h-32 overflow-y-auto"
                            id="edit_styles_container">
                            @foreach($styles as $style)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="styles[]" value="{{ $style->id }}"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                    <span class="ml-2 text-sm">{{ $style->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Sizes -->
                    <div class="mt-6">
                        <div class="flex justify-between items-center">
                            <label class="block text-sm font-medium text-gray-700">Sizes</label>
                            <button type="button" onclick="openModal('sizeModal')"
                                class="px-3 py-1 bg-gray-100 text-gray-600 rounded text-sm hover:bg-gray-200">
                                + Add Size
                            </button>
                        </div>
                        <div class="mt-2 grid grid-cols-2 md:grid-cols-4 gap-2 max-h-32 overflow-y-auto"
                            id="edit_sizes_container">
                            @foreach($sizes as $size)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="sizes[]" value="{{ $size->id }}"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                    <span class="ml-2 text-sm">{{ $size->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Colors -->
                    <div class="mt-6">
                        <div class="flex justify-between items-center">
                            <label class="block text-sm font-medium text-gray-700">Colors</label>
                            <button type="button" onclick="openModal('colorModal')"
                                class="px-3 py-1 bg-gray-100 text-gray-600 rounded text-sm hover:bg-gray-200">
                                + Add Color
                            </button>
                        </div>
                        <div class="mt-2 grid grid-cols-2 md:grid-cols-4 gap-2 max-h-32 overflow-y-auto"
                            id="edit_colors_container">
                            @foreach($colors as $color)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="colors[]" value="{{ $color->id }}"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                    <span class="ml-2 text-sm">{{ $color->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="mt-8 flex justify-end space-x-3">
                        <button type="button" onclick="closeModal('editProductModal')"
                            class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition-colors">
                            Cancel
                        </button>
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors">
                            Update Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Include existing modals for creating related entities -->
    <!-- Sub Category Modal -->
    <div id="subCategoryModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Add New Sub Category</h3>
                <form id="subCategoryForm">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Main Category</label>
                        <select name="main_category_id" id="modal_main_category_id" required
                            class="mt-1 block w-full border-gray-300 rounded-md">
                            <option value="">Select Main Category</option>
                            @foreach($mainCategories as $mainCat)
                                <option value="{{ $mainCat->id }}">{{ $mainCat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Category</label>
                        <select name="category_id" id="modal_category_id" required
                            class="mt-1 block w-full border-gray-300 rounded-md">
                            <option value="">Select Category</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" required class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="text" name="slug" required class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeModal('subCategoryModal')"
                            class="px-4 py-2 bg-gray-300 text-gray-800 rounded">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Brand Modal -->
    <div id="brandModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Add New Brand</h3>
                <form id="brandForm">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" required class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="text" name="slug" required class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" class="mt-1 block w-full border-gray-300 rounded-md"></textarea>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeModal('brandModal')"
                            class="px-4 py-2 bg-gray-300 text-gray-800 rounded">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Style Modal -->
    <div id="styleModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Add New Style</h3>
                <form id="styleForm">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" required class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeModal('styleModal')"
                            class="px-4 py-2 bg-gray-300 text-gray-800 rounded">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Size Modal -->
    <div id="sizeModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Add New Size</h3>
                <form id="sizeForm">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" required class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Code</label>
                        <input type="text" name="code" required class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeModal('sizeModal')"
                            class="px-4 py-2 bg-gray-300 text-gray-800 rounded">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Color Modal -->
    <div id="colorModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Add New Color</h3>
                <form id="colorForm">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" required class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Hex Code</label>
                        <input type="text" name="hex_code" required placeholder="#000000"
                            class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeModal('colorModal')"
                            class="px-4 py-2 bg-gray-300 text-gray-800 rounded">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        // Open edit modal and load product data
        function openEditModal(productId) {
            fetch(`/admin/products/${productId}`)
                .then(response => response.json())
                .then(data => {
                    // Populate form fields
                    document.getElementById('edit_name').value = data.name;
                    document.getElementById('edit_sku').value = data.sku;
                    document.getElementById('edit_category_id').value = data.category_id;
                    document.getElementById('edit_price').value = data.price;
                    document.getElementById('edit_discount_price').value = data.discount_price || '';
                    document.getElementById('edit_stock').value = data.stock;
                    document.getElementById('edit_description').value = data.description || '';
                    document.getElementById('edit_is_active').checked = data.is_active;

                    // Set form action
                    document.getElementById('editProductForm').action = `/admin/products/${productId}`;

                    // Handle relationships
                    // Brands
                    const brandCheckboxes = document.querySelectorAll('#edit_brands_container input[type="checkbox"]');
                    brandCheckboxes.forEach(checkbox => {
                        checkbox.checked = data.brands.some(brand => brand.id == checkbox.value);
                    });

                    // Styles
                    const styleCheckboxes = document.querySelectorAll('#edit_styles_container input[type="checkbox"]');
                    styleCheckboxes.forEach(checkbox => {
                        checkbox.checked = data.styles.some(style => style.id == checkbox.value);
                    });

                    // Sizes
                    const sizeCheckboxes = document.querySelectorAll('#edit_sizes_container input[type="checkbox"]');
                    sizeCheckboxes.forEach(checkbox => {
                        checkbox.checked = data.sizes.some(size => size.id == checkbox.value);
                    });

                    // Colors
                    const colorCheckboxes = document.querySelectorAll('#edit_colors_container input[type="checkbox"]');
                    colorCheckboxes.forEach(checkbox => {
                        checkbox.checked = data.colors.some(color => color.id == checkbox.value);
                    });

                    openModal('editProductModal');
                })
                .catch(error => {
                    console.error('Error loading product:', error);
                    alert('Error loading product data');
                });
        }

        // Handle main category change for sub category modal
        document.getElementById('modal_main_category_id')?.addEventListener('change', function () {
            const mainCategoryId = this.value;
            const categorySelect = document.getElementById('modal_category_id');

            if (mainCategoryId) {
                fetch(`/admin/categories-by-main/${mainCategoryId}`)
                    .then(response => response.json())
                    .then(data => {
                        categorySelect.innerHTML = '<option value="">Select Category</option>';
                        data.forEach(category => {
                            categorySelect.innerHTML += `<option value="${category.id}">${category.name}</option>`;
                        });
                    });
            } else {
                categorySelect.innerHTML = '<option value="">Select Category</option>';
            }
        });

        // Handle create product form submission
        document.getElementById('createProductForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('{{ route("admin.products.store") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        closeModal('createProductModal');
                        location.reload(); // Reload to show new product
                    } else {
                        alert('Error creating product');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error creating product');
                });
        });

        // Handle edit product form submission
        document.getElementById('editProductForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const actionUrl = this.action;

            fetch(actionUrl, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        closeModal('editProductModal');
                        location.reload(); // Reload to show updated product
                    } else {
                        alert('Error updating product');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error updating product');
                });
        });

        // Handle form submissions for related entities
        document.getElementById('subCategoryForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('{{ route("admin.products.store-sub-category") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Add to select
                        const select = document.getElementById('modal_category_id');
                        select.innerHTML += `<option value="${data.subCategory.id}">${data.subCategory.name} (${data.subCategory.category.name})</option>`;
                        closeModal('subCategoryModal');
                        alert(data.message);
                    }
                });
        });

        document.getElementById('brandForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('{{ route("admin.products.store-brand") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload(); // Reload to show new brand
                    }
                });
        });

        document.getElementById('styleForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('{{ route("admin.products.store-style") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    }
                });
        });

        document.getElementById('sizeForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('{{ route("admin.products.store-size") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    }
                });
        });

        document.getElementById('colorForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('{{ route("admin.products.store-color") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    }
                });
        });
    </script>
@endsection