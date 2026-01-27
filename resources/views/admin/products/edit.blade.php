@extends('admin.layouts.app')

@section('header', 'Edit Product')
@section('subheader', 'Update product information')

@section('content')
    <div class="px-4 py-6">
        <div class="max-w-4xl mx-auto">
            <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="bg-white shadow rounded-lg p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- SKU -->
                        <div>
                            <label for="sku" class="block text-sm font-medium text-gray-700">SKU</label>
                            <input type="text" name="sku" id="sku" value="{{ old('sku', $product->sku) }}" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @error('sku') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- Sub Category -->
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Sub Category</label>
                            <div class="flex gap-2">
                                <select name="category_id" id="category_id" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="">Select Sub Category</option>
                                    @foreach($subCategories as $subCat)
                                        <option value="{{ $subCat->id }}" {{ old('category_id', $product->category_id) == $subCat->id ? 'selected' : '' }}>
                                            {{ $subCat->name }} ({{ $subCat->category->name }})
                                        </option>
                                    @endforeach
                                </select>
                                <button type="button" onclick="openModal('subCategoryModal')"
                                    class="mt-1 px-3 py-2 bg-gray-100 text-gray-600 rounded-md hover:bg-gray-200">
                                    +
                                </button>
                            </div>
                            @error('category_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- Price -->
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                            <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price) }}" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @error('price') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- Discount Price -->
                        <div>
                            <label for="discount_price" class="block text-sm font-medium text-gray-700">Discount Price (Optional)</label>
                            <input type="number" step="0.01" name="discount_price" id="discount_price" value="{{ old('discount_price', $product->discount_price) }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @error('discount_price') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- Stock -->
                        <div>
                            <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                            <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @error('stock') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- Is Active -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <div class="mt-2">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                    <span class="ml-2">Active</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mt-6">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $product->description) }}</textarea>
                        @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
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
                        <div class="mt-2 grid grid-cols-2 md:grid-cols-4 gap-2">
                            @foreach($brands as $brand)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="brands[]" value="{{ $brand->id }}"
                                           {{ $product->brands->contains($brand->id) ? 'checked' : '' }}
                                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                    <span class="ml-2">{{ $brand->name }}</span>
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
                        <div class="mt-2 grid grid-cols-2 md:grid-cols-4 gap-2">
                            @foreach($styles as $style)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="styles[]" value="{{ $style->id }}"
                                           {{ $product->styles->contains($style->id) ? 'checked' : '' }}
                                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                    <span class="ml-2">{{ $style->name }}</span>
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
                        <div class="mt-2 grid grid-cols-2 md:grid-cols-4 gap-2">
                            @foreach($sizes as $size)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="sizes[]" value="{{ $size->id }}"
                                           {{ $product->sizes->contains($size->id) ? 'checked' : '' }}
                                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                    <span class="ml-2">{{ $size->name }}</span>
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
                        <div class="mt-2 grid grid-cols-2 md:grid-cols-4 gap-2">
                            @foreach($colors as $color)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="colors[]" value="{{ $color->id }}"
                                           {{ $product->colors->contains($color->id) ? 'checked' : '' }}
                                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                    <span class="ml-2">{{ $color->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="mt-8 flex justify-end space-x-3">
                        <a href="{{ route('admin.products.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition-colors">
                            Cancel
                        </a>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors">
                            Update Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modals (same as create) -->
    <!-- Sub Category Modal -->
    <div id="subCategoryModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Add New Sub Category</h3>
                <form id="subCategoryForm">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Main Category</label>
                        <select name="main_category_id" id="modal_main_category_id" required class="mt-1 block w-full border-gray-300 rounded-md">
                            <option value="">Select Main Category</option>
                            @foreach($mainCategories as $mainCat)
                                <option value="{{ $mainCat->id }}">{{ $mainCat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Category</label>
                        <select name="category_id" id="modal_category_id" required class="mt-1 block w-full border-gray-300 rounded-md">
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
                        <button type="button" onclick="closeModal('subCategoryModal')" class="px-4 py-2 bg-gray-300 text-gray-800 rounded">Cancel</button>
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
                        <button type="button" onclick="closeModal('brandModal')" class="px-4 py-2 bg-gray-300 text-gray-800 rounded">Cancel</button>
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
                        <button type="button" onclick="closeModal('styleModal')" class="px-4 py-2 bg-gray-300 text-gray-800 rounded">Cancel</button>
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
                        <button type="button" onclick="closeModal('sizeModal')" class="px-4 py-2 bg-gray-300 text-gray-800 rounded">Cancel</button>
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
                        <input type="text" name="hex_code" required placeholder="#000000" class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeModal('colorModal')" class="px-4 py-2 bg-gray-300 text-gray-800 rounded">Cancel</button>
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

        // Handle main category change for sub category modal
        document.getElementById('modal_main_category_id').addEventListener('change', function() {
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

        // Handle form submissions
        document.getElementById('subCategoryForm').addEventListener('submit', function(e) {
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
                    const select = document.getElementById('category_id');
                    select.innerHTML += `<option value="${data.subCategory.id}">${data.subCategory.name} (${data.subCategory.category.name})</option>`;
                    closeModal('subCategoryModal');
                    alert(data.message);
                }
            });
        });

        document.getElementById('brandForm').addEventListener('submit', function(e) {
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

        // Similar for other forms
        document.getElementById('styleForm').addEventListener('submit', function(e) {
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

        document.getElementById('sizeForm').addEventListener('submit', function(e) {
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

        document.getElementById('colorForm').addEventListener('submit', function(e) {
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