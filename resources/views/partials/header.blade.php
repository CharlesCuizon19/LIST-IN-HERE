 <header x-data="{ lastY: 0, show: true }" x-init="window.addEventListener('scroll', () => {
     const currentY = window.scrollY;
     show = currentY < 50;
     lastY = currentY;
 });"
     :class="show ? 'translate-y-0' : 'bg-[#25464B]/50 backdrop-blur-sm'"
     class="fixed top-0 left-0 z-50 w-full text-white transition-all duration-300 bg-transparent">
     <div class="container flex items-center justify-between py-3 mx-auto lg:py-4">

         <!-- Left: Search Bar -->
         <div class="flex items-center space-x-2">
             <div class="items-center hidden px-3 py-2 rounded-full bg-white/30 md:flex backdrop-blur-md">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                     <path fill="currentColor" fill-rule="evenodd"
                         d="m16.31 15.561l4.114 4.115l-.848.848l-4.123-4.123a7 7 0 1 1 .857-.84M16.8 11a5.8 5.8 0 1 0-11.6 0a5.8 5.8 0 0 0 11.6 0" />
                 </svg>
                 <input type="text" placeholder="Search a property..."
                     class="ml-2 text-lg text-gray-200 placeholder-gray-200 bg-transparent placeholder:text-base w-60 focus:outline-none">
             </div>
         </div>

         <!-- Center: Nav + Logo -->
         <div class="flex items-center space-x-14">
             <nav class="items-center hidden text-lg font-normal space-x-14 lg:flex">
                 <a href="#"
                     class="{{ Route::is('home') ? 'text-[#EDBB28] font-medium' : 'text-white' }}">Home</a>
                 <a href="#" class="hover:text-[#EDBB28]">About Us</a>
             </nav>

             <!-- Logo -->
             <div class="flex-shrink-0 w-auto h-24">
                 <img src="{{ asset('images/logo.png') }}" alt="Logo"
                     class="object-contain w-full h-full rounded-full">
             </div>

             <nav class="items-center hidden text-lg font-normal space-x-14 lg:flex">
                 <a href="#" class="hover:text-[#EDBB28]">Property</a>
                 <a href="#" class="hover:text-[#EDBB28]">Contact Us</a>
             </nav>
         </div>

         <!-- Right: Buttons -->
         <div class="flex items-center space-x-4">
             <a href="#"
                 class="px-6 py-3 text-lg font-normal text-gray-900 bg-gradient-to-b from-[#f6e887] to-[#feb101] rounded-md hover:bg-yellow-600">Inquire
                 Now</a>
             <div class="flex-col hidden text-lg md:flex">
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
             <button id="menu-btn" class="lg:hidden focus:outline-none">
                 <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M4 6h16M4 12h16M4 18h16" />
                 </svg>
             </button>
         </div>
     </div>

     <!-- Mobile Menu -->
     <div id="mobile-menu" class="hidden text-gray-200 lg:hidden bg-gray-800/95 backdrop-blur-md">
         <nav class="flex flex-col items-center py-4 space-y-3 text-lg font-normal">
             <a href="#" class="text-[#EDBB28]">Home</a>
             <a href="#" class="hover:text-[#EDBB28]">About Us</a>
             <a href="#" class="hover:text-[#EDBB28]">Property</a>
             <a href="#" class="hover:text-[#EDBB28]">Contact Us</a>
             <a href="#"
                 class="px-4 py-2 font-normal text-gray-900 bg-yellow-500 rounded-md hover:bg-yellow-600">Inquire
                 Now</a>
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
