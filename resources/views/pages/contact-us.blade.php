@extends('layouts.app')

@section('content')
    <div class="bg-[#f5f5f5]">
        <x-banner pageBanner="images/contactus-banner.png" page="Contact Us" />

        <div class="text-[#25464b] container flex flex-col gap-20 pt-20 mx-auto text-center">
            <div class="flex flex-col gap-3 text-2xl font-medium xl:text-5xl">
                <span class="">
                    Have Questions? Don't Hesitate to Contact Us
                </span>
                <span>
                    Through a Message!
                </span>
            </div>
            <div class="grid justify-between grid-cols-1 xl:grid-cols-3">
                <div class="flex flex-col items-center gap-3">
                    <div class="rounded-full bg-[#edbb28] p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="text-white size-12">
                            <path fill="currentColor"
                                d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24c1.12.37 2.33.57 3.57.57c.55 0 1 .45 1 1V20c0 .55-.45 1-1 1c-9.39 0-17-7.61-17-17c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1c0 1.25.2 2.45.57 3.57c.11.35.03.74-.25 1.02z" />
                        </svg>
                    </div>
                    <span class="text-2xl font-bold">Phone Number</span>
                    <span class="text-xl text-black/70">0912 345 6789</span>
                </div>
                <div class="flex flex-col items-center gap-3">
                    <div class="rounded-full bg-[#edbb28] p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12" class="text-white size-12">
                            <path fill="currentColor"
                                d="M6 .5A4.5 4.5 0 0 1 10.5 5c0 1.863-1.42 3.815-4.2 5.9a.5.5 0 0 1-.6 0C2.92 8.815 1.5 6.863 1.5 5A4.5 4.5 0 0 1 6 .5m0 3a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3" />
                        </svg>
                    </div>
                    <span class="text-2xl font-bold">Location</span>
                    <span class="text-xl text-black/70">B13L10 Jasmine Heather St. Lavistamonte 2 Subd. Matina
                        Balusong,
                        Davao City</span>
                </div>
                <div class="flex flex-col items-center gap-3">
                    <div class="rounded-full bg-[#edbb28] p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="text-white size-12">
                            <path fill="currentColor"
                                d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2m0 4l-8 5l-8-5V6l8 5l8-5z" />
                        </svg>
                    </div>
                    <span class="text-2xl font-bold">Email Address</span>
                    <span class="text-xl text-black/70">listinhere@gmail.com</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 mt-20 bg-white">
            <div class="max-w-4xl px-4 py-12 mx-auto">
                <!-- Title -->
                <h2 class="text-4xl font-bold text-[#25464b]">Get In Touch</h2>

                <p class="max-w-2xl mt-3 leading-relaxed text-gray-600">
                    We’d love to hear from you! Whether you’re buying, selling, or simply exploring your options,
                    ListInHere is here to guide you every step of the way.
                </p>

                <!-- FORM -->
                <form class="mt-10 space-y-6">

                    <!-- Full Name + Email -->
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <!-- Full Name -->
                        <div>
                            <label class="block mb-1 font-semibold text-gray-700">Full Name</label>
                            <input type="text"
                                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter full name">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block mb-1 font-semibold text-gray-700">Email Address</label>
                            <input type="email"
                                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter email address">
                        </div>
                    </div>

                    <!-- Subject -->
                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Subject</label>
                        <input type="text" class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-teal-500"
                            placeholder="Enter subject">
                    </div>

                    <!-- Message -->
                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Message</label>
                        <textarea rows="6" class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-teal-500"
                            placeholder="Enter message"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="px-8 py-3 font-medium text-black rounded-lg shadow bg-gradient-to-b from-[#f6e887] to-[#feb101] hover:opacity-90">
                        Submit Message
                    </button>
                </form>
            </div>
            <div class="w-auto h-full">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.5544919479457!2d125.56336907587163!3d7.061515316675697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32f90d554cad9eab%3A0x51e4ab709b3b09bd!2sMatina%20Balusung%20St%2C%20Talomo%2C%20Davao%20City%2C%20Davao%20del%20Sur!5e0!3m2!1sen!2sph!4v1763962793415!5m2!1sen!2sph"
                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    class="w-full h-full"></iframe>
            </div>
        </div>
    </div>
@endsection
