@extends('layouts.user')
@section('content')
<main class="px-10 py-5">
    <div class="text-gray-400">HOME / LOGIN</div>
    <div class="py-20 px-10 bg-white shadow-2xl rounded border-t border-blue-200 mt-5">
        <div class="grid grid-cols-2">
            <div class="mx-5">
                <h2 class="text-blue-600 text-3xl font-bold">Sign In</h2>
                <hr>
                <form action="{{ route('login') }}" method="POST" class="mt-10">
                    @csrf
                    <div class="my-5">
                        <label for="email">Email Address <sup class="text-red-400">*</sup></label>
                        <input type="text" name="email" required class="w-full border border-blue-200 px-10 py-1">
                    </div>
                    <div class="my-5">
                        <label for="password">Password <sup class="text-red-400">*</sup></label>
                        <input type="password" name="password" required class="w-full border border-blue-200 px-10 py-1">
                    </div>
                    <div class="my-5">
                        <button type="submit" class="px-10 py-2 text-white font-bold text-lg bg-blue-600 rounded-full">Login</button>
                    </div>
                </form>
            </div>
            <div class="mx-5">
                <h2 class="text-blue-600 text-3xl font-bold">Sign Up</h2>
                <hr>
                <form action="{{ route('register') }}" class="mt-10">
                    @csrf
                    <div class="my-5">
                        <label for="email">Nama Lengkap <sup class="text-red-400">*</sup></label>
                        <input type="text" name="name" required class="w-full border border-blue-200 px-10 py-1">
                    </div>
                    <div class="my-5">
                        <label for="email">Email Address <sup class="text-red-400">*</sup></label>
                        <input type="text" name="email" required class="w-full border border-blue-200 px-10 py-1">
                    </div>
                    <div class="my-5">
                        <label for="phone">Phone <sup class="text-red-400">*</sup></label>
                        <input type="text" name="phone" required class="w-full border border-blue-200 px-10 py-1">
                    </div>
                    <div class="my-5">
                        <label for="password">Password <sup class="text-red-400">*</sup></label>
                        <input type="password" name="password" required class="w-full border border-blue-200 px-10 py-1">
                    </div>
                    <div class="my-5">
                        <label for="password">Confirm Password <sup class="text-red-400">*</sup></label>
                        <input type="password" name="password_confirmation" required class="w-full border border-blue-200 px-10 py-1">
                    </div>
                    <div class="my-5">
                        <button type="submit" class="px-10 py-2 text-white font-bold text-lg bg-blue-600 rounded-full">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
