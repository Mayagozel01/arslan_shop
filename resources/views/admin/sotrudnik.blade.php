@extends('admin.layouts.app')

@section('header', 'Users Management')
@section('subheader', 'Manage user accounts, roles and permissions')

@section('content')
    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success fade-in">
            {{ session('success') }}
        </div>
    @endif

    {{-- Users Table Card --}}
    <div class="bg-white rounded-lg overflow-hidden mb-6">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">All Users</h3>
                    <p class="mt-1 text-sm text-gray-600">A list of all users in your system including their name, email,
                        role and status.</p>
                </div>
                <button onclick="toggleForm()" class="btn btn-primary">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add New User
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left">ID</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Username</th>
                        <th class="px-6 py-3 text-left">Email</th>
                        <th class="px-6 py-3 text-left">Phone</th>
                        <th class="px-6 py-3 text-left">Role</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="fade-in">
                            <td class="px-6 py-4">
                                <span class="text-sm font-medium text-gray-900">#{{ $user->id }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div
                                        class="flex-shrink-0 h-10 w-10 rounded-full bg-primary text-white flex items-center justify-center font-semibold">
                                        {{ strtoupper(substr($user->first_name ?? 'U', 0, 1)) }}{{ strtoupper(substr($user->last_name ?? 'S', 0, 1)) }}
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-gray-900">{{ $user->username ?? 'N/A' }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-gray-600">{{ $user->email }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-gray-600">{{ $user->phone ?? 'N/A' }}</span>
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $roleName = $roles->where('id', $user->role_id)->first()->name ?? 'No Role';
                                    $badgeClass = match ($user->role_id) {
                                        1 => 'badge-danger',
                                        2 => 'badge-warning',
                                        default => 'badge-info'
                                    };
                                @endphp
                                <span class="badge {{ $badgeClass }}">{{ $roleName }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <button
                                        onclick="openEditModal({{ $user->id }}, '{{ addslashes($user->first_name ?? '') }}', '{{ addslashes($user->middle_name ?? '') }}', '{{ addslashes($user->last_name ?? '') }}', '{{ addslashes($user->username ?? '') }}', '{{ addslashes($user->phone ?? '') }}', '{{ addslashes($user->email ?? '') }}', {{ $user->role_id ?? '' }})"
                                        class="btn-secondary" style="padding: 6px 12px; font-size: 12px;">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </button>
                                    <button class="btn-secondary"
                                        style="padding: 6px 12px; font-size: 12px; background-color: #fee; color: #c00;">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                No users found. Create your first user to get started.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Create User Form Card --}}
    <div id="userForm" class="bg-white rounded-lg overflow-hidden" style="display: none;">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Create New User</h3>
                <button onclick="toggleForm()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>

        <form action="{{ route('admin.sotrudniks.store') }}" method="POST" class="p-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- First Name --}}
                <div>
                    <label for="first_name">First Name *</label>
                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required>
                    @error('first_name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Middle Name --}}
                <div>
                    <label for="middle_name">Middle Name</label>
                    <input type="text" name="middle_name" id="middle_name" value="{{ old('middle_name') }}">
                    @error('middle_name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Last Name --}}
                <div>
                    <label for="last_name">Last Name *</label>
                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" required>
                    @error('last_name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Username --}}
                <div>
                    <label for="user_name">Username *</label>
                    <input type="text" name="username" id="user_name" value="{{ old('username') }}" required>
                    @error('username')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Phone --}}
                <div>
                    <label for="phone">Phone *</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="+77772223344"
                        required>
                    @error('phone')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email">Email *</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                    @error('email')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password">Password *</label>
                    <input type="password" name="password" id="password" required>
                    @error('password')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Role --}}
                <div>
                    <label for="role_id">Role *</label>
                    <select name="role_id" id="role_id" required>
                        <option value="">Select a role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('role_id')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <input type="text" name="type" id="" value="sotrudnik" hidden>

            <div class="mt-6 flex items-center justify-end gap-3">
                <button type="button" onclick="toggleForm()" class="btn-secondary">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Create User
                </button>
            </div>
        </form>
    </div>

    {{-- Edit User Modal --}}
    <div id="editUserModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Edit User</h3>
                    <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>

                <form id="editUserForm" action="" method="POST" class="p-6">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_user_id" name="user_id" value="">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- First Name --}}
                        <div>
                            <label for="edit_first_name">First Name *</label>
                            <input type="text" name="first_name" id="edit_first_name" value="" required>
                            @error('first_name')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Middle Name --}}
                        <div>
                            <label for="edit_middle_name">Middle Name</label>
                            <input type="text" name="middle_name" id="edit_middle_name" value="">
                            @error('middle_name')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Last Name --}}
                        <div>
                            <label for="edit_last_name">Last Name *</label>
                            <input type="text" name="last_name" id="edit_last_name" value="" required>
                            @error('last_name')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Username --}}
                        <div>
                            <label for="edit_username">Username *</label>
                            <input type="text" name="username" id="edit_username" value="" required>
                            @error('username')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Phone --}}
                        <div>
                            <label for="edit_phone">Phone *</label>
                            <input type="text" name="phone" id="edit_phone" value="" placeholder="+77772223344" required>
                            @error('phone')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="edit_email">Email *</label>
                            <input type="email" name="email" id="edit_email" value="" required>
                            @error('email')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div>
                            <label for="edit_password">Password (leave blank to keep current)</label>
                            <input type="password" name="password" id="edit_password">
                            @error('password')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Role --}}
                        <div>
                            <label for="edit_role_id">Role *</label>
                            <select name="role_id" id="edit_role_id" required>
                                <option value="">Select a role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <input type="text" name="type" value="sotrudnik" hidden>

                    <div class="mt-6 flex items-center justify-end gap-3">
                        <button type="button" onclick="closeEditModal()" class="btn-secondary">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function toggleForm() {
            const form = document.getElementById('userForm');
            if (form.style.display === 'none') {
                form.style.display = 'block';
                form.classList.add('fade-in');
                form.scrollIntoView({ behavior: 'smooth', block: 'start' });
            } else {
                form.style.display = 'none';
            }
        }

        function openEditModal(id, first_name, middle_name, last_name, username, phone, email, role_id) {
            document.getElementById('edit_user_id').value = id;
            document.getElementById('edit_first_name').value = first_name;
            document.getElementById('edit_middle_name').value = middle_name;
            document.getElementById('edit_last_name').value = last_name;
            document.getElementById('edit_username').value = username;
            document.getElementById('edit_phone').value = phone;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_role_id').value = role_id;
            document.getElementById('edit_password').value = ''; // Clear password
            document.getElementById('editUserForm').action = '/admin/sotrudniks/' + id;
            document.getElementById('editUserModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editUserModal').classList.add('hidden');
        }

        // Auto-show form if there are validation errors
        @if ($errors->any())
            @if (old('user_id'))
                document.addEventListener('DOMContentLoaded', function () {
                    openEditModal({{ old('user_id') }}, '{{ old('first_name') }}', '{{ old('middle_name') }}', '{{ old('last_name') }}', '{{ old('username') }}', '{{ old('phone') }}', '{{ old('email') }}', {{ old('role_id') }});
                });
            @else
                document.addEventListener('DOMContentLoaded', function () {
                    toggleForm();
                });
            @endif
        @endif
    </script>
@endpush