<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | SHOP.CO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700;900&display=swap');
        body { font-family: 'Instrument Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#F0F0F0] flex items-center justify-center min-h-screen">

    <div class="bg-white rounded-[20px] p-8 md:p-12 shadow-xl w-full max-w-lg">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-black tracking-tighter mb-2">SHOP.CO</h1>
            <h2 class="text-2xl font-bold">Create an Account</h2>
        </div>

        <form action="{{ route('register.submit') }}" method="POST" class="space-y-4">
            @csrf

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                    <input type="text" name="first_name" id="first_name" required 
                        class="w-full bg-gray-100 rounded-full px-4 py-3 outline-none focus:ring-2 focus:ring-black transition"
                        placeholder="John" value="{{ old('first_name') }}">
                    @error('first_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                    <input type="text" name="last_name" id="last_name" required 
                        class="w-full bg-gray-100 rounded-full px-4 py-3 outline-none focus:ring-2 focus:ring-black transition"
                        placeholder="Doe" value="{{ old('last_name') }}">
                    @error('last_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" name="email" id="email" required 
                    class="w-full bg-gray-100 rounded-full px-4 py-3 outline-none focus:ring-2 focus:ring-black transition"
                    placeholder="john@example.com" value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                 <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone (Optional)</label>
                    <input type="text" name="phone" id="phone" 
                        class="w-full bg-gray-100 rounded-full px-4 py-3 outline-none focus:ring-2 focus:ring-black transition"
                        placeholder="+1 234 567 890" value="{{ old('phone') }}">
                </div>
                 <div>
                     <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address (Optional)</label>
                    <input type="text" name="address" id="address" 
                        class="w-full bg-gray-100 rounded-full px-4 py-3 outline-none focus:ring-2 focus:ring-black transition"
                        placeholder="City, Street" value="{{ old('address') }}">
                </div>
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

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required 
                    class="w-full bg-gray-100 rounded-full px-4 py-3 outline-none focus:ring-2 focus:ring-black transition"
                    placeholder="••••••••">
            </div>

            <button type="submit" class="w-full bg-black text-white font-bold py-4 rounded-full hover:bg-gray-800 transition shadow-lg mt-6">
                Create Account
            </button>
        </form>

        <div class="text-center mt-6 text-sm text-gray-500">
            Already have an account? <a href="{{ route('login') }}" class="text-black font-medium underline">Log in</a>
        </div>
    </div>

</body>
</html>
