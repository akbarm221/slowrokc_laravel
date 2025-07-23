@extends('layouts.app') {{-- Atau layout lain yang sesuai --}}

@section('title', 'Admin Login')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center">Admin Login</h2>
        <form id="login-form" class="space-y-6">
            <div>
                <label for="email" class="text-sm font-medium">Email</label>
                <input type="email" id="email" required autocomplete="current-password" class="w-full px-4 py-2 mt-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="password" class="text-sm font-medium">Password</label>
                <input type="password" id="password" required autocomplete="current-password" class="w-full px-4 py-2 mt-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <button type="submit" class="w-full px-4 py-2 font-bold text-white bg-blue-600 rounded-md hover:bg-blue-700">Login</button>
            <p id="error-message" class="text-red-500 text-sm text-center"></p>
        </form>
    </div>
</div>
@endsection

@push('scripts')
{{-- Kita akan tambahkan script Firebase di sini --}}
<script type="module" src="{{ asset('assets/js/firebase-auth.js') }}"></script>
@endpush