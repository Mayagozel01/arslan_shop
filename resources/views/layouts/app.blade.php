<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SHOP.CO | Define Your Style')</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700;900&display=swap');

            body {
                font-family: 'Instrument Sans', sans-serif;
            }

            .glass {
                background: rgba(255, 255, 255, 0.85);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
            }

            .animate-float {
                animation: float 6s ease-in-out infinite;
            }

            .animate-fade-in-up {
                animation: fadeInUp 0.8s ease-out forwards;
                opacity: 0;
                transform: translateY(20px);
            }

            .animation-delay-100 {
                animation-delay: 0.1s;
            }

            .animation-delay-200 {
                animation-delay: 0.2s;
            }

            .animation-delay-300 {
                animation-delay: 0.3s;
            }

            @keyframes float {
                0% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-15px);
                }

                100% {
                    transform: translateY(0px);
                }
            }

            @keyframes fadeInUp {
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        </style>
    @endif

    @stack('styles')
</head>

<body class="bg-white text-slate-900 antialiased selection:bg-black selection:text-white">

    <!-- Top Banner -->
    <div class="bg-black text-white text-center py-2.5 text-xs sm:text-sm font-medium relative z-50">
        Sign up and get 20% off your first order. <a href="{{ route('register') }}"
            class="underline decoration-white/60 hover:decoration-white transition-all ml-1">Sign Up Now</a>
    </div>

    <!-- Navigation -->
    <header class="sticky top-0 z-40 transition-all duration-300 w-full glass border-b border-gray-100">
        <nav class="max-w-7xl mx-auto px-4 md:px-6 py-4 flex items-center justify-between gap-8">
            <div class="flex items-center gap-8 xl:gap-12">
                <a href="{{ route('home') }}"
                    class="text-2xl md:text-3xl font-black tracking-tighter hover:opacity-80 transition-opacity">SHOP.CO</a>
                <ul class="hidden lg:flex gap-6 xl:gap-8 font-medium text-sm text-gray-600">
                    <li><a href="{{ route('home') }}"
                            class="hover:text-black transition-colors relative group py-1">Home<span
                                class="absolute bottom-0 left-0 w-0 h-0.5 bg-black transition-all group-hover:w-full"></span></a>
                    </li>
                    <li><a href="{{ route('products.index') }}"
                            class="hover:text-black transition-colors relative group py-1">Shop<span
                                class="absolute bottom-0 left-0 w-0 h-0.5 bg-black transition-all group-hover:w-full"></span></a>
                    </li>
                    <li><a href="#" class="hover:text-black transition-colors relative group py-1">On Sale<span
                                class="absolute bottom-0 left-0 w-0 h-0.5 bg-black transition-all group-hover:w-full"></span></a>
                    </li>
                    <li><a href="#" class="hover:text-black transition-colors relative group py-1">New Arrivals<span
                                class="absolute bottom-0 left-0 w-0 h-0.5 bg-black transition-all group-hover:w-full"></span></a>
                    </li>
                    <li><a href="#" class="hover:text-black transition-colors relative group py-1">Brands<span
                                class="absolute bottom-0 left-0 w-0 h-0.5 bg-black transition-all group-hover:w-full"></span></a>
                    </li>
                </ul>
            </div>

            <div class="flex-1 max-w-lg hidden lg:block relative group">
                <form method="GET" action="{{ route('products.index') }}" class="flex">
                    <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Search for products..."
                        class="w-full bg-gray-100/50 border-transparent focus:bg-white border focus:border-gray-200 rounded-l-full py-3 pl-12 pr-6 text-sm outline-none transition-all placeholder:text-gray-400">
                    <button type="submit"
                        class="bg-black text-white px-6 rounded-r-full hover:bg-gray-900 transition-colors">Search</button>
                </form>
            </div>

            <div class="flex gap-4 sm:gap-6 items-center">
                <button class="hover:scale-110 transition-transform"><svg class="w-6 h-6" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg></button>
                <button class="hover:scale-110 transition-transform"><svg class="w-6 h-6" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg></button>
                @auth
                    <a href="{{ route('pokupatel.dashboard') }}" class="hover:scale-110 transition-transform"><svg
                            class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg></a>
                @else
                    <a href="{{ route('login') }}" class="hover:scale-110 transition-transform"><svg class="w-6 h-6"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg></a>
                @endauth
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#F0F0F0] pt-20 pb-10 mt-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-12">
                <div class="col-span-2 md:col-span-1">
                    <h1 class="text-3xl font-black mb-6 tracking-tighter">SHOP.CO</h1>
                    <p class="text-gray-500 text-sm mb-6 leading-relaxed">We have clothes that suits your style and
                        which you're proud to wear. From women to men.</p>
                    <div class="flex gap-4">
                        <a href="#"
                            class="w-9 h-9 bg-white border border-gray-200 rounded-full flex items-center justify-center hover:bg-black hover:text-white hover:border-black transition-all">𝕏</a>
                        <a href="#"
                            class="w-9 h-9 bg-black text-white border border-black rounded-full flex items-center justify-center hover:bg-white hover:text-black transition-all">f</a>
                        <a href="#"
                            class="w-9 h-9 bg-white border border-gray-200 rounded-full flex items-center justify-center hover:bg-black hover:text-white hover:border-black transition-all">ig</a>
                        <a href="#"
                            class="w-9 h-9 bg-white border border-gray-200 rounded-full flex items-center justify-center hover:bg-black hover:text-white hover:border-black transition-all">in</a>
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

            <div
                class="mt-16 pt-8 border-t border-gray-200 flex flex-col md:flex-row justify-between items-center gap-4 text-gray-500 text-sm">
                <p>Shop.co © 2000-2023, All Rights Reserved</p>
                <div class="flex gap-3">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/2560px-Visa_Inc._logo.svg.png"
                        class="h-8 bg-white px-2 py-1 rounded border object-contain w-14" alt="Visa">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Mastercard-logo.svg/1280px-Mastercard-logo.svg.png"
                        class="h-8 bg-white px-2 py-1 rounded border object-contain w-14" alt="Mastercard">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg"
                        class="h-8 bg-white px-2 py-1 rounded border object-contain w-14" alt="Paypal">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f2/Google_Pay_Logo.svg/2560px-Google_Pay_Logo.svg.png"
                        class="h-8 bg-white px-2 py-1 rounded border object-contain w-14" alt="GPay">
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>

</html>