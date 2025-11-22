@extends('layouts.app')

@section('content')
    <div class="bg-[#f5f5f5] pb-36">
        <x-banner pageBanner="images/properties-banner.png" page="Property Details" />

        <div class="container pt-20 mx-auto">
            <div class="grid grid-cols-5 gap-5 text-[#25464b]">
                <div class="flex flex-col col-span-3 gap-5">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col gap-3">
                            <span class="text-3xl">
                                {{ $property->name }}
                            </span>
                            <span class="text-xl text-black/40">
                                {{ $property->location }}
                            </span>
                        </div>
                        <div class="text-5xl font-medium">
                            ₱{{ number_format($property->price, 0, '.', ',') }}
                        </div>
                    </div>
                    <div class="w-full max-w-[1400px] mx-auto">
                        <!-- Main Slider -->
                        <div class="overflow-hidden swiper mainSwiper rounded-xl">
                            <div class="relative swiper-wrapper">
                                @foreach ($property->gallery_images as $item)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($item) }}" class="w-full h-[500px] object-cover">
                                    </div>
                                @endforeach
                                <div
                                    class="absolute text-base top-4 left-4 text-[#0a1a3a] font-medium bg-white rounded-full px-3 py-1">
                                    {{ $property->category }}
                                </div>
                                <div id="shareBtn"
                                    class="absolute text-base top-4 right-4 text-[#0a1a3a] font-medium bg-white rounded-full px-3 py-1 flex items-center gap-1 cursor-pointer transition-all">

                                    <!-- Share Icon -->
                                    <svg id="iconShare" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="transition-all duration-300 size-5">
                                        <path fill="currentColor"
                                            d="M16.61 21q-.994 0-1.687-.695q-.692-.696-.692-1.69q0-.15.132-.757l-7.197-4.273q-.324.374-.793.587t-1.007.213q-.986 0-1.676-.702T3 12t.69-1.683t1.676-.702q.537 0 1.007.213t.793.588l7.198-4.255q-.07-.194-.101-.385q-.032-.192-.032-.392q0-.993.697-1.689Q15.625 3 16.62 3t1.688.697T19 5.389t-.695 1.688t-1.69.692q-.542 0-1-.222t-.78-.597l-7.199 4.273q.07.194.101.386q.032.191.032.391t-.032.391t-.1.386l7.198 4.273q.323-.375.78-.597q.458-.222 1-.222q.994 0 1.69.696q.695.698.695 1.693t-.697 1.688t-1.692.692" />
                                    </svg>

                                    <!-- Check Icon (hidden initially) -->
                                    <svg id="iconCheck" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="hidden text-green-600 transition-all duration-300 size-5">
                                        <path fill="currentColor"
                                            d="M9.55 18.45L4.8 13.7l1.4-1.4l3.35 3.35l8.25-8.25l1.4 1.4z" />
                                    </svg>

                                    <span id="shareText" class="transition-all duration-300">Share</span>
                                </div>


                            </div>

                            <div
                                class="absolute z-20 flex items-center justify-center w-full max-w-full px-7 top-1/2 h-fit">
                                <div class="flex justify-between w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="text-white size-8 galler-button-prev">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="1.5" d="m14 7l-5 5l5 5" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="text-white size-8 galler-button-next">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="1.5" d="m10 17l5-5l-5-5" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Thumbnail Slider -->
                        <div class="mt-5 swiper thumbSwiper">
                            <div class="swiper-wrapper">
                                @foreach ($property->gallery_images as $item)
                                    <div class="swiper-slide !h-32 border rounded-xl overflow-hidden cursor-pointer">
                                        <img src="{{ asset($item) }}" class="object-cover w-full h-full">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-5 p-6 border rounded-xl">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="32"
                                    d="M403.29 32H280.36a14.46 14.46 0 0 0-10.2 4.2L24.4 281.9a28.85 28.85 0 0 0 0 40.7l117 117a28.86 28.86 0 0 0 40.71 0L427.8 194a14.46 14.46 0 0 0 4.2-10.2v-123A28.66 28.66 0 0 0 403.29 32" />
                                <path fill="currentColor" d="M352 144a32 32 0 1 1 32-32a32 32 0 0 1-32 32" />
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="32" d="m230 480l262-262a13.8 13.8 0 0 0 4-10V80" />
                            </svg>
                            <span class="text-base">{{ $property->type }}</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="text-[#edbb28] size-10 {{ empty($property->bedroom) ? 'hidden' : 'flex' }}">
                            <circle cx="12.1" cy="12.1" r="1" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                        <div class=" items-center gap-3 {{ empty($property->bedroom) ? 'hidden' : 'flex' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-7 text-black/50">
                                <path fill="currentColor"
                                    d="M3 18v-5q0-.444.256-.946T4 11.3V9q0-.846.577-1.423T6 7h4.5q.517 0 .883.213q.365.212.617.587q.252-.375.617-.587Q12.983 7 13.5 7H18q.846 0 1.423.577T20 9v2.3q.489.252.744.754q.256.502.256.946v5h-1v-2H4v2zm9.5-7H19V9q0-.425-.288-.712T18 8h-4.5q-.425 0-.712.288T12.5 9zM5 11h6.5V9q0-.425-.288-.712T10.5 8H6q-.425 0-.712.288T5 9zm-1 4h16v-2q0-.425-.288-.712T19 12H5q-.425 0-.712.288T4 13zm16 0H4z" />
                            </svg>
                            <span class="text-base">{{ $property->bedroom }} Bed(s)</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="text-[#edbb28] size-10 {{ empty($property->sqft) ? 'hidden' : 'flex' }}">
                            <circle cx="12.1" cy="12.1" r="1" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                        <div class=" items-center gap-3 {{ empty($property->sqft) ? 'hidden' : 'flex' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24"
                                class="text-black/50">
                                <path fill="currentColor"
                                    d="M3.563 5.5a2.25 2.25 0 0 1 2.25-2.25h2.5a.75.75 0 1 1 0 1.5h-2.5a.75.75 0 0 0-.75.75V8a.75.75 0 0 1-1.5 0zM15.561 4a.75.75 0 0 1 .75-.75h2.5a2.25 2.25 0 0 1 2.25 2.25V8a.75.75 0 1 1-1.5 0V5.5a.75.75 0 0 0-.75-.75h-2.5a.75.75 0 0 1-.75-.75M4.313 15.25a.75.75 0 0 1 .75.75v2.5c0 .414.335.75.75.75h2.5a.75.75 0 0 1 0 1.5h-2.5a2.25 2.25 0 0 1-2.25-2.25V16a.75.75 0 0 1 .75-.75m15.998 0a.75.75 0 0 1 .75.75v2.5a2.25 2.25 0 0 1-2.25 2.25h-2.5a.75.75 0 0 1 0-1.5h2.5a.75.75 0 0 0 .75-.75V16a.75.75 0 0 1 .75-.75" />
                            </svg>
                            <span class="text-[#0a1a3a]">{{ $property->sqft }} sq. ft.</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="text-[#edbb28] size-10 {{ empty($property->carpark) ? 'hidden' : 'flex' }}">
                            <circle cx="12.1" cy="12.1" r="1" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                        <div class="items-center gap-3 {{ empty($property->carpark) ? 'hidden' : 'flex' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24"
                                class="text-black/50">
                                <path fill="currentColor"
                                    d="M3.563 5.5a2.25 2.25 0 0 1 2.25-2.25h2.5a.75.75 0 1 1 0 1.5h-2.5a.75.75 0 0 0-.75.75V8a.75.75 0 0 1-1.5 0zM15.561 4a.75.75 0 0 1 .75-.75h2.5a2.25 2.25 0 0 1 2.25 2.25V8a.75.75 0 1 1-1.5 0V5.5a.75.75 0 0 0-.75-.75h-2.5a.75.75 0 0 1-.75-.75M4.313 15.25a.75.75 0 0 1 .75.75v2.5c0 .414.335.75.75.75h2.5a.75.75 0 0 1 0 1.5h-2.5a2.25 2.25 0 0 1-2.25-2.25V16a.75.75 0 0 1 .75-.75m15.998 0a.75.75 0 0 1 .75.75v2.5a2.25 2.25 0 0 1-2.25 2.25h-2.5a.75.75 0 0 1 0-1.5h2.5a.75.75 0 0 0 .75-.75V16a.75.75 0 0 1 .75-.75" />
                            </svg>
                            <span class="text-[#0a1a3a]">{{ $property->carpark }} car Parking</span>
                        </div>
                    </div>

                    <div class="flex flex-col gap-5 text-[#0a1a3a]">
                        <span class="text-xl font-semibold">Overview</span>

                        <span id="overviewText" class="transition-all duration-300 text-black/50 line-clamp-5">
                            {{ $property->overview }}
                        </span>

                        <button id="readMoreBtn" class="flex items-center gap-2 text-[#0a1a3a]">
                            <span>Read More</span>
                            <svg id="readMoreIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1.5" d="m7 10l5 5l5-5" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex flex-col gap-5 text-[#0a1a3a] mt-5">
                        <span class="text-xl font-semibold">Amenities</span>

                        <div class="grid grid-cols-1 gap-4 xl:grid-cols-2">
                            @foreach ($property->amenities as $item)
                                <div class="flex items-center gap-3 p-3 px-5 bg-white rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" class="text-[#edbb28]">
                                        <path fill="currentColor"
                                            d="m10.6 13.4l-2.15-2.15q-.275-.275-.7-.275t-.7.275t-.275.7t.275.7L9.9 15.5q.3.3.7.3t.7-.3l5.65-5.65q.275-.275.275-.7t-.275-.7t-.7-.275t-.7.275zM5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.587 1.413T19 21z" />
                                    </svg>
                                    <span class="text-base">{{ $item }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="w-full max-w-md col-span-2 p-8 bg-white rounded-lg shadow-lg h-fit">
                    <a href="{{ route('properties.all') }}"
                        class="flex items-center gap-1 mb-4 text-sm text-gray-500 group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="transition duration-300 group-hover:-translate-x-1">
                            <path fill="currentColor"
                                d="m4 10l-.354.354L3.293 10l.353-.354zm16.5 8a.5.5 0 0 1-1 0zM8.646 15.354l-5-5l.708-.708l5 5zm-5-5.708l5-5l.708.708l-5 5zM4 9.5h10v1H4zM20.5 16v2h-1v-2zM14 9.5a6.5 6.5 0 0 1 6.5 6.5h-1a5.5 5.5 0 0 0-5.5-5.5z" />
                        </svg>
                        <span>
                            Back to All Properties
                        </span>
                    </a>

                    <h2 class="mb-6 text-2xl font-semibold">Send An Appointment</h2>

                    <form action="#" method="POST" class="space-y-4">
                        <div>
                            <label class="block mb-1 text-gray-700">Appointment Date</label>
                            <input type="date" name="appointment_date"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" />
                        </div>
                        <div>
                            <label class="block mb-1 text-gray-700">Appointment Location</label>
                            <input type="text" name="appointment_location" placeholder="Enter appointment location"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" />
                        </div>
                        <div>
                            <label class="block mb-1 text-gray-700">Full Name</label>
                            <input type="text" name="full_name" placeholder="Enter full name"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" />
                        </div>
                        <div>
                            <label class="block mb-1 text-gray-700">Email Address</label>
                            <input type="email" name="email" placeholder="Enter email address"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" />
                        </div>
                        <div>
                            <label class="block mb-1 text-gray-700">Contact Number</label>
                            <input type="tel" name="contact_number" placeholder="Enter contact number"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" />
                        </div>
                        <div>
                            <label class="block mb-1 text-gray-700">Company Name</label>
                            <input type="text" name="company_name" placeholder="Enter company name"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" />
                        </div>
                        <div>
                            <label class="block mb-1 text-gray-700">Position</label>
                            <input type="text" name="position" placeholder="Enter position"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" />
                        </div>

                        <p class="mt-2 text-xs text-gray-500">
                            By submitting, you agree that ListInHere and its partners may contact you via call or text,
                            including automated messages. See our
                            <a href="#" class="text-yellow-500 underline">Terms of Service</a> and
                            <a href="#" class="text-yellow-500 underline">Privacy Policy</a>.
                        </p>

                        <button type="submit"
                            class="w-full px-4 py-2 mt-4 font-semibold text-white bg-yellow-500 rounded-md hover:bg-yellow-600">Set
                            Appointment</button>
                    </form>
                </div>

                <div class="flex flex-col col-span-5 gap-5 my-16">
                    <div class="flex items-center justify-between">
                        <span class="text-[#25464b] text-4xl my-5">You Might Be Interested In</span>
                        <div class="flex items-center gap-5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                class="transition duration-300 size-8 swiper-interest-prev hover:scale-125">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1.5" d="m14 7l-5 5l5 5" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                class="transition duration-300 rotate-180 size-8 swiper-interest-next hover:scale-125">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1.5" d="m14 7l-5 5l5 5" />
                            </svg>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="swiper interestSwiper">
                            <div class=" swiper-wrapper">
                                @foreach ($listings as $item)
                                    <a href="{{ route('properties.show', ['id' => $item->id, 'slug' => Str::slug($item->name)]) }}"
                                        class="flex flex-col group swiper-slide">
                                        <div class="h-[15rem] w-full relative z-10 overflow-hidden rounded-t-xl">
                                            <img src="{{ asset($item->image) }}" alt=""
                                                class="object-cover w-full h-full transition duration-500 group-hover:scale-105">

                                            <div
                                                class="absolute top-3 left-3 text-[#0a1a3a] font-medium bg-white text-sm rounded-full px-3 py-1">
                                                {{ $item->category }}
                                            </div>

                                            {{-- For Sale / For Rent badge (right) --}}
                                            <div
                                                class="absolute hidden top-3 right-3 text-white font-medium text-sm rounded-full px-4 py-1.5 z-10 shadow-md
                                            {{ $item->type === 'rent' ? 'bg-red-600' : 'bg-green-600' }}">
                                                {{ $item->type === 'rent' ? 'For Rent' : 'For Sale' }}
                                            </div>
                                        </div>
                                        <div
                                            class="flex flex-col gap-3 p-5 transition duration-500 bg-white rounded-b-xl group-hover:drop-shadow-lg">
                                            <span
                                                class="text-[#25464b] text-xl font-bold">₱{{ number_format($item->price, 0, '.', ',') }}</span>
                                            <div class="flex flex-col gap-1">
                                                <span class="text-[#0a1a3a] text-xl">{{ $item->name }}</span>
                                                <span class="text-black/50">{{ $item->location }}</span>
                                            </div>
                                            <div class="flex items-center gap-5">
                                                <div class="flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        class="size-7 text-black/50">
                                                        <path fill="currentColor"
                                                            d="M3 18v-5q0-.444.256-.946T4 11.3V9q0-.846.577-1.423T6 7h4.5q.517 0 .883.213q.365.212.617.587q.252-.375.617-.587Q12.983 7 13.5 7H18q.846 0 1.423.577T20 9v2.3q.489.252.744.754q.256.502.256.946v5h-1v-2H4v2zm9.5-7H19V9q0-.425-.288-.712T18 8h-4.5q-.425 0-.712.288T12.5 9zM5 11h6.5V9q0-.425-.288-.712T10.5 8H6q-.425 0-.712.288T5 9zm-1 4h16v-2q0-.425-.288-.712T19 12H5q-.425 0-.712.288T4 13zm16 0H4z" />
                                                    </svg>
                                                    <span class="text-[#0a1a3a]">{{ $item->bedroom }} Bed(s)</span>
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    class="text-[#fba832] size-8">
                                                    <circle cx="12.1" cy="12.1" r="1" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" />
                                                </svg>
                                                <div class="flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                                        viewBox="0 0 25 24" class="text-black/50">
                                                        <path fill="currentColor"
                                                            d="M3.563 5.5a2.25 2.25 0 0 1 2.25-2.25h2.5a.75.75 0 1 1 0 1.5h-2.5a.75.75 0 0 0-.75.75V8a.75.75 0 0 1-1.5 0zM15.561 4a.75.75 0 0 1 .75-.75h2.5a2.25 2.25 0 0 1 2.25 2.25V8a.75.75 0 1 1-1.5 0V5.5a.75.75 0 0 0-.75-.75h-2.5a.75.75 0 0 1-.75-.75M4.313 15.25a.75.75 0 0 1 .75.75v2.5c0 .414.335.75.75.75h2.5a.75.75 0 0 1 0 1.5h-2.5a2.25 2.25 0 0 1-2.25-2.25V16a.75.75 0 0 1 .75-.75m15.998 0a.75.75 0 0 1 .75.75v2.5a2.25 2.25 0 0 1-2.25 2.25h-2.5a.75.75 0 0 1 0-1.5h2.5a.75.75 0 0 0 .75-.75V16a.75.75 0 0 1 .75-.75" />
                                                    </svg>
                                                    <span class="text-[#0a1a3a]">{{ $item->sqft }} sq. ft.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .thumbSwiper .swiper-slide-thumb-active {
            border: 3px solid #fba832;
            /* gold border (your brand color) */
            opacity: 1;
            border-radius: 12px;
        }
    </style>

    <script>
        var thumbSwiper = new Swiper(".thumbSwiper", {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });

        var mainSwiper = new Swiper(".mainSwiper", {
            spaceBetween: 10,
            navigation: {
                nextEl: ".galler-button-next",
                prevEl: ".galler-button-prev",
            },
            thumbs: {
                swiper: thumbSwiper,
            },
        });

        document.getElementById('shareBtn').addEventListener('click', function() {
            const url = "{{ url()->current() }}";
            const iconShare = document.getElementById("iconShare");
            const iconCheck = document.getElementById("iconCheck");
            const shareText = document.getElementById("shareText");

            // 1. Copy URL automatically
            navigator.clipboard.writeText(url);

            // 2. Switch to check icon
            iconShare.classList.add("hidden");
            iconCheck.classList.remove("hidden");
            shareText.textContent = "Copied!";

            // 3. Revert after 1.3 seconds
            setTimeout(() => {
                iconCheck.classList.add("hidden");
                iconShare.classList.remove("hidden");
                shareText.textContent = "Share";
            }, 1300);
        });

        const overviewText = document.getElementById('overviewText');
        const readMoreBtn = document.getElementById('readMoreBtn');
        const readMoreIcon = document.getElementById('readMoreIcon');
        let expanded = false;

        function checkOverflow() {
            // Temporarily remove clamp so we can measure full height
            overviewText.classList.remove('line-clamp-5');

            const fullHeight = overviewText.scrollHeight;

            // Put clamp back
            overviewText.classList.add('line-clamp-5');

            const clampedHeight = overviewText.clientHeight;

            // If clamped height is >= full height, it means no overflow → hide button
            if (clampedHeight >= fullHeight) {
                readMoreBtn.style.display = "none";
            } else {
                readMoreBtn.style.display = "flex";
            }
        }

        checkOverflow();

        readMoreBtn.addEventListener('click', () => {
            expanded = !expanded;

            if (expanded) {
                overviewText.classList.remove('line-clamp-5');
                readMoreBtn.querySelector('span').innerText = "Read Less";
                readMoreIcon.style.transform = "rotate(180deg)";
            } else {
                overviewText.classList.add('line-clamp-5');
                readMoreBtn.querySelector('span').innerText = "Read More";
                readMoreIcon.style.transform = "rotate(0deg)";
            }
        });

        var interestSwiper = new Swiper('.interestSwiper', {
            slidesPerView: 3,
            spaceBetween: 20,
            navigation: {
                nextEl: '.swiper-interest-next',
                prevEl: '.swiper-interest-prev',
            },
            breakpoints: {
                1024: {
                    slidesPerView: 3
                },
                768: {
                    slidesPerView: 2
                },
                0: {
                    slidesPerView: 1
                },
            }
        });
    </script>
@endsection
