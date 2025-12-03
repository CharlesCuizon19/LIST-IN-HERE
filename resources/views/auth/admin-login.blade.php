<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Silid Cuadrado</title>
    @vite('resources/css/app.css') <!-- Laravel Vite + Tailwind -->
</head>

<body class="h-screen w-screen bg-[#f5f5f5] flex items-center justify-center">

    <div class="grid grid-cols-1 md:grid-cols-2 w-full h-full">

        <!-- Left Side (same layout, new colors & picture) -->
        <div class="hidden md:flex bg-[#0a1a3a] items-center justify-center relative overflow-hidden">
            <!-- Blue Glow -->
            <div class="absolute w-[500px] h-[500px] bg-[#25464b]/40 rounded-full blur-3xl"></div>

            <!-- Logo + Text -->
            <div class="flex flex-col items-center text-center relative z-10 transform hover:scale-105 transition-transform duration-500">
                {{-- Change this image to whatever hero/logo you want --}}
                <img src="{{ asset('images/logo.png') }}"
                    alt="Silid Cuadrado"
                    class="h-40 mb-6 rounded-xl object-cover shadow-[0_20px_40px_rgba(0,0,0,0.45)]">

                <div>
                    <h1 class="text-4xl font-extrabold text-[#edbb28] tracking-wide drop-shadow-lg">
                       LISTINHERE
                    </h1>
                </div>
            </div>
        </div>

        <!-- Right Side (same structure, new colors) -->
        <div class="flex items-center justify-center px-6 relative">
            <div
                class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8 transform transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(0,0,0,0.25)]">

                <!-- Heading -->
                <h2 class="text-3xl font-bold text-[#25464b] mb-6 flex items-center gap-2">
                    <span class="border-l-4 border-[#edbb28] pl-2"></span>
                    <span class="drop-shadow-md">
                        Administrator <span class="font-normal text-[#0a1a3a]">Login</span>
                    </span>
                </h2>

                <!-- Success Message -->
                @if(session('success'))
                <div
                    class="bg-green-100 text-green-700 p-2 rounded mb-4 text-center text-sm font-medium shadow-inner">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Error Message -->
                @if($errors->any())
                <div
                    class="bg-red-100 text-red-700 p-2 rounded mb-4 text-center text-sm font-medium shadow-inner">
                    {{ $errors->first() }}
                </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-5">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label class="block text-[#25464b] mb-1 font-medium">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-[#25464b] focus:ring-2 focus:ring-[#25464b]/40 shadow-sm placeholder:text-gray-400"
                            placeholder="Enter your email" required autofocus>
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-[#25464b] mb-1 font-medium">Password</label>
                        <input type="password" name="password"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-[#25464b] focus:ring-2 focus:ring-[#25464b]/40 shadow-sm placeholder:text-gray-400"
                            placeholder="Enter your password" required>
                    </div>

                    <!-- Button -->
                    <button type="submit"
                        class="w-full bg-[#25464b] text-white py-3 rounded-lg font-semibold shadow-lg transform transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_10px_20px_rgba(12,38,39,0.6)] hover:bg-[#0c2627]">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>