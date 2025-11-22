@extends('layouts.app')

@section('content')
    <div class="bg-[#f5f5f5]">
        <x-banner pageBanner="images/properties-banner.png" page="List of Properties" />

        <div class="container pt-20 mx-auto pb-36">
            <div class="grid grid-cols-5 gap-5">
                <div class="flex flex-col col-span-3 gap-5">
                    <div class="flex justify-between w-full">
                        <div>
                            <div x-data="{ open: false, selected: 'Newest' }" class="relative inline-block text-lg">
                                <div class="flex items-center gap-1 text-gray-400">
                                    <span>Sort by:</span>

                                    <button @click="open = !open"
                                        class="flex items-center gap-1 text-[#13294B] font-semibold">
                                        <span x-text="selected"></span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500"
                                            viewBox="0 0 24 24" fill="none">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5" d="M6 9l6 6 6-6" />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Dropdown -->
                                <div x-show="open" @click.away="open = false"
                                    class="absolute z-20 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg w-36">
                                    <ul class="text-lg text-gray-700">
                                        <li>
                                            <button @click="selected = 'Newest'; open = false"
                                                class="w-full px-4 py-2 text-left hover:bg-gray-100">Newest</button>
                                        </li>
                                        <li>
                                            <button @click="selected = 'Oldest'; open = false"
                                                class="w-full px-4 py-2 text-left hover:bg-gray-100">Oldest</button>
                                        </li>
                                        <li>
                                            <button @click="selected = 'Price: Low to High'; open = false"
                                                class="w-full px-4 py-2 text-left hover:bg-gray-100">Price: Low to
                                                High</button>
                                        </li>
                                        <li>
                                            <button @click="selected = 'Price: High to Low'; open = false"
                                                class="w-full px-4 py-2 text-left hover:bg-gray-100">Price: High to
                                                Low</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="text-lg">
                            <span class="text-gray-400">Showing all <span
                                    class="text-[#515c72] font-semibold">{{ $listingCount }}
                                    listings</span></span>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-7">
                        @foreach ($listings as $item)
                            <a href="{{ route('properties.show', ['id' => $item->id, 'slug' => Str::slug($item->name)]) }}"
                                class="flex flex-col group">
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
                <div class="col-span-2">
                    <form method="GET" action="{{ request()->url() }}" id="filter-form">
                        <div class="w-full p-8 bg-white border border-gray-100 shadow-sm rounded-3xl">

                            {{-- Search Bar --}}
                            <div class="mb-8">
                                <div class="relative">
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        placeholder="Search a specific property..."
                                        class="w-full px-10 py-3 text-gray-700 placeholder-gray-400 bg-gray-100 rounded-full outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 absolute left-4 top-3.5 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 12.65z" />
                                    </svg>
                                </div>
                            </div>

                            {{-- Submit & Reset Buttons --}}
                            <div class="flex gap-3 mb-5">
                                <button type="submit"
                                    class="w-full bg-[#25464B] text-white font-semibold py-3 rounded-xl hover:bg-[#0f1f3a] transition">
                                    Apply Filters
                                </button>
                                <a href="{{ request()->url() }}"
                                    class="w-full py-3 font-semibold text-center text-gray-700 transition bg-gray-200 rounded-xl hover:bg-gray-300">
                                    Reset
                                </a>
                            </div>

                            {{-- Listing Type (Buy/Rent) --}}
                            <h3 class="text-lg font-bold text-[#173D2E] mb-4">Listing Type</h3>
                            <div class="flex gap-3 mb-8" x-data="{ type: '{{ request('type') ?: '' }}' }"
                                x-on:change="if ($event.target.name === 'type') { type = $event.target.value; $dispatch('submit-form') }">
                                <label class="px-5 py-2 font-semibold transition rounded-lg cursor-pointer"
                                    :class="type == 'buy' ? 'bg-yellow-400 text-white' : 'bg-gray-200 text-gray-700'">
                                    <input type="radio" name="type" value="buy" x-model="type" class="hidden">
                                    Buy
                                </label>
                                <label class="px-5 py-2 font-semibold transition rounded-lg cursor-pointer"
                                    :class="type === 'rent' ? 'bg-yellow-400 text-white' : 'bg-gray-200 text-gray-700'">
                                    <input type="radio" name="type" value="rent" x-model="type" class="hidden">
                                    Rent
                                </label>
                            </div>

                            {{-- Listing Category --}}
                            <h3 class="text-lg font-bold text-[#173D2E] mb-4">Listing Category</h3>
                            <div class="flex flex-col gap-3 mb-8 text-gray-700">
                                @foreach (['House & Lot', 'Apartment', 'Vacation Villa', 'Commercial Spaces', 'Vacant Lot'] as $category)
                                    <label class="flex items-center gap-3 cursor-pointer">
                                        <input type="checkbox" name="category[]" value="{{ $category }}"
                                            {{ in_array($category, request('category', [])) ? 'checked' : '' }}
                                            class="w-4 h-4 border-gray-400 rounded">
                                        <span>{{ $category }}</span>
                                    </label>
                                @endforeach
                            </div>

                            {{-- Price Range --}}
                            <h3 class="text-lg font-bold text-[#173D2E] mb-2">Price Range (₱)</h3>
                            <div class="grid grid-cols-2 gap-4 mb-8">
                                <div>
                                    <label class="block mb-1 text-sm text-gray-600">Min</label>
                                    <input type="number" name="price_min" value="{{ request('price_min', 0) }}"
                                        class="w-full px-3 py-3 text-gray-600 border border-gray-300 rounded-lg outline-none">
                                </div>
                                <div>
                                    <label class="block mb-1 text-sm text-gray-600">Max</label>
                                    <input type="number" name="price_max" value="{{ request('price_max', 0) }}"
                                        class="w-full px-3 py-3 text-gray-600 border border-gray-300 rounded-lg outline-none">
                                </div>
                            </div>

                            {{-- Floor Area --}}
                            <h3 class="text-lg font-bold text-[#173D2E] mb-2">Floor Area (sq. ft.)</h3>
                            <div class="grid grid-cols-2 gap-4 mb-8">
                                <div>
                                    <label class="block mb-1 text-sm text-gray-600">Min</label>
                                    <input type="number" name="floor_min" value="{{ request('floor_min', 0) }}"
                                        class="w-full px-3 py-3 text-gray-600 border border-gray-300 rounded-lg outline-none">
                                </div>
                                <div>
                                    <label class="block mb-1 text-sm text-gray-600">Max</label>
                                    <input type="number" name="floor_max" value="{{ request('floor_max', 0) }}"
                                        class="w-full px-3 py-3 text-gray-600 border border-gray-300 rounded-lg outline-none">
                                </div>
                            </div>

                            {{-- Location --}}
                            <h3 class="text-lg font-bold text-[#173D2E] mb-2">Location</h3>
                            <input type="text" name="location" value="{{ request('location') }}"
                                placeholder="Enter location here"
                                class="w-full px-4 py-3 mb-6 placeholder-gray-400 border border-gray-300 rounded-lg outline-none">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('sort', () => ({
                selected: '{{ request('sort', 'Newest') }}',
                open: false,

                updateSort(value) {
                    this.selected = value;
                    this.open = false;

                    // Update hidden input and submit form
                    document.getElementById('sort-input').value = this.getSortValue(value);
                    document.getElementById('filter-form').submit();
                },

                getSortValue(label) {
                    const map = {
                        'Newest': 'latest',
                        'Oldest': 'oldest',
                        'Price: Low to High': 'price_asc',
                        'Price: High to Low': 'price_desc'
                    };
                    return map[label] || 'latest';
                }
            }));
        });

        document.addEventListener('alpine:init', () => {
            Alpine.bind('submit-form', () => ({
                '@submit-form.window'() {
                    document.getElementById('filter-form').submit();
                }
            }));
        });
    </script>

    <!-- Hidden input for sort -->
    <input type="hidden" name="sort" id="sort-input" value="{{ request('sort', 'latest') }}">
@endsection
