@extends('layouts.app')

@section('content')
    <div class="bg-[#f5f5f5]">
        <x-banner pageBanner="images/properties-banner.png" page="List of Properties" />

        <div class="container px-3 pt-20 mx-auto pb-36">
            <div class="grid grid-cols-1 gap-5 xl:grid-cols-5">
                <div class="flex flex-col col-span-3 gap-5" data-aos="fade-right">
                    <div class="flex justify-between w-full">
                        <div>
                            <!-- SORTING - NOW FULLY WORKING -->
                            <div x-data="sortDropdown()" class="relative inline-block text-sm xl:text-lg">
                                <div class="flex items-center gap-1 text-gray-400">
                                    <span>Sort by:</span>
                                    <button @click="open = !open"
                                        class="flex items-center gap-1 text-[#13294B] font-semibold">
                                        <span x-text="selectedLabel"></span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Dropdown Menu -->
                                <div x-show="open" @click.away="open = false"
                                    class="absolute z-20 w-48 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg">
                                    <ul class="py-1 text-gray-700">
                                        @foreach ([
            'Newest' => 'latest',
            'Oldest' => 'oldest',
            'Price: Low to High' => 'price_asc',
            'Price: High to Low' => 'price_desc',
        ] as $label => $value)
                                            <li>
                                                <button @click="select('{{ $label }}', '{{ $value }}')"
                                                    class="w-full px-4 py-2 text-left hover:bg-gray-100">
                                                    {{ $label }}
                                                </button>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="text-sm xl:text-lg">
                            <span class="text-gray-400">Showing all <span
                                    class="text-[#515c72] font-semibold">{{ $listingCount }} listings</span></span>
                        </div>
                    </div>
                    <!-- Swiper Container -->
                    <div class="relative">
                        <div class="swiper propertiesSwiper">
                            <div class="swiper-wrapper">

                                @if (!$listings->isEmpty())
                                    @foreach ($listings->chunk(8) as $chunk)
                                        <div class="swiper-slide">
                                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-7">
                                                @foreach ($chunk as $item)
                                                    <div class="flex flex-col cursor-pointer group" x-data
                                                        @click="$dispatch('open-inquiry-modal', {
                                        id: '{{ $item->id }}',
                                        slug: '{{ Str::slug($item->name) }}',
                                        name: '{{ addslashes($item->name) }}',
                                        price: '{{ number_format($item->price, 0, '.', ',') }}',
                                        location: '{{ addslashes($item->location) }}',
                                        image: '{{ asset($item->image) }}',
                                        bedroom: '{{ $item->bedroom }}',
                                        sqft: '{{ $item->sqft }}',
                                        type: '{{ $item->type === 'rent' ? 'For Rent' : 'For Sale' }}',
                                        category: '{{ $item->category }}'
                                    })">

                                                        <!-- CARD CONTENT SAME AS YOUR ORIGINAL -->
                                                        <div
                                                            class="h-[15rem] w-full relative z-10 overflow-hidden rounded-t-xl">
                                                            <img src="{{ asset($item->image) }}"
                                                                class="object-cover w-full h-full transition duration-500 group-hover:scale-105">
                                                            <div
                                                                class="absolute top-3 left-3 text-[#0a1a3a] font-medium bg-white text-sm rounded-full px-3 py-1">
                                                                {{ $item->category }}
                                                            </div>
                                                        </div>

                                                        <div class="flex flex-col gap-3 p-5 bg-white rounded-b-xl">
                                                            <span class="text-[#25464b] text-xl font-bold">
                                                                ₱{{ number_format($item->price, 0, '.', ',') }}
                                                            </span>
                                                            <span class="text-[#0a1a3a] text-xl">{{ $item->name }}</span>
                                                            <span class="text-black/50">{{ $item->location }}</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="grid items-center justify-center w-full h-screen col-span-2 text-center">
                                        <span class="text-black/50">No properties found.</span>
                                    </div>
                                @endif

                            </div>

                            <!-- Navigation + Pagination -->
                            <div class="flex items-center justify-center gap-10 mt-10">

                                <!-- Prev arrow -->
                                <div class="swiper-properties-prev cursor-pointer text-[#204046]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" d="m14 7l-5 5l5 5" />
                                    </svg>
                                </div>

                                <!-- Pagination Numbers -->
                                <div class="swiper-properties-pagination"></div>

                                <!-- Next arrow -->
                                <div class="swiper-properties-next cursor-pointer text-[#204046]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="rotate-180 size-6">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" d="m14 7l-5 5l5 5" />
                                    </svg>
                                </div>

                            </div>


                        </div>
                    </div>

                </div>
                <div class="col-span-2" data-aos="fade-left">
                    <form method="GET" action="{{ request()->url() }}" id="filter-form">
                        <input type="hidden" name="sort" id="sort-input" value="{{ request('sort', 'latest') }}">
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

    <!-- Inquiry Modal -->
    <div x-data="inquiryModal()" x-show="open" x-transition @open-inquiry-modal.window="openModal($event.detail)"
        x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm"
        @keydown.escape.window="open = false">

        <div @click.outside="open = false" class="w-full max-w-xl overflow-hidden bg-white shadow-2xl rounded-2xl">

            <div class="flex">

                <div class="p-8">
                    <div class="flex flex-col mb-6">
                        <!-- Title -->
                        <h2 class="text-2xl font-bold text-[#1a2f2b]">
                            Interested in This Property?
                        </h2>

                        <p class="mt-2 leading-relaxed text-gray-600">
                            Fill out the form below and our agent will get in touch with you shortly.
                        </p>
                    </div>

                    <form @submit.prevent="submitInquiry" class="space-y-5">

                        <!-- Full Name -->
                        <div>
                            <label class="block mb-1 font-semibold text-gray-700">Full Name</label>
                            <input type="text"
                                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter full name" required>
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block mb-1 font-semibold text-gray-700">Email Address</label>
                            <input type="email"
                                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter email address" required>
                        </div>

                        <!-- Contact Number -->
                        <div>
                            <label class="block mb-1 font-semibold text-gray-700">Contact Number</label>
                            <input type="text"
                                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter contact number" required>
                        </div>

                        <!-- Company Name -->
                        <div>
                            <label class="block mb-1 font-semibold text-gray-700">Company Name</label>
                            <input type="text"
                                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter company name" required>
                        </div>

                        <!-- Position -->
                        <div>
                            <label class="block mb-1 font-semibold text-gray-700">Position</label>
                            <input type="text"
                                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter position" required>
                        </div>

                        <!-- Disclaimer -->
                        <p class="text-sm leading-relaxed text-gray-500">
                            By submitting, you agree that ListInHere and its partners may contact
                            you via call or text, including automated messages.
                            See our
                            <a href="#" class="font-semibold text-orange-600">[Terms of Service]</a>
                            and
                            <a href="#" class="font-semibold text-orange-600">[Privacy Policy]</a>.
                        </p>

                        <div class="mt-4">
                            <div class="g-recaptcha" data-sitekey="RECAPTCHA_SITEKEY"></div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex gap-4 pt-2">
                            <!-- Submit -->
                            <button type="submit"
                                class="w-full px-8 py-3 font-normal text-black rounded-lg shadow bg-gradient-to-b from-[#f6e887] to-[#feb101] hover:opacity-90">
                                Submit Form
                            </button>

                            <!-- Cancel -->
                            <button type="button" @click="open = false"
                                class="w-full px-8 py-3 font-normal text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">
                                Cancel
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Bullet container */
        .swiper-properties-pagination {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        /* Default bullet (numbers only) */
        .custom-bullet {
            width: 38px;
            /* set same width & height */
            height: 38px;
            border-radius: 50%;
            /* perfect circle */
            display: flex;
            /* center number */
            justify-content: center;
            align-items: center;
            font-size: 1rem;
            color: white;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        /* Active bullet (circle) */
        .custom-bullet.swiper-pagination-bullet-active {
            background-color: #204046;
            /* same dark teal as your image */
            color: white !important;
            border-radius: 100%;
            padding: 12px 12px;
        }
    </style>


    <script>
        const propertiesSwiper = new Swiper('.propertiesSwiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-properties-next',
                prevEl: '.swiper-properties-prev',
            },
            pagination: {
                el: '.swiper-properties-pagination',
                clickable: true,
                renderBullet: function(index, className) {
                    return `<span class="custom-bullet ${className}">${index + 1}</span>`;
                },
            },
        });

        function sortDropdown() {
            return {
                open: false,
                selectedLabel: '{{ request('sort') == 'latest' ? 'Newest' : (request('sort') == 'oldest' ? 'Oldest' : (request('sort') == 'price_asc' ? 'Price: Low to High' : (request('sort') == 'price_desc' ? 'Price: High to Low' : 'Newest'))) }}',

                select(label, value) {
                    this.selectedLabel = label;
                    this.open = false;
                    document.getElementById('sort-input').value = value;
                    document.getElementById('filter-form').submit();
                }
            }
        }

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

        function inquiryModal() {
            return {
                open: false,
                property: {
                    id: '',
                    slug: '',
                    name: '',
                    price: '',
                    location: '',
                    image: '',
                    bedroom: '',
                    sqft: '',
                    type: '',
                    category: ''
                },
                form: {
                    name: '',
                    email: '',
                    phone: '',
                    message: ''
                },

                openModal(data) {
                    this.property = data;
                    this.form = {
                        name: '',
                        email: '',
                        phone: '',
                        message: ''
                    }; // reset form
                    this.open = true;
                },

                submitInquiry() {
                    // Build the final URL
                    const baseUrl = `/properties/${this.property.id}/${this.property.slug}`;
                    const params = new URLSearchParams(this.form).toString();
                    const finalUrl = `${baseUrl}?${params}`;

                    // Redirect to single property page with inquiry data
                    window.location.href = finalUrl;

                    // Optional: close modal after redirect (won't be seen)
                    this.open = false;
                }
            }
        }
    </script>
@endsection
