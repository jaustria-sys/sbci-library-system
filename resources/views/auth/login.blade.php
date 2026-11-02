<x-guest-layout>
<div class="min-h-screen flex bg-[#F8F7F3] -m-6">
    <!-- Left Image - Library -->
    <div class="hidden lg:flex w-[55%] relative overflow-hidden">
        <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=1200" class="absolute inset-0 w-full h-full object-cover" alt="Library">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/90 to-blue-800/70"></div>
        <div class="relative z-10 p-12 flex flex-col justify-between w-full text-white">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-blue-900 font-bold text-xl">S</div>
                <span class="font-bold text-xl tracking-wide">SBCI LIBRARY</span>
            </div>
            <div class="max-w-lg">
                <h1 class="text-5xl font-bold leading-[1.1] mb-4">Where Stories Live and Knowledge Grows.</h1>
                <p class="text-blue-100 text-lg leading-relaxed">Manage books, track borrowing history, and explore our digital catalog built for SBCI students.</p>
                <div class="flex gap-6 mt-8">
                    <div class="bg-white/10 backdrop-blur rounded-2xl px-5 py-3"><p class="font-bold text-2xl">1k+</p><p class="text-xs text-blue-200">Books</p></div>
                    <div class="bg-white/10 backdrop-blur rounded-2xl px-5 py-3"><p class="font-bold text-2xl">24/7</p><p class="text-xs text-blue-200">Access</p></div>
                </div>
            </div>
            <p class="text-sm text-blue-200">© 2026 Subic Bay Colleges Inc. Library System</p>
        </div>
    </div>

    <!-- Right Form -->
    <div class="w-full lg:w-[45%] flex items-center justify-center p-6 md:p-12 bg-white lg:bg-[#F8F7F3]">
        <div class="w-full max-w-[420px] bg-white lg:rounded-[2rem] lg:shadow-xl lg:p-10 p-2">
            <div class="lg:hidden flex items-center gap-2 mb-8">
                <div class="w-9 h-9 bg-blue-800 rounded-xl flex items-center justify-center text-white font-bold">S</div>
                <span class="font-bold text-blue-900">SBCI LIBRARY</span>
            </div>

            <h2 class="text-3xl font-bold text-gray-900">Welcome back</h2>
            <p class="text-gray-500 mt-2 mb-8">Please enter your details to sign in.</p>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <x-input-label for="email" value="Email Address" class="font-semibold text-gray-700" />
                    <x-text-input id="email" class="block mt-2 w-full rounded-xl border-gray-300 focus:border-blue-800 focus:ring-blue-800 py-3.5" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="you@sbci.edu.ph" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-5">
                    <div class="flex justify-between items-center">
                        <x-input-label for="password" value="Password" class="font-semibold text-gray-700" />
                        @if (Route::has('password.request'))
                        <a class="text-sm font-bold text-blue-800 hover:underline" href="{{ route('password.request') }}">Forgot?</a>
                        @endif
                    </div>
                    <x-text-input id="password" class="block mt-2 w-full rounded-xl border-gray-300 focus:border-blue-800 focus:ring-blue-800 py-3.5" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="block mt-5">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-800 focus:ring-blue-800" name="remember">
                        <span class="ms-2 text-sm text-gray-600">Remember me for 14 days</span>
                    </label>
                </div>

                <div class="mt-8">
                    <button type="submit" class="w-full bg-blue-800 hover:bg-blue-900 text-white py-4 rounded-full font-bold text-[16px] transition shadow-lg shadow-blue-800/20">
                        Sign In →
                    </button>
                    <p class="text-center text-sm text-gray-500 mt-6">
                        Don't have an account? <a href="{{ route('register') }}" class="font-bold text-blue-800 hover:underline">Create account</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
</x-guest-layout>