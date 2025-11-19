@extends('layouts.app')


@section('content')
    <div class="h-full bg-[#f5f5f5]">
        <x-banner />

        <div class="absolute z-30 flex w-full max-w-[1400px] bottom-5 justify-self-center">
            <div x-data="{
                location: '',
                typeOpen: false,
                categoryOpen: false,
                selectedType: 'Select listing type',
                selectedCategory: 'Select listing category'
            }"
                class="flex items-center w-full justify-between p-8 bg-white shadow-md rounded-2xl !text-[#25464B]">

                <div class="flex items-center gap-4">
                    <!-- SEARCH LOCATION -->
                    <div class="flex items-center w-full gap-3 py-3 pl-5 pr-20 border rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16">
                            <path fill="currentColor"
                                d="M8 1a6 6 0 0 1 6 6c0 2.874-3.097 6.016-4.84 7.558c-.67.59-1.65.59-2.32 0C5.098 13.016 2 9.874 2 7a6 6 0 0 1 6-6m0 1a5 5 0 0 0-5 5c0 1.108.614 2.395 1.57 3.683c.933 1.258 2.087 2.377 2.934 3.126c.29.256.702.256.992 0c.847-.749 2-1.867 2.935-3.126C12.386 9.395 13 8.108 13 7a5 5 0 0 0-5-5m0 2.75a2.25 2.25 0 1 1 0 4.5a2.25 2.25 0 0 1 0-4.5m0 1a1.25 1.25 0 1 0 0 2.5a1.25 1.25 0 0 0 0-2.5" />
                        </svg>
                        <input type="text" placeholder="Search location"
                            class="w-full outline-none placeholder:text-[#25464b]" x-model="location">
                    </div>

                    <!-- LISTING TYPE DROPDOWN -->
                    <div class="relative w-full">
                        <button @click="typeOpen = !typeOpen"
                            class="flex items-center justify-between w-full px-5 py-3 border rounded-xl">
                            <div class="flex items-center gap-3 pr-20 text-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="32"
                                        d="M403.29 32H280.36a14.46 14.46 0 0 0-10.2 4.2L24.4 281.9a28.85 28.85 0 0 0 0 40.7l117 117a28.86 28.86 0 0 0 40.71 0L427.8 194a14.46 14.46 0 0 0 4.2-10.2v-123A28.66 28.66 0 0 0 403.29 32" />
                                    <path fill="currentColor" d="M352 144a32 32 0 1 1 32-32a32 32 0 0 1-32 32" />
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="32"
                                        d="m230 480l262-262a13.8 13.8 0 0 0 4-10V80" />
                                </svg>
                                <span x-text="selectedType"></span>
                            </div>

                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- OPTIONS -->
                        <div x-show="typeOpen" @click.away="typeOpen = false"
                            class="absolute z-20 w-full mt-2 bg-white shadow-lg rounded-xl">
                            <div class="px-5 py-3 cursor-pointer hover:bg-gray-100"
                                @click="selectedType = 'For Sale'; typeOpen = false">For Sale</div>
                            <div class="px-5 py-3 cursor-pointer hover:bg-gray-100"
                                @click="selectedType = 'For Rent'; typeOpen = false">For Rent</div>
                            <div class="px-5 py-3 cursor-pointer hover:bg-gray-100"
                                @click="selectedType = 'Pre-Selling'; typeOpen = false">Pre-Selling</div>
                        </div>
                    </div>

                    <!-- LISTING CATEGORY DROPDOWN -->
                    <div class="relative w-full">
                        <button @click="categoryOpen = !categoryOpen"
                            class="flex items-center justify-between w-full px-5 py-3 border rounded-xl">
                            <div class="flex items-center gap-3 pr-20 text-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1">
                                        <path stroke-width="1.5" d="M4 5v14h16V3" />
                                        <path stroke-width="1.5"
                                            d="M14 19v-5.463c0-2.143-4-1.953-4 0V19m4 3h-4M3 5l7.735-2.74c1.254-.347 1.276-.347 2.53 0L21 5" />
                                        <path stroke-width="2" d="M12.012 8H12" />
                                    </g>
                                </svg>
                                <span x-text="selectedCategory"></span>
                            </div>

                            <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- OPTIONS -->
                        <div x-show="categoryOpen" @click.away="categoryOpen = false"
                            class="absolute z-20 w-full mt-2 bg-white shadow-lg rounded-xl">
                            <div class="px-5 py-3 cursor-pointer hover:bg-gray-100"
                                @click="selectedCategory = 'Condominium'; categoryOpen = false">Condominium</div>
                            <div class="px-5 py-3 cursor-pointer hover:bg-gray-100"
                                @click="selectedCategory = 'House & Lot'; categoryOpen = false">House & Lot</div>
                            <div class="px-5 py-3 cursor-pointer hover:bg-gray-100"
                                @click="selectedCategory = 'Commercial'; categoryOpen = false">Commercial</div>
                        </div>
                    </div>
                </div>

                <!-- BUTTON -->
                <button
                    class="bg-[#25464b] hover:bg-[#0c2627] text-white rounded-lg px-5 py-4 flex items-center gap-2 text-nowrap">
                    Find Property
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-6">
                        <path fill="currentColor" fill-rule="evenodd"
                            d="m16.31 15.561l4.114 4.115l-.848.848l-4.123-4.123a7 7 0 1 1 .857-.84M16.8 11a5.8 5.8 0 1 0-11.6 0a5.8 5.8 0 0 0 11.6 0" />
                    </svg>
                </button>

            </div>
        </div>

        {{-- Listing Category --}}
        <div class="container flex flex-col gap-10 py-20 mx-auto">
            <div class="text-6xl text-[#25464b] font-bold">
                Listing Category
            </div>
            <div class="flex items-center gap-2 text-lg">
                <span class="text-black/50">
                    Choose Your Property Type and Start Exploring
                </span>
                <a href="#" class="flex items-center gap-2 group">
                    <span class="text-[#0a1a3a] font-semibold">View all {{ $listingCount }}
                        listings</span>
                    <div class="p-2 transition duration-300 bg-white rounded-full w-fit group-hover:translate-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M13.47 8.53a.75.75 0 0 1 1.06-1.06l4 4a.75.75 0 0 1 0 1.06l-4 4a.75.75 0 1 1-1.06-1.06l2.72-2.72H6.5a.75.75 0 0 1 0-1.5h9.69z" />
                        </svg>
                    </div>
                </a>
            </div>
            <div class="flex flex-wrap gap-4">
                @foreach ($uniqueListings as $item)
                    <a href="#"
                        class="flex items-center w-full max-w-md gap-5 p-3 transition duration-300 bg-white rounded-xl hover:drop-shadow-md hover:border">
                        <div class="h-32 overflow-hidden rounded-md w-36">
                            <img src="{{ asset($item->category_cover) }}" alt=""
                                class="object-cover w-full h-full">
                        </div>

                        <div class="flex flex-col gap-3">
                            <span class="text-[#25464b] text-2xl font-bold">{{ $item->category }}</span>

                            {{-- Show count for THIS specific category only --}}
                            <div class="text-lg text-[#edbb28] font-medium">
                                {{ $categoryCounts[$item->category] ?? 0 }} Listing(s)
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Latest Category --}}
        <div class="container flex flex-col gap-10 py-20 mx-auto">
            <div class="text-6xl text-[#25464b] font-bold">
                Latest Listings
            </div>
            <div class="flex items-center gap-2 text-lg">
                <span class="text-black/50">
                    Discover the Newest Properties on the Market
                </span>
                <a href="#" class="flex items-center gap-2 group">
                    <span class="text-[#0a1a3a] font-semibold">View all {{ $listingCount }}
                        listings</span>
                    <div class="p-2 transition duration-300 bg-white rounded-full w-fit group-hover:translate-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M13.47 8.53a.75.75 0 0 1 1.06-1.06l4 4a.75.75 0 0 1 0 1.06l-4 4a.75.75 0 1 1-1.06-1.06l2.72-2.72H6.5a.75.75 0 0 1 0-1.5h9.69z" />
                        </svg>
                    </div>
                </a>
            </div>
            <div class="grid grid-cols-1 gap-4 xl:grid-cols-3">
                @foreach ($latestListing as $item)
                    <a href="#" class="flex flex-col group">
                        <div class="h-[15rem] w-full relative overflow-hidden rounded-t-xl">
                            <img src="{{ asset($item->image) }}" alt=""
                                class="object-cover w-full h-full transition duration-500 group-hover:scale-105">

                            <div
                                class="absolute top-3 left-3 text-[#0a1a3a] font-medium bg-white text-sm rounded-full px-3 py-1">
                                {{ $item->category }}
                            </div>
                        </div>
                        <div
                            class="flex flex-col gap-3 p-5 transition duration-500 bg-white rounded-b-xl group-hover:drop-shadow-lg">
                            <span class="text-[#25464b] text-xl font-bold">₱{{ $item->price, 0, '.', ',' }}</span>
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
                                    <circle cx="12.1" cy="12.1" r="1" fill="none" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
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


        <div class="flex flex-col w-full gap-10 pt-20 pb-32 bg-white">
            <div class="text-center text-[#25464b] text-3xl xl:text-5xl font-bold flex items-center justify-center">
                <div class="w-[35%] leading-snug">
                    Building Trust Through <span class="text-[#edbb28]">Real Estate</span> Excellence
                </div>
            </div>
            <div class="p-3">
                <img src="{{ asset('images/rectangle-img.png') }}" alt="" class="w-full h-auto">
            </div>
            <div class="container grid grid-cols-1 gap-20 mx-auto xl:grid-cols-2">
                <div class="flex flex-col gap-4 text-[#25464b]">
                    <span class="text-3xl font-bold">
                        Get to Know ListInHere
                    </span>
                    <span class="text-lg">
                        At ListInHere, we believe every home tells a story. Our mission is to connect people with properties
                        that match their dreams, goals, and lifestyles. With honesty, dedication, and genuine care, we make
                        finding a home feel truly personal.
                    </span>
                    <x-button textColor="white" color="bg-[#25464b]" route="home" button="More About Us" />
                </div>
                <div class="grid grid-cols-1 gap-5 xl:grid-cols-2">
                    <div class="relative flex flex-col gap-2 px-5 py-3 rounded-lg bg-[#f5f5f5] h-fit overflow-hidden">
                        <div class="text-5xl text-[#25464b] font-bold">
                            1,200+
                        </div>
                        <div class="text-lg font-medium text-[#eebf35]">
                            Properties Sold
                        </div>
                        <img src="{{ asset('images/key.png') }}" alt="" class="absolute right-0 -bottom-4">
                    </div>
                    <div class="relative flex flex-col gap-2 px-5 py-3 rounded-lg bg-[#f5f5f5] h-fit overflow-hidden">
                        <div class="text-5xl text-[#25464b] font-bold">
                            850+
                        </div>
                        <div class="text-lg font-medium text-[#eebf35]">
                            Satisfies Clients
                        </div>
                        <img src="{{ asset('images/clients.png') }}" alt="" class="absolute right-0 -bottom-4">
                    </div>
                    <div class="relative flex flex-col gap-2 px-5 py-3 rounded-lg bg-[#f5f5f5] h-fit overflow-hidden">
                        <div class="text-5xl text-[#25464b] font-bold">
                            2,000+
                        </div>
                        <div class="text-lg font-medium text-[#eebf35]">
                            Active Listings
                        </div>
                        <img src="{{ asset('images/house.png') }}" alt="" class="absolute right-0 -bottom-4">
                    </div>
                    <div class="relative flex flex-col gap-2 px-5 py-3 rounded-lg bg-[#f5f5f5] h-fit overflow-hidden">
                        <div class="text-5xl text-[#25464b] font-bold">
                            10+
                        </div>
                        <div class="text-lg font-medium text-[#eebf35]">
                            Years of Experience
                        </div>
                        <img src="{{ asset('images/check.png') }}" alt="" class="absolute right-0 -bottom-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
