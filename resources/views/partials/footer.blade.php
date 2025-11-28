<footer class="bg-[#f5f5f5]">
    <div
        class="relative h-[70vh] md:h-[40vh] xl:h-auto bg-[#2b4c51] xl:bg-transparent {{ Route::is('contact-us') ? 'hidden' : 'flex' }}">
        <div class="p-3 overflow-hidden rounded-2xl">
            <img src="{{ asset('images/footer-rectangle.png') }}" alt=""
                class="hidden object-cover w-full h-full rounded-lg xl:flex">
        </div>
        <div class="absolute top-[60%] xl:top-[40%]">
            <div class="xl:w-[70%] leading-snug mx-auto space-y-6 px-3">
                <span class="text-3xl font-bold text-white xl:text-6xl ">Let's Turn Your <span
                        class="text-[#edbb28]">Property
                        Goals</span> into
                    Reality</span>
                <x-button color="bg-gradient-to-b from-[#f6e887] to-[#feb101]" button="Contact Us Now"
                    route="contact-us" />
            </div>
        </div>
        <div class="absolute -top-[7rem] w-full flex justify-center">
            <div class="flex flex-col w-[90%] gap-10 text-center bg-white border rounded-lg py-8">
                <span class="text-[#25464b] text-2xl xl:text-3xl font-bold">Our Trusted Partners</span>
                <div class="flex flex-wrap items-center gap-5 justify-evenly">
                    <img src="{{ asset('images/partner1.png') }}" alt="" class="w-auto h-12">
                    <img src="{{ asset('images/partner2.png') }}" alt="">
                    <img src="{{ asset('images/partner3.png') }}" alt="">
                    <img src="{{ asset('images/partner4.png') }}" alt="">
                    <img src="{{ asset('images/partner5.png') }}" alt="">
                    <img src="{{ asset('images/partner6.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="relative z-10 px-3 xl:px-0">
        <div class="flex flex-col">
            <div class="container grid grid-cols-1 gap-10 py-10 mx-auto xl:grid-cols-5">
                <div class="flex flex-col col-span-2 gap-5">
                    <img src="{{ asset('images/logo.png') }}" alt="" class="h-auto w-28">
                    <span class="text-[#0A1A3A] text-sm xl:text-lg leading-relaxed">
                        ListInHere is your trusted real estate partner, connecting buyers, sellers, and investors to the
                        best properties with ease and confidence.
                    </span>
                    <div class="flex items-center gap-3">
                        <span class="text-[#25464b] font-medium text-sm xl:text-lg">Follow Our Socials: </span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="text-[#edbb28] hover:scale-125 transition duration-300">
                            <path fill="currentColor"
                                d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="text-[#edbb28] hover:scale-125 transition duration-300">
                            <path fill="currentColor"
                                d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4zm9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="text-[#edbb28] hover:scale-125 transition duration-300">
                            <path fill="currentColor"
                                d="M16.6 5.82s.51.5 0 0A4.28 4.28 0 0 1 15.54 3h-3.09v12.4a2.59 2.59 0 0 1-2.59 2.5c-1.42 0-2.6-1.16-2.6-2.6c0-1.72 1.66-3.01 3.37-2.48V9.66c-3.45-.46-6.47 2.22-6.47 5.64c0 3.33 2.76 5.7 5.69 5.7c3.14 0 5.69-2.55 5.69-5.7V9.01a7.35 7.35 0 0 0 4.3 1.38V7.3s-1.88.09-3.24-1.48" />
                        </svg>
                    </div>
                    <x-verify-question-modal />
                </div>
                <div class="flex flex-wrap col-span-3 gap-x-[10rem] gap-y-10">
                    <div class="flex flex-col gap-5 w-fit">
                        <span class="text-lg xl:text-2xl font-bold text-[#25464b]">Quick Links</span>
                        <a href="{{ route('home') }}"
                            class="flex items-center gap-2 {{ Route::is('home') ? 'text-[#25464b] font-medium' : 'text-black/70' }} group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                class="transition duration-500 group-hover:translate-x-2 group-hover:rotate-45">
                                <path fill="currentColor"
                                    d="M18 7.05a1 1 0 0 0-1-1L9 6a1 1 0 0 0 0 2h5.56l-8.27 8.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0L16 9.42V15a1 1 0 0 0 1 1a1 1 0 0 0 1-1Z" />
                            </svg>
                            <span class="text-sm xl:text-lg">Home</span>
                        </a>
                        <a href="{{ route('about-us') }}"
                            class="flex items-center gap-2 {{ Route::is('about-us') ? 'text-[#25464b] font-medium' : 'text-black/70' }} group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                class="transition duration-500 group-hover:translate-x-2 group-hover:rotate-45">
                                <path fill="currentColor"
                                    d="M18 7.05a1 1 0 0 0-1-1L9 6a1 1 0 0 0 0 2h5.56l-8.27 8.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0L16 9.42V15a1 1 0 0 0 1 1a1 1 0 0 0 1-1Z" />
                            </svg>
                            <span class="text-sm xl:text-lg">About Us</span>
                        </a>
                        <a href="{{ route('properties.all') }}"
                            class="flex items-center gap-2 {{ Route::is('properties.*') ? 'text-[#25464b] font-medium' : 'text-black/70' }} group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                class="transition duration-500 group-hover:translate-x-2 group-hover:rotate-45">
                                <path fill="currentColor"
                                    d="M18 7.05a1 1 0 0 0-1-1L9 6a1 1 0 0 0 0 2h5.56l-8.27 8.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0L16 9.42V15a1 1 0 0 0 1 1a1 1 0 0 0 1-1Z" />
                            </svg>
                            <span class="text-sm xl:text-lg">Property</span>
                        </a>
                        <a href="{{ route('contact-us') }}"
                            class="flex items-center gap-2 {{ Route::is('contact-us') ? 'text-[#25464b] font-medium' : 'text-black/70' }} group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                class="transition duration-500 group-hover:translate-x-2 group-hover:rotate-45">
                                <path fill="currentColor"
                                    d="M18 7.05a1 1 0 0 0-1-1L9 6a1 1 0 0 0 0 2h5.56l-8.27 8.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0L16 9.42V15a1 1 0 0 0 1 1a1 1 0 0 0 1-1Z" />
                            </svg>
                            <span class="text-sm xl:text-lg">Contact Us</span>
                        </a>
                    </div>
                    <div class="flex flex-col gap-5 xl:w-[60%]">
                        <span class="font-bold text-xl xl:text-3xl text-[#25464b]">Stay Updated!</span>
                        <span class="text-[#0a1a3a] text-sm xl:text-lg leading-relaxed ">Get the newest listings, market
                            insights, and
                            real estate tips delivered straight to your inbox.</span>
                        <div class="flex justify-between p-3 bg-white border rounded-lg">
                            <input type="email" placeholder="Enter your email address"
                                class="w-full px-3 outline-none">
                            <button
                                class="px-6 py-3 text-sm xl:text-lg w-fit font-normal text-gray-900 bg-gradient-to-b from-[#f6e887] to-[#feb101] rounded-md hover:bg-yellow-600">Subsribe</button>
                        </div>
                    </div>
                    <div class="flex flex-col gap-5">
                        <span class="text-lg xl:text-2xl font-bold text-[#25464b]">Get in Touch</span>
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12"
                                class="text-[#edbb28] size-6">
                                <path fill="currentColor"
                                    d="M6 .5A4.5 4.5 0 0 1 10.5 5c0 1.863-1.42 3.815-4.2 5.9a.5.5 0 0 1-.6 0C2.92 8.815 1.5 6.863 1.5 5A4.5 4.5 0 0 1 6 .5m0 3a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3" />
                            </svg>
                            <span class="text-sm xl:text-lg text-black/70">B13L10 Jasmine Heather St. Lavistamonte 2
                                Subd. Matina
                                Balusong,
                                Davao City</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                class="text-[#edbb28] size-6">
                                <path fill="currentColor"
                                    d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24c1.12.37 2.33.57 3.57.57c.55 0 1 .45 1 1V20c0 .55-.45 1-1 1c-9.39 0-17-7.61-17-17c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1c0 1.25.2 2.45.57 3.57c.11.35.03.74-.25 1.02z" />
                            </svg>
                            <span class="text-sm xl:text-lg text-black/70">0912 345 6789</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                class="text-[#edbb28] size-6">
                                <path fill="currentColor"
                                    d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2m0 4l-8 5l-8-5V6l8 5l8-5z" />
                            </svg>
                            <span class="text-sm xl:text-lg text-black/70">listinhere@gmail.com</span>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="container flex flex-wrap items-center justify-center w-full mx-auto border-t border-black xl:justify-between py-7 ">
                <span class="text-center">© ListIn Here 2025. Designed and Developed by <a
                        href="https://rwebsolutions.com.ph/" class="text-orange-500">R Web Solutions Corp.</a></span>
                <img src="{{ asset('images/logo.png') }}" alt="" class="w-auto h-14">
                <div class="flex items-center gap-5 ">
                    <span>Terms & Conditions</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="text-[#fba832] size-8">
                        <circle cx="12.1" cy="12.1" r="1" fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                    <span>Privacy Policy</span>
                </div>
            </div>
        </div>
        <img src="{{ asset('images/footer-bg.png') }}" alt=""
            class="absolute inset-0 object-cover w-full h-full -z-10 mix-blend-multiply">
    </div>
</footer>
