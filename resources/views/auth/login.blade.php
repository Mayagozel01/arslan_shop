<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SHOP.CO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700;900&display=swap');

        body {
            font-family: 'Instrument Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-[#F0F0F0] flex items-center justify-center min-h-screen">

    <div class="bg-white rounded-[20px] p-8 md:p-12 shadow-xl w-full max-w-md">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-black tracking-tighter mb-2">SHOP.CO</h1>
            <h2 class="text-2xl font-bold">Welcome Back</h2>
        </div>

        <form action="{{ route('admin.dashboard.login') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" name="email" id="email" required
                    class="w-full bg-gray-100 rounded-full px-4 py-3 outline-none focus:ring-2 focus:ring-black transition"
                    placeholder="john@example.com" value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full bg-gray-100 rounded-full px-4 py-3 outline-none focus:ring-2 focus:ring-black transition"
                    placeholder="••••••••">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-black text-white font-bold py-4 rounded-full hover:bg-gray-800 transition shadow-lg mt-6">
                Log In
            </button>
        </form>

        <div class="text-center mt-6 text-sm text-gray-500">
            Don't have an account? <a href="{{ route('register') }}" class="text-black font-medium underline">Sign
                up</a>
        </div>
    </div>

</body>

</html>