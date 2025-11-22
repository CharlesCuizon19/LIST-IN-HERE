@php
    $banners = [
        (object) [
            'title' => 'Smart Investment Earns Prestige',
            'banner_image' => 'images/banner.png',
        ],
        (object) [
            'title' => 'Sample title2',
            'banner_image' => 'images/banner.png',
        ],
        (object) [
            'title' => 'Sample title3',
            'banner_image' => 'images/banner.png',
        ],
    ];
@endphp

@props([
    'page' => 'Page prop',
    'pageBanner' => '',
])

<div class="p-2">
    <div class="swiper {{ Route::is('home') ? 'myBannerSwiper h-[60rem]' : 'h-[22rem]' }}  relative  rounded-3xl">

        <div class="h-full {{ Route::is('home') ? 'swiper-wrapper' : '' }}">

            @foreach ($banners as $item)
                <div class="relative swiper-slide">

                    {{-- Banner Image --}}
                    <img src="{{ Route::is('home') ? asset($item->banner_image) : asset($pageBanner) }}" alt=""
                        class="object-cover w-full h-full">

                    {{-- Centered Title --}}
                    <div
                        class="absolute inset-0 z-20 flex items-center justify-center font-bold text-white {{ Route::is('home') ? 'text-[96px]' : 'mt-36 text-7xl' }} mx-[30rem] text-center">
                        {{ Route::is('home') ? $item->title : $page }}
                    </div>


                    <div
                        class="{{ Route::is('home') ? 'flex' : 'hidden' }} absolute inset-0 flex items-center justify-center mt-[25rem] z-30">
                        <x-button color="bg-gradient-to-b from-[#f6e887] to-[#feb101]" button="Browse Properties"
                            route="home" />
                    </div>
                </div>
            @endforeach

        </div>

        {{-- Gradient sheet --}}
        <div
            class="absolute inset-0 bg-gradient-to-b from-[#25464b] via-transparent to-transparent z-10 pointer-events-none rounded-3xl">
        </div>

        <div
            class="{{ Route::is('home') ? 'flex' : 'hidden' }} absolute z-20 flex items-center justify-center w-full max-w-full px-20 top-[30rem] h-fit">
            <div class="flex justify-between w-full">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    class="text-white size-8 banner-button-prev">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.5" d="m14 7l-5 5l5 5" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    class="text-white size-8 banner-button-next">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.5" d="m10 17l5-5l-5-5" />
                </svg>
            </div>
        </div>
    </div>
</div>

<script>
    var swiper = new Swiper(".myBannerSwiper", {
        loop: true,
        effect: "smooth",
        slidesPerView: 1,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".banner-button-next",
            prevEl: ".banner-button-prev",
        },
        speed: 2000,
    });
</script>
