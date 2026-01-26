<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP.CO | Define Your Style</title>
    
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700;900&display=swap');
            body { font-family: 'Instrument Sans', sans-serif; }
            .glass { background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); }
            .animate-float { animation: float 6s ease-in-out infinite; }
            .animate-fade-in-up { animation: fadeInUp 0.8s ease-out forwards; opacity: 0; transform: translateY(20px); }
            .animation-delay-100 { animation-delay: 0.1s; }
            .animation-delay-200 { animation-delay: 0.2s; }
            .animation-delay-300 { animation-delay: 0.3s; }
            @keyframes float { 0% { transform: translateY(0px); } 50% { transform: translateY(-15px); } 100% { transform: translateY(0px); } }
            @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }
        </style>
    @endif
</head>
<body class="bg-white text-slate-900 antialiased selection:bg-black selection:text-white">

    <!-- Top Banner -->
    <div class="bg-black text-white text-center py-2.5 text-xs sm:text-sm font-medium relative z-50">
        Sign up and get 20% off your first order. <a href="{{ route('register') }}" class="underline decoration-white/60 hover:decoration-white transition-all ml-1">Sign Up Now</a>
    </div>

    <!-- Navigation -->
    <header class="sticky top-0 z-40 transition-all duration-300 w-full glass border-b border-gray-100">
        <nav class="max-w-7xl mx-auto px-4 md:px-6 py-4 flex items-center justify-between gap-8">
            <div class="flex items-center gap-8 xl:gap-12">
                <a href="#" class="text-2xl md:text-3xl font-black tracking-tighter hover:opacity-80 transition-opacity">SHOP.CO</a>
                <ul class="hidden lg:flex gap-6 xl:gap-8 font-medium text-sm text-gray-600">
                    <li><a href="#" class="hover:text-black transition-colors relative group py-1">Shop<span class="absolute bottom-0 left-0 w-0 h-0.5 bg-black transition-all group-hover:w-full"></span></a></li>
                    <li><a href="#" class="hover:text-black transition-colors relative group py-1">On Sale<span class="absolute bottom-0 left-0 w-0 h-0.5 bg-black transition-all group-hover:w-full"></span></a></li>
                    <li><a href="#" class="hover:text-black transition-colors relative group py-1">New Arrivals<span class="absolute bottom-0 left-0 w-0 h-0.5 bg-black transition-all group-hover:w-full"></span></a></li>
                    <li><a href="#" class="hover:text-black transition-colors relative group py-1">Brands<span class="absolute bottom-0 left-0 w-0 h-0.5 bg-black transition-all group-hover:w-full"></span></a></li>
                </ul>
            </div>
            
            <div class="flex-1 max-w-lg hidden lg:block relative group">
                <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400 group-focus-within:text-black transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" placeholder="Search for products..." class="w-full bg-gray-100/50 border-transparent focus:bg-white border focus:border-gray-200 rounded-full py-3 pl-12 pr-6 text-sm outline-none transition-all placeholder:text-gray-400">
            </div>

            <div class="flex gap-4 sm:gap-6 items-center">
                <button class="hover:scale-110 transition-transform"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></button>
                <button class="hover:scale-110 transition-transform"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg></button>
                @auth
                    <a href="{{ route('pokupatel.dashboard') }}" class="hover:scale-110 transition-transform"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg></a>
                @else
                    <a href="{{ route('login') }}" class="hover:scale-110 transition-transform"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg></a>
                @endauth
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="bg-[#F2F0F1] relative overflow-hidden">
        <!-- Decorative Background Elements -->
        <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-gray-100 to-transparent opacity-60 pointer-events-none"></div>
        <div class="absolute -top-20 -right-20 w-96 h-96 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute top-40 left-0 w-72 h-72 bg-yellow-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse animation-delay-700"></div>

        <div class="max-w-7xl mx-auto px-4 pt-12 md:pt-24 lg:pt-28 pb-0 flex flex-col lg:flex-row items-center relative z-10">
            <div class="lg:w-1/2 lg:pr-12 text-center lg:text-left">
                <h1 class="text-5xl md:text-7xl lg:text-[5.5rem] font-black leading-[0.9] tracking-tighter mb-6 animate-fade-in-up">
                    FIND CLOTHES <br class="hidden lg:block"/>
                    THAT MATCHES <br class="hidden lg:block"/>
                    YOUR <span class="relative inline-block">STYLE<svg class="absolute w-full h-3 -bottom-0 left-0 text-black/10 -z-10" viewBox="0 0 100 10" preserveAspectRatio="none"><path d="M0 5 Q 50 10 100 5 L 100 10 L 0 10 Z" fill="currentColor"/></svg></span>
                </h1>
                <p class="text-gray-600 mb-8 max-w-lg mx-auto lg:mx-0 text-base md:text-lg animate-fade-in-up animation-delay-100">
                    Browse through our diverse range of meticulously crafted garments, designed to bring out your individuality and cater to your sense of style.
                </p>
                <div class="animate-fade-in-up animation-delay-200">
                    <button class="bg-black text-white px-16 py-4 rounded-full font-bold text-lg hover:bg-gray-900 hover:scale-105 active:scale-95 transition-all shadow-xl hover:shadow-black/20">
                        Shop Now
                    </button>
                </div>
                
                <div class="flex justify-center lg:justify-start gap-8 md:gap-12 mt-12 flex-wrap animate-fade-in-up animation-delay-300">
                    <div>
                        <span class="text-3xl md:text-4xl font-bold block mb-1">200+</span>
                        <p class="text-gray-500 text-xs md:text-sm">International Brands</p>
                    </div>
                    <div class="w-px bg-gray-300 h-12 hidden md:block"></div>
                    <div>
                        <span class="text-3xl md:text-4xl font-bold block mb-1">2,000+</span>
                        <p class="text-gray-500 text-xs md:text-sm">High-Quality Products</p>
                    </div>
                    <div class="w-px bg-gray-300 h-12 hidden md:block"></div>
                    <div>
                        <span class="text-3xl md:text-4xl font-bold block mb-1">30,000+</span>
                        <p class="text-gray-500 text-xs md:text-sm">Happy Customers</p>
                    </div>
                </div>
            </div>
            
            <div class="lg:w-1/2 mt-12 lg:mt-0 relative flex justify-center">
                <!-- Main Star Vector (Decorative) -->
                <div class="absolute top-10 right-4 md:right-10 text-4xl animate-spin-slow opacity-80">✨</div>
                <div class="absolute top-1/2 left-4 md:left-10 text-3xl animate-spin-slow animation-delay-500 opacity-80">✨</div>
                                
                <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?q=80&w=800&auto=format&fit=crop" alt="Fashion Models" class="w-full max-w-[500px] lg:max-w-full object-cover relative z-10 animate-float drop-shadow-2xl rounded-2xl">
            </div>
        </div>
        
        <!-- Brands Scrolling Banner -->
        <div class="bg-black py-10 overflow-hidden relative z-20">
            <div class="max-w-7xl mx-auto px-4 flex flex-wrap justify-between items-center gap-10 md:gap-20 grayscale invert opacity-70 hover:opacity-100 transition-opacity duration-500">
                <span class="text-2xl md:text-3xl font-serif tracking-widest">VERSACE</span>
                <span class="text-2xl md:text-3xl font-serif tracking-widest">ZARA</span>
                <span class="text-2xl md:text-3xl font-serif tracking-widest">GUCCI</span>
                <span class="text-2xl md:text-3xl font-serif tracking-widest">PRADA</span>
                <span class="text-2xl md:text-3xl font-serif tracking-widest">Calvin Klein</span>
            </div>
        </div>
    </section>

    <!-- New Arrivals Section -->
    <section class="max-w-7xl mx-auto px-4 py-20 border-b">
        <h3 class="text-4xl md:text-5xl font-black text-center mb-16 uppercase tracking-tighter">New Arrivals</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 lg:gap-8 hover-group-container">
            <!-- Product Card 1 -->
            <div class="group cursor-pointer">
                <div class="bg-[#F0EEED] rounded-[20px] p-0 mb-4 overflow-hidden relative aspect-[1/1.1]">
                    <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?q=80&w=600&auto=format&fit=crop" alt="Product" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-in-out">
                    <button class="absolute bottom-4 right-4 bg-white p-3 rounded-full shadow-lg translate-y-20 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300 z-10 hover:bg-black hover:text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </button>
                </div>
                <h4 class="font-bold text-lg mb-1 group-hover:text-gray-600 transition-colors">T-Shirt with Tape Details</h4>
                <div class="flex items-center gap-2 mb-2">
                    <div class="flex text-yellow-400 text-sm">★★★★☆</div>
                    <span class="text-gray-500 text-sm">4.5/5</span>
                </div>
                <span class="text-2xl font-bold">$120</span>
            </div>

            <!-- Product Card 2 -->
             <div class="group cursor-pointer">
                <div class="bg-[#F0EEED] rounded-[20px] p-0 mb-4 overflow-hidden relative aspect-[1/1.1]">
                    <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?q=80&w=600&auto=format&fit=crop" alt="Product" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-in-out">
                </div>
                <h4 class="font-bold text-lg mb-1 group-hover:text-gray-600 transition-colors">Skinny Fit Jeans</h4>
                <div class="flex items-center gap-2 mb-2">
                    <div class="flex text-yellow-400 text-sm">★★★★☆</div>
                    <span class="text-gray-500 text-sm">3.5/5</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-2xl font-bold">$240</span>
                    <span class="text-gray-400 font-bold line-through text-lg">$260</span>
                    <span class="bg-red-100 text-[#FF3333] text-xs font-medium px-3 py-1 rounded-full">-20%</span>
                </div>
            </div>

            <!-- Product Card 3 -->
             <div class="group cursor-pointer">
                <div class="bg-[#F0EEED] rounded-[20px] p-0 mb-4 overflow-hidden relative aspect-[1/1.1]">
                    <img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?q=80&w=600&auto=format&fit=crop" alt="Product" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-in-out">
                </div>
                <h4 class="font-bold text-lg mb-1 group-hover:text-gray-600 transition-colors">Checkered Shirt</h4>
                <div class="flex items-center gap-2 mb-2">
                    <div class="flex text-yellow-400 text-sm">★★★★☆</div>
                    <span class="text-gray-500 text-sm">4.5/5</span>
                </div>
                <span class="text-2xl font-bold">$180</span>
            </div>

            <!-- Product Card 4 -->
             <div class="group cursor-pointer">
                <div class="bg-[#F0EEED] rounded-[20px] p-0 mb-4 overflow-hidden relative aspect-[1/1.1]">
                    <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?q=80&w=600&auto=format&fit=crop" alt="Product" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-in-out">
                </div>
                <h4 class="font-bold text-lg mb-1 group-hover:text-gray-600 transition-colors">Sleeve Striped T-shirt</h4>
                <div class="flex items-center gap-2 mb-2">
                    <div class="flex text-yellow-400 text-sm">★★★★☆</div>
                    <span class="text-gray-500 text-sm">4.5/5</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-2xl font-bold">$130</span>
                    <span class="text-gray-400 font-bold line-through text-lg">$160</span>
                    <span class="bg-red-100 text-[#FF3333] text-xs font-medium px-3 py-1 rounded-full">-30%</span>
                </div>
            </div>
        </div>
        <div class="text-center mt-12">
            <button class="border border-gray-300 px-16 py-3.5 rounded-full font-medium hover:bg-black hover:text-white hover:border-black transition-colors duration-300">View All</button>
        </div>
    </section>

    <!-- Top Selling Section -->
    <section class="max-w-7xl mx-auto px-4 py-20">
        <h3 class="text-4xl md:text-5xl font-black text-center mb-16 uppercase tracking-tighter">Top Selling</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 lg:gap-8">
             <!-- Product Card -->
            <div class="group cursor-pointer">
                <div class="bg-[#F0EEED] rounded-[20px] p-0 mb-4 overflow-hidden relative aspect-[1/1.1]">
                    <img src="https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?q=80&w=600&auto=format&fit=crop" alt="Product" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-in-out">
                </div>
                <h4 class="font-bold text-lg mb-1 group-hover:text-gray-600 transition-colors">Vertical Striped Shirt</h4>
                <div class="flex items-center gap-2 mb-2">
                    <div class="flex text-yellow-400 text-sm">★★★★★</div>
                    <span class="text-gray-500 text-sm">5.0/5</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-2xl font-bold">$212</span>
                    <span class="text-gray-400 font-bold line-through text-lg">$232</span>
                    <span class="bg-red-100 text-[#FF3333] text-xs font-medium px-3 py-1 rounded-full">-20%</span>
                </div>
            </div>
             <!-- Product Card -->
            <div class="group cursor-pointer">
                <div class="bg-[#F0EEED] rounded-[20px] p-0 mb-4 overflow-hidden relative aspect-[1/1.1]">
                    <img src="https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?q=80&w=600&auto=format&fit=crop" alt="Product" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-in-out">
                </div>
                <h4 class="font-bold text-lg mb-1 group-hover:text-gray-600 transition-colors">Courage Grapic T-shirt</h4>
                <div class="flex items-center gap-2 mb-2">
                    <div class="flex text-yellow-400 text-sm">★★★★☆</div>
                    <span class="text-gray-500 text-sm">4.0/5</span>
                </div>
                <span class="text-2xl font-bold">$145</span>
            </div>
             <!-- Product Card -->
            <div class="group cursor-pointer">
                <div class="bg-[#F0EEED] rounded-[20px] p-0 mb-4 overflow-hidden relative aspect-[1/1.1]">
                    <img src="https://images.unsplash.com/photo-1591195853828-11db59a44f6b?q=80&w=600&auto=format&fit=crop" alt="Product" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-in-out">
                </div>
                <h4 class="font-bold text-lg mb-1 group-hover:text-gray-600 transition-colors">Loose Fit Bermuda Shorts</h4>
                <div class="flex items-center gap-2 mb-2">
                    <div class="flex text-yellow-400 text-sm">★★★☆☆</div>
                    <span class="text-gray-500 text-sm">3.0/5</span>
                </div>
                <span class="text-2xl font-bold">$80</span>
            </div>
             <!-- Product Card -->
            <div class="group cursor-pointer">
                <div class="bg-[#F0EEED] rounded-[20px] p-0 mb-4 overflow-hidden relative aspect-[1/1.1]">
                    <img src="https://images.unsplash.com/photo-1542272454315-4c01d7abdf4a?q=80&w=600&auto=format&fit=crop" alt="Product" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-in-out">
                </div>
                <h4 class="font-bold text-lg mb-1 group-hover:text-gray-600 transition-colors">Faded Skinny Jeans</h4>
                <div class="flex items-center gap-2 mb-2">
                    <div class="flex text-yellow-400 text-sm">★★★★☆</div>
                    <span class="text-gray-500 text-sm">4.5/5</span>
                </div>
                <span class="text-2xl font-bold">$210</span>
            </div>
        </div>
        <div class="text-center mt-12">
            <button class="border border-gray-300 px-16 py-3.5 rounded-full font-medium hover:bg-black hover:text-white hover:border-black transition-colors duration-300">View All</button>
        </div>
    </section>

    <!-- Browse by Dress Style -->
    <section class="max-w-7xl mx-auto px-4 py-8">
        <div class="bg-[#F0F0F0] rounded-[40px] px-6 py-10 md:p-16">
            <h3 class="text-4xl md:text-5xl font-black text-center mb-16 uppercase tracking-tighter">Browse by Dress Style</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-[20px] p-6 h-72 relative overflow-hidden group cursor-pointer shadow-sm hover:shadow-md transition-shadow">
                    <span class="text-3xl font-bold relative z-10">Casual</span>
                    <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=800&auto=format&fit=crop" class="absolute right-0 top-0 h-full w-full object-cover object-top opacity-90 group-hover:scale-105 transition-transform duration-700">
                </div>
                <div class="bg-white rounded-[20px] p-6 h-72 relative overflow-hidden md:col-span-2 group cursor-pointer shadow-sm hover:shadow-md transition-shadow">
                    <span class="text-3xl font-bold relative z-10">Formal</span>
                    <img src="https://images.unsplash.com/photo-1594938298603-c8148c472f81?q=80&w=800&auto=format&fit=crop" class="absolute right-0 top-0 h-full w-full object-cover object-top opacity-90 group-hover:scale-105 transition-transform duration-700">
                </div>
                <div class="bg-white rounded-[20px] p-6 h-72 relative overflow-hidden md:col-span-2 group cursor-pointer shadow-sm hover:shadow-md transition-shadow">
                    <span class="text-3xl font-bold relative z-10">Party</span>
                    <img src="https://images.unsplash.com/photo-1566737236500-c8ac43014a67?q=80&w=800&auto=format&fit=crop" class="absolute right-0 top-0 h-full w-full object-cover object-top opacity-90 group-hover:scale-105 transition-transform duration-700">
                </div>
                <div class="bg-white rounded-[20px] p-6 h-72 relative overflow-hidden group cursor-pointer shadow-sm hover:shadow-md transition-shadow">
                    <span class="text-3xl font-bold relative z-10">Gym</span>
                    <img src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438?q=80&w=800&auto=format&fit=crop" class="absolute right-0 top-0 h-full w-full object-cover object-top opacity-90 group-hover:scale-105 transition-transform duration-700">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer with Floating Newsletter -->
    <footer class="bg-[#F0F0F0] pt-48 pb-10 relative mt-40">
        <!-- Floating Newsletter Box -->
        <div class="max-w-7xl mx-auto px-4 absolute -top-28 left-0 right-0">
            <div class="bg-black rounded-[20px] px-6 py-10 md:px-16 md:py-12 flex flex-col lg:flex-row justify-between items-center gap-8 shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-gray-800 rounded-full mix-blend-overlay filter blur-3xl opacity-20 pointer-events-none"></div>
                <h4 class="text-white text-3xl md:text-4xl font-black leading-none max-w-lg uppercase z-10 text-center lg:text-left">STAY UP TO DATE ABOUT OUR LATEST OFFERS</h4>
                <div class="w-full max-w-sm flex flex-col gap-4 z-10">
                    <div class="relative">
                         <span class="absolute left-4 top-3 text-gray-400">✉️</span>
                        <input type="email" placeholder="Enter your email address" class="w-full rounded-full py-3 pl-12 pr-6 outline-none text-gray-800 focus:ring-2 focus:ring-gray-500 transition-shadow">
                    </div>
                    <button class="bg-white text-black font-bold py-3 rounded-full hover:bg-gray-200 transition-colors shadow-lg">Subscribe to Newsletter</button>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 grid grid-cols-2 md:grid-cols-5 gap-12 pt-8">
            <div class="col-span-2 md:col-span-1">
                <h1 class="text-3xl font-black mb-6 tracking-tighter">SHOP.CO</h1>
                <p class="text-gray-500 text-sm mb-6 leading-relaxed">We have clothes that suits your style and which you're proud to wear. From women to men.</p>
                <div class="flex gap-4">
                    <a href="#" class="w-9 h-9 bg-white border border-gray-200 rounded-full flex items-center justify-center hover:bg-black hover:text-white hover:border-black transition-all">𝕏</a>
                    <a href="#" class="w-9 h-9 bg-black text-white border border-black rounded-full flex items-center justify-center hover:bg-white hover:text-black transition-all">f</a>
                    <a href="#" class="w-9 h-9 bg-white border border-gray-200 rounded-full flex items-center justify-center hover:bg-black hover:text-white hover:border-black transition-all">ig</a>
                    <a href="#" class="w-9 h-9 bg-white border border-gray-200 rounded-full flex items-center justify-center hover:bg-black hover:text-white hover:border-black transition-all">in</a>
                </div>
            </div>
            <div>
                <h5 class="font-bold mb-6 tracking-widest uppercase text-sm">Company</h5>
                <ul class="text-gray-500 space-y-4 text-sm font-medium">
                    <li><a href="#" class="hover:text-black transition-colors">About</a></li>
                    <li><a href="#" class="hover:text-black transition-colors">Features</a></li>
                    <li><a href="#" class="hover:text-black transition-colors">Works</a></li>
                    <li><a href="#" class="hover:text-black transition-colors">Career</a></li>
                </ul>
            </div>
            <div>
                <h5 class="font-bold mb-6 tracking-widest uppercase text-sm">Help</h5>
                <ul class="text-gray-500 space-y-4 text-sm font-medium">
                    <li><a href="#" class="hover:text-black transition-colors">Customer Support</a></li>
                    <li><a href="#" class="hover:text-black transition-colors">Delivery Details</a></li>
                    <li><a href="#" class="hover:text-black transition-colors">Terms & Conditions</a></li>
                    <li><a href="#" class="hover:text-black transition-colors">Privacy Policy</a></li>
                </ul>
            </div>
             <div>
                <h5 class="font-bold mb-6 tracking-widest uppercase text-sm">FAQ</h5>
                <ul class="text-gray-500 space-y-4 text-sm font-medium">
                    <li><a href="#" class="hover:text-black transition-colors">Account</a></li>
                    <li><a href="#" class="hover:text-black transition-colors">Manage Deliveries</a></li>
                    <li><a href="#" class="hover:text-black transition-colors">Orders</a></li>
                    <li><a href="#" class="hover:text-black transition-colors">Payments</a></li>
                </ul>
            </div>
             <div>
                <h5 class="font-bold mb-6 tracking-widest uppercase text-sm">Resources</h5>
                <ul class="text-gray-500 space-y-4 text-sm font-medium">
                    <li><a href="#" class="hover:text-black transition-colors">Free eBooks</a></li>
                    <li><a href="#" class="hover:text-black transition-colors">Development Tutorial</a></li>
                    <li><a href="#" class="hover:text-black transition-colors">How to - Blog</a></li>
                    <li><a href="#" class="hover:text-black transition-colors">Youtube Playlist</a></li>
                </ul>
            </div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 mt-16 pt-8 border-t border-gray-200 flex flex-col md:flex-row justify-between items-center gap-4 text-gray-500 text-sm">
            <p>Shop.co © 2000-2023, All Rights Reserved</p>
            <div class="flex gap-3">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/2560px-Visa_Inc._logo.svg.png" class="h-8 bg-white px-2 py-1 rounded border object-contain w-14" alt="Visa">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Mastercard-logo.svg/1280px-Mastercard-logo.svg.png" class="h-8 bg-white px-2 py-1 rounded border object-contain w-14" alt="Mastercard">
                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" class="h-8 bg-white px-2 py-1 rounded border object-contain w-14" alt="Paypal">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f2/Google_Pay_Logo.svg/2560px-Google_Pay_Logo.svg.png" class="h-8 bg-white px-2 py-1 rounded border object-contain w-14" alt="GPay">
            </div>
        </div>
    </footer>

</body>
</html>