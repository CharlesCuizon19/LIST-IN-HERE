@extends('layouts.app')

@section('content')
    <div class="pb-36 bg-[#f5f5f5]">
        <x-banner pageBanner="images/aboutus-banner.png" page="About Us" />

        <div class="container mx-auto grid grid-cols-1 xl:grid-cols-2 py-20 gap-20">
            <div class="flex flex-col gap-7">
                <span class="text-[#2c6471] text-4xl font-bold">Your Trusted Partner in Real Estate</span>
                <span class="text-[#575757] leading-relaxed">
                    At ListIn Here, we make property searching simple, transparent, and reliable. Our mission is to connect
                    homebuyers, sellers, and investors across the Philippines through a seamless real estate experience
                    built on trust and professionalism.
                </span>
                <span class="text-[#575757] leading-relaxed">
                    We understand that every property tells a story — whether it’s a family finding their first home, an
                    entrepreneur investing in commercial space, or someone looking for a peaceful vacation villa. That’s why
                    we’re dedicated to offering personalized guidance, accurate listings, and expert support from inquiry to
                    ownership.
                </span>
                <div class="grid grid-cols-1 gap-5 xl:grid-cols-2">
                    <div class="relative flex flex-col gap-2 px-5 py-3 rounded-lg bg-white h-fit overflow-hidden">
                        <div class="text-5xl text-[#25464b] font-bold">
                            1,200+
                        </div>
                        <div class="text-lg font-medium text-[#eebf35]">
                            Properties Sold
                        </div>
                        <img src="{{ asset('images/key.png') }}" alt="" class="absolute right-0 -bottom-4">
                    </div>
                    <div class="relative flex flex-col gap-2 px-5 py-3 rounded-lg bg-white h-fit overflow-hidden">
                        <div class="text-5xl text-[#25464b] font-bold">
                            850+
                        </div>
                        <div class="text-lg font-medium text-[#eebf35]">
                            Satisfies Clients
                        </div>
                        <img src="{{ asset('images/clients.png') }}" alt="" class="absolute right-0 -bottom-4">
                    </div>
                    <div class="relative flex flex-col gap-2 px-5 py-3 rounded-lg bg-white h-fit overflow-hidden">
                        <div class="text-5xl text-[#25464b] font-bold">
                            2,000+
                        </div>
                        <div class="text-lg font-medium text-[#eebf35]">
                            Active Listings
                        </div>
                        <img src="{{ asset('images/house.png') }}" alt="" class="absolute right-0 -bottom-4">
                    </div>
                    <div class="relative flex flex-col gap-2 px-5 py-3 rounded-lg bg-white h-fit overflow-hidden">
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
            <div>
                <img src="{{ asset('images/aboutus-img1.png') }}" alt="" class="h-auto w-auto">
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-3 bg-white py-20 items-center px-3">
            <img src="{{ asset('images/aboutus-img2.png') }}" alt="" class="h-auto w-auto rounded-3xl">
            <div class="flex flex-col gap-10 text-[#25464b] w-full">
                <span class="text-4xl leading-snug font-medium">
                    Commited to Making Property Ownership Simple and Reliable
                </span>
                <div class="grid grid-cols-3 gap-8">
                    <div class="col-span-1 flex flex-col gap-5 items-center text-center justify-center">
                        <img src="{{ asset('images/best-award.png') }}" alt="" class="w-auto h-auto">
                        <span class="text-xl font-light"> Best Award </span>
                        <span class="font-medium text-nowrap">ACHIEVED 850+ CLIENTS</span>
                    </div>
                    <div class="flex flex-col gap-7 col-span-2">
                        <div class="flex flex-col gap-2">
                            <span class="font-bold text-3xl">Our Mission</span>
                            <span class="leading-relaxed">To deliver long term value and exceptional service to discerning
                                investors, partners and homeowners.</span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <span class="font-bold text-3xl">Our Vision</span>
                            <span class="leading-relaxed">To be the leading name in premium real estate where smart
                                investments create lasting prestige and value.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full flex items-center justify-center">
                <img src="{{ asset('images/aboutus-img3.png') }}" alt="" class="w-[30rem] h-auto rounded-3xl">
            </div>
        </div>

        <div class="container mx-auto py-20">
            <div class="grid grid-cols-2 gap-10">
                <div
                    class="flex text-[#25464b] flex-col gap-5 items-center self-start justify-center w-auto lg:sticky lg:top-[10rem] lg:items-start lg:justify-start lg:w-full lg:h-fit">
                    <span class=" text-4xl font-bold">
                        Our Core Values
                    </span>
                    <span class="leading-relaxed">
                        At ListIn Here, our core values define who we are and how we work. They serve as the foundation of
                        every connection we build, every property we list, and every service we deliver. Rooted in
                        integrity, driven by innovation, and focused on our clients’ success — these values inspire us to
                        continuously create meaningful real estate experiences and lasting trust with every transaction.
                    </span>
                </div>
                <div class="grid grid-cols-1 text-[#25464b] lg:grid-cols-2 gap-5">
                    <div class="flex flex-col text-center items-center justify-center gap-4 p-5 bg-white rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="text-[#edbb28] size-12">
                            <g fill="none">
                                <path
                                    d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                <path fill="currentColor"
                                    d="m12.702 2.195l7 2.625A2 2 0 0 1 21 6.693v5.363a9 9 0 0 1-4.975 8.05l-3.354 1.676a1.5 1.5 0 0 1-1.342 0l-3.354-1.677A9 9 0 0 1 3 12.055V6.694A2 2 0 0 1 4.298 4.82l7-2.625a2 2 0 0 1 1.404 0M12 8a1 1 0 0 0-.993.883L11 9v2H9a1 1 0 0 0-.117 1.993L9 13h2v2a1 1 0 0 0 1.993.117L13 15v-2h2a1 1 0 0 0 .117-1.993L15 11h-2V9a1 1 0 0 0-1-1" />
                            </g>
                        </svg>
                        <span class="text-4xl font-bold">Integrity</span>
                        <span class="leading-relaxed">
                            We believe in honesty and transparency in every transaction — building lasting relationships
                            based on trust and fairness.
                        </span>
                    </div>
                    <div class="flex flex-col text-center items-center justify-center gap-4 p-5 bg-white rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="text-[#edbb28] size-12">
                            <path fill="currentColor"
                                d="M225.86 102.82c-3.77-3.94-7.67-8-9.14-11.57c-1.36-3.27-1.44-8.69-1.52-13.94c-.15-9.76-.31-20.82-8-28.51s-18.75-7.85-28.51-8c-5.25-.08-10.67-.16-13.94-1.52c-3.56-1.47-7.63-5.37-11.57-9.14C146.28 23.51 138.44 16 128 16s-18.27 7.51-25.18 14.14c-3.94 3.77-8 7.67-11.57 9.14c-3.25 1.36-8.69 1.44-13.94 1.52c-9.76.15-20.82.31-28.51 8s-7.8 18.75-8 28.51c-.08 5.25-.16 10.67-1.52 13.94c-1.47 3.56-5.37 7.63-9.14 11.57C23.51 109.72 16 117.56 16 128s7.51 18.27 14.14 25.18c3.77 3.94 7.67 8 9.14 11.57c1.36 3.27 1.44 8.69 1.52 13.94c.15 9.76.31 20.82 8 28.51s18.75 7.85 28.51 8c5.25.08 10.67.16 13.94 1.52c3.56 1.47 7.63 5.37 11.57 9.14c6.9 6.63 14.74 14.14 25.18 14.14s18.27-7.51 25.18-14.14c3.94-3.77 8-7.67 11.57-9.14c3.27-1.36 8.69-1.44 13.94-1.52c9.76-.15 20.82-.31 28.51-8s7.85-18.75 8-28.51c.08-5.25.16-10.67 1.52-13.94c1.47-3.56 5.37-7.63 9.14-11.57c6.63-6.9 14.14-14.74 14.14-25.18s-7.51-18.27-14.14-25.18m-52.2 6.84l-56 56a8 8 0 0 1-11.32 0l-24-24a8 8 0 0 1 11.32-11.32L112 148.69l50.34-50.35a8 8 0 0 1 11.32 11.32" />
                        </svg>
                        <span class="text-4xl font-bold">Commitment</span>
                        <span class="leading-relaxed">
                            We are dedicated to serving our clients with consistency, reliability, and genuine care — from
                            first inquiry to final handover.
                        </span>
                    </div>
                    <div class="flex flex-col text-center items-center justify-center gap-4 p-5 bg-white rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="text-[#edbb28] size-12">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M12 16a7 7 0 1 0 0-14a7 7 0 0 0 0 14m0-10c-.284 0-.474.34-.854 1.023l-.098.176c-.108.194-.162.29-.246.354c-.085.064-.19.088-.4.135l-.19.044c-.738.167-1.107.25-1.195.532s.164.577.667 1.165l.13.152c.143.167.215.25.247.354s.021.215 0 .438l-.02.203c-.076.785-.114 1.178.115 1.352c.23.174.576.015 1.267-.303l.178-.082c.197-.09.295-.135.399-.135s.202.045.399.135l.178.082c.691.319 1.037.477 1.267.303s.191-.567.115-1.352l-.02-.203c-.021-.223-.032-.334 0-.438s.104-.187.247-.354l.13-.152c.503-.588.755-.882.667-1.165c-.088-.282-.457-.365-1.195-.532l-.19-.044c-.21-.047-.315-.07-.4-.135c-.084-.064-.138-.16-.246-.354l-.098-.176C12.474 6.34 12.284 6 12 6"
                                clip-rule="evenodd" />
                            <path fill="currentColor"
                                d="M4.495 12.995L2.992 14.55c-.54.56-.81.839-.904 1.076c-.213.54-.03 1.138.433 1.422c.204.124.57.163 1.305.24c.414.044.622.066.795.133c.389.149.69.462.835.864c.064.18.085.394.127.823c.075.76.113 1.14.233 1.351c.274.48.853.669 1.374.448c.228-.096.498-.376 1.039-.935l2.482-2.57a8.5 8.5 0 0 1-6.216-4.408m8.795 4.409l2.482 2.57c.54.56.81.839 1.038.936c.521.22 1.1.031 1.374-.449c.12-.21.157-.59.232-1.35c.043-.43.064-.644.128-.824c.144-.402.446-.715.835-.864c.173-.067.38-.088.795-.132c.734-.078 1.101-.117 1.305-.241c.463-.284.646-.883.433-1.422c-.094-.237-.364-.517-.904-1.076l-1.503-1.556a8.5 8.5 0 0 1-6.216 4.408" />
                        </svg>
                        <span class="text-4xl font-bold">Excellence</span>
                        <span class="leading-relaxed">
                            We strive to deliver the highest quality of service, ensuring every listing, detail, and
                            experience meets professional standards.
                        </span>
                    </div>
                    <div class="flex flex-col text-center items-center justify-center gap-4 p-5 bg-white rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="text-[#edbb28] size-12">
                            <path fill="currentColor"
                                d="M12.754 2.305a.75.75 0 0 0-1.5 0v1.48a.75.75 0 0 0 1.5 0zm5.111 7.99a5.9 5.9 0 0 0-1.11-2.22a6 6 0 0 0-1.91-1.59a6.2 6.2 0 0 0-2.38-.69a6 6 0 0 0-2.46.33a6 6 0 0 0-2.13 1.29a6.2 6.2 0 0 0-1.43 2a6 6 0 0 0-.49 2.43a6.09 6.09 0 0 0 2.41 5l.35.33c.3.31.3.31.29 1v.32a1.6 1.6 0 0 0 .1.65c.07.222.194.425.36.59q.114.117.25.21v1a1.38 1.38 0 0 0 1.26 1.5h2a1.39 1.39 0 0 0 1.27-1.5v-1a1.6 1.6 0 0 0 .25-.21c.157-.166.277-.364.35-.58a1.7 1.7 0 0 0 .1-.66v-.37c0-.55 0-.55.31-.9l.38-.35a6.17 6.17 0 0 0 2.33-4.07a5.9 5.9 0 0 0-.1-2.51m-5.07 10.63h-1.58v-.63h1.58zm-.79-10.56a1.23 1.23 0 0 0-1.23 1.23a1 1 0 1 1-2 0a3.21 3.21 0 0 1 3.23-3.23a1 1 0 0 1 0 2m9.16 2.5h-1.83a.75.75 0 0 1 0-1.5h1.83a.75.75 0 1 1 0 1.5m-3.68-6.01a.74.74 0 0 1-.53-.22a.75.75 0 0 1 0-1.06l1.3-1.3a.75.75 0 0 1 1.06 1.06l-1.3 1.3a.73.73 0 0 1-.53.22m2.3 12.44a.8.8 0 0 1-.53-.22l-1.3-1.3a.75.75 0 0 1 .242-1.226a.74.74 0 0 1 .818.166l1.3 1.3a.74.74 0 0 1 0 1.06a.75.75 0 0 1-.53.22M6.535 6.855a.75.75 0 0 1-.53-.22l-1.3-1.3a.753.753 0 1 1 1.07-1.06l1.29 1.3a.75.75 0 0 1-.53 1.28m-2.29 12.44a.7.7 0 0 1-.53-.22a.75.75 0 0 1 0-1.06l1.3-1.3a.75.75 0 0 1 1.06 1.06l-1.29 1.31a.8.8 0 0 1-.54.21m.42-6.43h-1.83a.75.75 0 1 1 0-1.5h1.83a.75.75 0 1 1 0 1.5" />
                        </svg>
                        <span class="text-4xl font-bold">Innovation</span>
                        <span class="leading-relaxed">
                            We embrace technology and creative solutions to make property searching easier, faster, and
                            smarter for everyone.
                        </span>
                    </div>
                    <div class="flex flex-col text-center items-center justify-center gap-4 p-5 bg-white rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="text-[#edbb28] size-12">
                            <g fill="none" fill-rule="evenodd">
                                <path
                                    d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                                <path fill="currentColor"
                                    d="M11 2a5 5 0 1 0 0 10a5 5 0 0 0 0-10m0 11c-2.395 0-4.575.694-6.178 1.672c-.8.488-1.484 1.064-1.978 1.69C2.358 16.976 2 17.713 2 18.5c0 .845.411 1.511 1.003 1.986c.56.45 1.299.748 2.084.956C6.665 21.859 8.771 22 11 22q.346 0 .685-.005a1 1 0 0 0 .89-1.428A6 6 0 0 1 12 18c0-1.252.383-2.412 1.037-3.373a1 1 0 0 0-.72-1.557Q11.671 13 11 13m7.864.997a1 1 0 0 0-1.728 0l-.91 1.562l-1.766.382a1 1 0 0 0-.534 1.644l1.204 1.348l-.182 1.798a1 1 0 0 0 1.398 1.016l1.654-.73l1.654.73a1 1 0 0 0 1.398-1.016l-.182-1.799l1.204-1.347a1 1 0 0 0-.534-1.644l-1.766-.382z" />
                            </g>
                        </svg>
                        <span class="text-4xl font-bold">Customer Focus</span>
                        <span class="leading-relaxed">
                            We listen, understand, and tailor our services to meet the unique needs of every client —
                            because your success is our priority.
                        </span>
                    </div>
                    <div class="flex flex-col text-center items-center justify-center gap-4 p-5 bg-white rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="text-[#edbb28] size-12">
                            <path fill="currentColor"
                                d="m254.3 107.91l-25.52-51.06a16 16 0 0 0-21.47-7.15l-24.87 12.43l-52.39-13.86a8.14 8.14 0 0 0-4.1 0L73.56 62.13L48.69 49.7a16 16 0 0 0-21.47 7.15L1.7 107.9a16 16 0 0 0 7.15 21.47l27 13.51l55.49 39.63a8.1 8.1 0 0 0 2.71 1.25l64 16a8 8 0 0 0 7.6-2.1l40-40l15.08-15.08l26.42-13.21a16 16 0 0 0 7.15-21.46m-54.89 33.37L165 113.72a8 8 0 0 0-10.68.61C136.51 132.27 116.66 130 104 122l43.24-42h31.81l27.21 54.41Zm-41.87 41.86l-58.12-14.53l-49.2-35.14l28-56L128 64.28l9.8 2.59l-45 43.68l-.08.09a16 16 0 0 0 2.72 24.81c20.56 13.13 45.37 11 64.91-5L188 152.66Zm-25.72 34.8a8 8 0 0 1-7.75 6.06a8 8 0 0 1-1.95-.24l-41.71-10.43a7.9 7.9 0 0 1-2.71-1.25l-26.35-18.82a8 8 0 0 1 9.3-13l25.11 17.94L126 208.24a8 8 0 0 1 5.82 9.7" />
                        </svg>
                        <span class="text-4xl font-bold">Collaboration</span>
                        <span class="leading-relaxed">
                            We work hand in hand with trusted partners, developers, and clients to create a network that
                            supports real estate growth nationwide.
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
