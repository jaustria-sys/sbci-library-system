<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBCI Library - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>body{font-family:'Poppins',sans-serif}</style>
</head>
<body class="bg-[#F8F7F3]">
<div class="min-h-screen flex flex-col lg:flex-row">
    <!-- Left -->
    <div class="hidden lg:flex w-[55%] relative">
        <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=1200" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-blue-900/80"></div>
        <div class="relative z-10 p-12 flex flex-col justify-between w-full text-white">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-blue-900 font-bold">S</div>
                <span class="font-bold text-xl">SBCI LIBRARY</span>
            </div>
            <div>
                <h1 class="text-6xl font-extrabold leading-[0.9]">Where Stories<br>Live and<br>Knowledge<br>Grows.</h1>
                <p class="mt-6 text-blue-100 text-lg">Manage books, track borrowing history, and explore our digital catalog.</p>
                <div class="flex gap-4 mt-8">
                    <div class="bg-white/10 backdrop-blur px-5 py-3 rounded-2xl"><p class="font-bold text-xl">1k+</p><p class="text-xs">Books</p></div>
                    <div class="bg-white/10 backdrop-blur px-5 py-3 rounded-2xl"><p class="font-bold text-xl">24/7</p><p class="text-xs">Access</p></div>
                </div>
            </div>
            <p class="text-sm text-blue-200">© 2026 Subic Bay Colleges Inc.</p>
        </div>
    </div>

    <!-- Right -->
    <div class="w-full lg:w-[45%] flex items-center justify-center p-6 lg:p-12 bg-white">
        <div class="w-full max-w-md">
            <div class="lg:hidden flex items-center gap-2 mb-8">
                <div class="w-9 h-9 bg-blue-800 rounded-xl flex items-center justify-center text-white font-bold">S</div>
                <span class="font-bold text-blue-900">SBCI LIBRARY</span>
            </div>

            <h2 class="text-3xl font-bold text-gray-900">Welcome back</h2>
            <p class="text-gray-500 mt-2 mb-8">Please enter your details to sign in.</p>

            @if (session('status'))
                <div class="mb-4 text-sm text-green-600 bg-green-50 p-3 rounded-xl">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-5">
                    <label class="block font-semibold text-sm text-gray-700 mb-2">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="you@sbci.edu.ph"
                           class="w-full rounded-xl border border-gray-300 px-4 py-3.5 focus:ring-2 focus:ring-blue-800 focus:border-blue-800 outline-none">
                    @error('email')<p class="text-red-500 text-sm mt-2">{{ $message }}</p>@enderror
                </div>

                <div class="mb-5">
                    <div class="flex justify-between mb-2">
                        <label class="font-semibold text-sm text-gray-700">Password</label>
                        <a href="{{ route('password.request') }}" class="text-sm font-bold text-blue-800">Forgot?</a>
                    </div>
                    <input type="password" name="password" required placeholder="••••••••"
                           class="w-full rounded-xl border border-gray-300 px-4 py-3.5 focus:ring-2 focus:ring-blue-800 focus:border-blue-800 outline-none">
                    @error('password')<p class="text-red-500 text-sm mt-2">{{ $message }}</p>@enderror
                </div>

                <div class="flex items-center mb-6">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-blue-800">
                    <label for="remember_me" class="ms-2 text-sm text-gray-600">Remember me for 14 days</label>
                </div>

                <button type="submit" class="w-full bg-blue-800 hover:bg-blue-900 text-white py-4 rounded-full font-bold text-lg transition">
                    Sign In →
                </button>

                <p class="text-center text-sm text-gray-500 mt-6">
                    Don't have an account? <a href="{{ route('register') }}" class="font-bold text-blue-800 hover:underline">Create account</a>
                </p>
            </form>
        </div>
    </div>
</div>
</body>
</html>