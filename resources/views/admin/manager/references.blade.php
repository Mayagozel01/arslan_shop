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
                      <button onclick="switchTab('styles')" id="tab-btn-styles"
                    class="tab-btn w-full sm:w-auto px-6 py-4 text-sm font-medium transition-all duration-200 ease-in-out flex items-center
                     justify-center gap-2 min-w-[120px] focus:outline-none ">
 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
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
                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        + Add Category
                    </button>
                </div>
                <div class="border-2 border-dashed border-gray-200 rounded-lg p-12 text-center text-gray-400">
                    <p>Manage your category tree and hierarchy here.</p>
                </div>
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
                                                View {{ $brand->products_count }} {{ Str::plural('product', $brand->products_count) }}
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
                        + Add Category
                    </button>
                </div>
                <div class="border-2 border-dashed border-gray-200 rounded-lg p-12 text-center text-gray-400">
                    <p>Manage your category tree and hierarchy here.</p>
                </div>
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
                <div class="border-2 border-dashed border-gray-200 rounded-lg p-12 text-center text-gray-400">
                    <p>Color management settings will appear here.</p>
                </div>
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
                <div class="border-2 border-dashed border-gray-200 rounded-lg p-12 text-center text-gray-400">
                    <p>Size charts and management will appear here.</p>
                </div>
            </div>

       

        </div>
    </div>

    @push('scripts')
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
        </script>
    @endpush
@endsection