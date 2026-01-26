<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | SHOP.CO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700;900&display=swap');
        body { font-family: 'Instrument Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#F0F0F0]">

    <nav class="bg-white border-b sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="/" class="text-3xl font-black tracking-tighter">SHOP.CO</a>
            <div class="flex items-center gap-4">
                <span class="font-medium">Hello, {{ $user->first_name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-gray-100 hover:bg-gray-200 text-black px-4 py-2 rounded-full font-medium transition">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold mb-8">My Account</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Profile Card -->
            <div class="bg-white p-6 rounded-[20px] shadow-sm">
                <h2 class="text-xl font-bold mb-4">Profile Information</h2>
                <div class="space-y-2 text-gray-600">
                    <p><span class="font-medium text-black">Name:</span> {{ $user->first_name }} {{ $user->last_name }}</p>
                    <p><span class="font-medium text-black">Email:</span> {{ $user->email }}</p>
                    <p><span class="font-medium text-black">Phone:</span> {{ $user->phone ?? 'Not provided' }}</p>
                    <p><span class="font-medium text-black">Address:</span> {{ $user->address ?? 'Not provided' }}</p>
                </div>
                <button class="mt-6 border border-gray-300 w-full py-2 rounded-full font-medium hover:bg-black hover:text-white transition">Edit Profile</button>
            </div>

            <!-- Orders Card placeholder -->
            <div class="bg-white p-6 rounded-[20px] shadow-sm">
                <h2 class="text-xl font-bold mb-4">Recent Orders</h2>
                <p class="text-gray-500">You haven't placed any orders yet.</p>
                <button class="mt-6 border border-gray-300 w-full py-2 rounded-full font-medium hover:bg-black hover:text-white transition">Start Shopping</button>
            </div>

            <!-- Wishlist Card placeholder -->
            <div class="bg-white p-6 rounded-[20px] shadow-sm">
                <h2 class="text-xl font-bold mb-4">Wishlist</h2>
                <p class="text-gray-500">Your wishlist is empty.</p>
            </div>
        </div>
    </div>

</body>
</html>
