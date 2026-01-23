<nav class="mt-5 flex-1 px-2 bg-white space-y-1">
    <ul class="space-y-1">
        <li>
            <a href="{{ route('admin.dashboard') }}"
                class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                Dashboard
            </a>
        </li>
        <li>
            <a href="#"
                class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                Users
            </a>
        </li>
        <li>
            <a href="#"
                class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                Products
            </a>
        </li>
        <li>
            <a href="#"
                class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                Orders
            </a>
        </li>
        <li>
            <a href="#"
                class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                Categories
            </a>
        </li>
        <li>
            <a href="#"
                class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                Brands
            </a>
        </li>
        <li>
            <a href="{{ route('admin.roles.index') }}"
                class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('roles*') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                Roles
            </a>
        </li>
        <li>
            <a href="#"
                class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                Settings
            </a>
        </li>
    </ul>

    <div class="pt-4 pb-2">
        <a href="{{ url('/') }}"
            class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
            Back to Home
        </a>
    </div>
</nav>