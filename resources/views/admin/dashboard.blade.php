@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[70vh] text-center space-y-6">

    <!-- Logo -->
    <div class="flex flex-col items-center">
        <img src="{{ asset('images/logo.png') }}" alt="Silid Cuadrado Logo"
            class="h-28 w-auto mb-4 drop-shadow-[0_0_25px_rgba(37,70,75,0.3)]">

        <!-- Welcome Title -->
        <h1 class="text-4xl md:text-5xl font-extrabold text-[#25464b] tracking-wide">
            Welcome Back, {{ Auth::user()->name ?? 'Administrator' }}!
        </h1>

        <!-- Subtitle -->
        <p class="text-[#0a1a3a]/70 text-lg md:text-xl max-w-2xl mt-4 leading-relaxed">
            You’re now logged in to the
            <span class="text-[#25464b] font-semibold">ListinHere</span>
            Admin Panel.
            Manage your website content, banners, and updates with ease and confidence.
        </p>
    </div>

    <!-- Button -->
    <div class="mt-8">
        <a href="{{ route('admin.banners.index') }}"
            class="px-8 py-3 bg-[#25464b] text-white font-semibold rounded-lg shadow-lg 
            hover:bg-[#0c2627] hover:shadow-[0_0_20px_rgba(37,70,75,0.4)] transition duration-300">
            Manage Homepage Banners
        </a>
    </div>

</div>
@endsection