<header x-data="{ lastY: 0, show: true }" x-init="window.addEventListener('scroll', () => {
    const currentY = window.scrollY;
    show = currentY < 50;
    lastY = currentY;
});"
    :style="{
        transform: show ? 'translateY(0px)' : 'translateY(-10px)',
        backgroundColor: show ? 'transparent' : '#25464B',
        boxShadow: show ? 'none' : '0 0px 10px rgba(0, 0, 0, 0.5)'
    }"
    class="fixed top-0 left-0 z-50 w-full text-white transition-all duration-300 bg-transparent">
    <div class="container flex justify-between py-3 mx-auto xl:items-center xl:px-3 lg:py-4">

        <!-- Left: Search Bar -->
        <div class="flex items-center space-x-2">
            <div class="items-center hidden px-3 py-2 rounded-full bg-white/30 xl:flex backdrop-blur-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" fill-rule="evenodd"
                        d="m16.31 15.561l4.114 4.115l-.848.848l-4.123-4.123a7 7 0 1 1 .857-.84M16.8 11a5.8 5.8 0 1 0-11.6 0a5.8 5.8 0 0 0 11.6 0" />
                </svg>
                <input type="text" placeholder="Search a property..."
                    class="ml-2 text-lg text-gray-200 placeholder-gray-200 bg-transparent placeholder:text-base w-60 focus:outline-none">
            </div>
        </div>

        <!-- Center: Nav + Logo -->
        <div class="flex items-start px-3 xl:items-center xl:px-0 xl:space-x-5 2xl:space-x-14">
            <nav class="items-center hidden text-lg font-normal xl:space-x-5 2xl:space-x-14 xl:flex">
                <a href="{{ route('home') }}"
                    class="{{ Route::is('home') ? 'text-[#EDBB28] font-medium' : 'text-white' }}">Home</a>
                <a href="{{ route('about-us') }}"
                    class="{{ Route::is('about-us') ? 'text-[#EDBB28] font-medium' : 'text-white' }}">About Us</a>
            </nav>

            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex-shrink-0 w-auto h-24 xl:flex">
                <img src="{{ asset('images/logo.png') }}" alt="Logo"
                    class="object-contain w-full h-full rounded-full">
            </a>

            <nav class="items-center hidden text-lg font-normal xl:space-x-5 2xl:space-x-14 xl:flex">
                <a href="{{ route('properties.all') }}"
                    class="{{ Route::is('properties.*') ? 'text-[#EDBB28] font-medium' : 'text-white' }}">Property</a>
                <a href="{{ route('contact-us') }}"
                    class="{{ Route::is('contact-us') ? 'text-[#EDBB28] font-medium' : 'text-white' }}">Contact Us</a>
            </nav>
        </div>

        <!-- Right: Buttons -->
        <div class="flex justify-end w-full px-5 space-x-4 xl:w-fit xl:items-center">
            <div class="hidden xl:flex">
                <x-verify-question-modal />
            </div>
            <div class="flex-col hidden text-lg xl:flex">
                <div class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-5 text-[#EDBB28]">
                        <path fill="currentColor"
                            d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24c1.12.37 2.33.57 3.57.57c.55 0 1 .45 1 1V20c0 .55-.45 1-1 1c-9.39 0-17-7.61-17-17c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1c0 1.25.2 2.45.57 3.57c.11.35.03.74-.25 1.02z" />
                    </svg>
                    <span class="text-[#EDBB28] font-medium">Call Us:</span>
                </div>
                <span class="text-white">09 123456789</span>
            </div>

            <!-- Mobile Menu Button -->
            <button id="menu-btn" class="xl:hidden focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden text-gray-200 xl:hidden bg-gray-800/95 backdrop-blur-md">
        <nav class="flex flex-col items-center py-4 space-y-3 text-lg font-normal">
            <a href="{{ route('home') }}"
                class="{{ Route::is('home') ? 'text-[#EDBB28] font-medium' : 'text-white' }}">Home</a>
            <a href="{{ route('about-us') }}"
                class="{{ Route::is('about-us') ? 'text-[#EDBB28] font-medium' : 'text-white' }}">About Us</a>
            <a href="{{ route('properties.all') }}"
                class="{{ Route::is('properties.all') ? 'text-[#EDBB28] font-medium' : 'text-white' }}">Property</a>
            <a href="{{ route('contact-us') }}"
                class="{{ Route::is('contact-us') ? 'text-[#EDBB28] font-medium' : 'text-white' }}">Contact Us</a>
            <x-verify-question-modal />
        </nav>
    </div>
</header>

<!-- Script for mobile menu -->
<script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
