@extends('layouts.base')
    @section('content')
        <!-- Hero -->
        <div class="flex flex-col border-b border-gray-200 lg:border-0">
            <nav aria-label="Offers" class="order-last lg:order-first">
                <div class="mx-auto max-w-7xl lg:px-8">
                    <ul
                        role="list"
                        class="grid grid-cols-1 divide-y divide-gray-200 lg:grid-cols-3 lg:divide-y-0 lg:divide-x"
                    >
                        <li class="flex flex-col">
                            <a
                                href="#"
                                class="relative flex flex-col justify-center flex-1 px-4 py-6 text-center bg-white focus:z-10"
                            >
                                <p class="text-sm text-gray-500">
                                    Promo Pengguna Baru
                                </p>
                                <p class="font-semibold text-gray-900">
                                    Dapatkan voucher senilai 1 Juta
                                    Rupiah
                                </p>
                            </a>
                        </li>

                        <li class="flex flex-col">
                            <a
                                href="#"
                                class="relative flex flex-col justify-center flex-1 px-4 py-6 text-center bg-white focus:z-10"
                            >
                                <p class="text-sm text-gray-500">
                                    Promo Akhir Tahun
                                </p>
                                <p class="font-semibold text-gray-900">
                                    Dapatkan potongan lebih dari 50%
                                </p>
                            </a>
                        </li>

                        <li class="flex flex-col">
                            <a
                                href="#"
                                class="relative flex flex-col justify-center flex-1 px-4 py-6 text-center bg-white focus:z-10"
                            >
                                <p class="text-sm text-gray-500">
                                    Ikuti berita dari kami
                                </p>
                                <p class="font-semibold text-gray-900">
                                    Dapatkan hadiah menarik dari undian
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="relative">
                <div
                    aria-hidden="true"
                    class="absolute hidden w-1/2 h-full bg-gray-100 lg:block"
                ></div>
                <div class="relative bg-gray-100 lg:bg-transparent">
                    <div
                        class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 lg:grid lg:grid-cols-2"
                    >
                        <div
                            class="max-w-2xl py-24 mx-auto lg:py-64 lg:max-w-none"
                        >
                            <div class="lg:pr-16">
                                <h1
                                    class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl xl:text-6xl"
                                >
                                    Surganya para gamers di Indonesia
                                </h1>
                                <p class="mt-4 text-xl text-gray-600">
                                    Kami Drakuli, hadir untuk para
                                    gamers di Indonesia dapat bisa
                                    menemukan games favorit yang mereka
                                    ingin mainkan.
                                </p>
                                <div class="mt-6">
                                    <a
                                        href="#"
                                        class="inline-block px-8 py-3 font-medium text-white border border-transparent rounded-md bg-cerise-600 hover:bg-cerise-700"
                                        >Lihat Katalog</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="w-full h-48 sm:h-64 lg:absolute lg:top-0 lg:right-0 lg:w-1/2 lg:h-full"
                >
                    <img
                        src="https://tailwindui.com/img/ecommerce-images/home-page-02-hero-half-width.jpg"
                        alt=""
                        class="object-cover object-center w-full h-full"
                    />
                </div>
            </div>
        </div>

        <!-- Trending products -->
        <section aria-labelledby="trending-heading" class="bg-white">
            <div
                class="py-16 sm:py-24 lg:max-w-7xl lg:mx-auto lg:py-32 lg:px-8"
            >
                <div
                    class="flex items-center justify-between px-4 sm:px-6 lg:px-0"
                >
                    <h2
                        id="trending-heading"
                        class="text-2xl font-extrabold tracking-tight text-gray-900"
                    >
                        Trending products
                    </h2>
                    <a
                        href="#"
                        class="hidden text-sm font-semibold text-cerise-6bg-cerise-600 sm:block hover:text-cerise-500"
                        >Lihat Semua Produk<span aria-hidden="true">
                            &rarr;</span
                        ></a
                    >
                </div>

                <div class="relative mt-8">
                    <div class="relative w-full overflow-x-auto">
                        <ul
                            role="list"
                            class="grid grid-cols-1 mx-4 space-x-8 sm:mx-6 lg:mx-0 lg:space-x-0 md:grid-cols-3 lg:grid-cols-4 gap-x-8"
                        >
                            @foreach ($products as $product)
                            <li
                                class="inline-flex flex-col text-center lg:w-auto"
                            >
                                <div class="relative group">
                                    <div
                                        class="w-full overflow-hidden bg-gray-200 rounded-md aspect-w-1 aspect-h-1"
                                    >
                                        <img
                                            src="{{asset('images/'.$product->image)}}"
                                            alt="Black machined steel pen with hexagonal grip and small white logo at top."
                                            class="object-cover object-center w-full h-full group-hover:opacity-75"
                                        />
                                    </div>
                                    <div class="mt-6">
                                        <p
                                            class="text-sm text-gray-500"
                                        >
                                            {{ $product->productCategory->name }}
                                        </p>
                                        <h3
                                            class="mt-1 font-semibold text-gray-900"
                                        >
                                            <a href="#">
                                                <span
                                                    class="absolute inset-0"
                                                ></span>
                                                {{ $product->name }}
                                            </a>
                                        </h3>
                                        <p class="mt-1 text-gray-900">
                                            Rp {{ $product->price }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="px-4 mt-12 sm:hidden">
                    <a
                        href="#"
                        class="text-sm font-semibold text-cerise-6bg-cerise-600 hover:text-cerise-500"
                        >See everything<span aria-hidden="true">
                            &rarr;</span
                        ></a
                    >
                </div>
            </div>
        </section>

        <!-- Collections -->
        <section
            aria-labelledby="collections-heading"
            class="bg-gray-100"
        >
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="max-w-2xl py-16 mx-auto sm:py-24 lg:py-32 lg:max-w-none"
                >
                    <h2
                        id="collections-heading"
                        class="text-2xl font-extrabold text-gray-900"
                    >
                        Koleksi Kami
                    </h2>

                    <div
                        class="mt-6 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-6"
                    >
                        <div class="relative group">
                            <div
                                class="relative w-full overflow-hidden bg-white rounded-lg h-80 group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1"
                            >
                                <img
                                    src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-01.jpg"
                                    alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug."
                                    class="object-cover object-center w-full h-full"
                                />
                            </div>
                            <h3 class="mt-6 text-sm text-gray-500">
                                <a href="#">
                                    <span
                                        class="absolute inset-0"
                                    ></span>
                                    Games dan Console
                                </a>
                            </h3>
                            <p
                                class="text-base font-semibold text-gray-900"
                            >
                                Alat dan Games dari Console maupun PC
                            </p>
                        </div>

                        <div class="relative group">
                            <div
                                class="relative w-full overflow-hidden bg-white rounded-lg h-80 group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1"
                            >
                                <img
                                    src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-02.jpg"
                                    alt="Wood table with porcelain mug, leather journal, brass pen, leather key ring, and a houseplant."
                                    class="object-cover object-center w-full h-full"
                                />
                            </div>
                            <h3 class="mt-6 text-sm text-gray-500">
                                <a href="#">
                                    <span
                                        class="absolute inset-0"
                                    ></span>
                                    Accessories
                                </a>
                            </h3>
                            <p
                                class="text-base font-semibold text-gray-900"
                            >
                                Alat pelengkap permainanmu
                            </p>
                        </div>

                        <div class="relative group">
                            <div
                                class="relative w-full overflow-hidden bg-white rounded-lg h-80 group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1"
                            >
                                <img
                                    src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-03.jpg"
                                    alt="Collection of four insulated travel bottles on wooden shelf."
                                    class="object-cover object-center w-full h-full"
                                />
                            </div>
                            <h3 class="mt-6 text-sm text-gray-500">
                                <a href="#">
                                    <span
                                        class="absolute inset-0"
                                    ></span>
                                    Miniature
                                </a>
                            </h3>
                            <p
                                class="text-base font-semibold text-gray-900"
                            >
                                Karakter figur dari games kesayangan
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sale and testimonials -->
        <div class="relative overflow-hidden">
            <!-- Decorative background image and gradient -->
            <div aria-hidden="true" class="absolute inset-0">
                <div
                    class="absolute inset-0 mx-auto overflow-hidden max-w-7xl xl:px-8"
                >
                    <img
                        src="https://tailwindui.com/img/ecommerce-images/home-page-02-sale-full-width.jpg"
                        alt=""
                        class="object-cover object-center w-full h-full"
                    />
                </div>
                <div
                    class="absolute inset-0 bg-white bg-opacity-75"
                ></div>
                <div
                    class="absolute inset-0 bg-gradient-to-t from-white via-white"
                ></div>
            </div>

            <!-- Sale -->
            <section
                aria-labelledby="sale-heading"
                class="relative flex flex-col items-center px-4 pt-32 mx-auto text-center max-w-7xl sm:px-6 lg:px-8"
            >
                <div class="max-w-2xl mx-auto lg:max-w-none">
                    <h2
                        id="sale-heading"
                        class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl lg:text-6xl"
                    >
                        Dapatkan Promo Menarik Seumur Hidup
                    </h2>
                    <p
                        class="max-w-xl mx-auto mt-4 text-xl text-gray-600"
                    >
                        Produk dari toko kami sangat terbatas, buruan
                        daftar untuk mendapatkan produk limited-edition.
                    </p>
                    <a
                        href="#"
                        class="inline-block w-full px-8 py-3 mt-6 font-medium text-white bg-gray-900 border border-transparent rounded-md hover:bg-gray-800 sm:w-auto"
                        >Dapatkan Promo Menarik</a
                    >
                </div>
            </section>

            <!-- Testimonials -->
            <section
                aria-labelledby="testimonial-heading"
                class="relative px-4 py-24 mx-auto max-w-7xl sm:px-6 lg:py-32 lg:px-8"
            >
                <div class="max-w-2xl mx-auto lg:max-w-none">
                    <h2
                        id="testimonial-heading"
                        class="text-2xl font-extrabold tracking-tight text-gray-900"
                    >
                        Apa Kata Orang?
                    </h2>

                    <div
                        class="mt-16 space-y-16 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-8"
                    >
                        <blockquote class="sm:flex lg:block">
                            <svg
                                width="24"
                                height="18"
                                viewBox="0 0 24 18"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                                class="flex-shrink-0 text-gray-300"
                            >
                                <path
                                    d="M0 18h8.7v-5.555c-.024-3.906 1.113-6.841 2.892-9.68L6.452 0C3.188 2.644-.026 7.86 0 12.469V18zm12.408 0h8.7v-5.555C21.083 8.539 22.22 5.604 24 2.765L18.859 0c-3.263 2.644-6.476 7.86-6.451 12.469V18z"
                                    fill="currentColor"
                                />
                            </svg>
                            <div
                                class="mt-8 sm:mt-0 sm:ml-6 lg:mt-10 lg:ml-0"
                            >
                                <p class="text-lg text-gray-600">
                                    Wahhh pelayanan disini cepat, produk
                                    dikirim dengan kemasan yang rapi,
                                    top deh drakuli!
                                </p>
                                <cite
                                    class="block mt-4 not-italic font-semibold text-gray-900"
                                >
                                    Nam Do Shaq, J-Town
                                </cite>
                            </div>
                        </blockquote>

                        <blockquote class="sm:flex lg:block">
                            <svg
                                width="24"
                                height="18"
                                viewBox="0 0 24 18"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                                class="flex-shrink-0 text-gray-300"
                            >
                                <path
                                    d="M0 18h8.7v-5.555c-.024-3.906 1.113-6.841 2.892-9.68L6.452 0C3.188 2.644-.026 7.86 0 12.469V18zm12.408 0h8.7v-5.555C21.083 8.539 22.22 5.604 24 2.765L18.859 0c-3.263 2.644-6.476 7.86-6.451 12.469V18z"
                                    fill="currentColor"
                                />
                            </svg>
                            <div
                                class="mt-8 sm:mt-0 sm:ml-6 lg:mt-10 lg:ml-0"
                            >
                                <p class="text-lg text-gray-600">
                                    Wahhh pelayanan disini cepat, produk
                                    dikirim dengan kemasan yang rapi,
                                    top deh drakuli!
                                </p>
                                <cite
                                    class="block mt-4 not-italic font-semibold text-gray-900"
                                >
                                    Mamang Ubay, Warkop Tangerang
                                </cite>
                            </div>
                        </blockquote>

                        <blockquote class="sm:flex lg:block">
                            <svg
                                width="24"
                                height="18"
                                viewBox="0 0 24 18"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                                class="flex-shrink-0 text-gray-300"
                            >
                                <path
                                    d="M0 18h8.7v-5.555c-.024-3.906 1.113-6.841 2.892-9.68L6.452 0C3.188 2.644-.026 7.86 0 12.469V18zm12.408 0h8.7v-5.555C21.083 8.539 22.22 5.604 24 2.765L18.859 0c-3.263 2.644-6.476 7.86-6.451 12.469V18z"
                                    fill="currentColor"
                                />
                            </svg>
                            <div
                                class="mt-8 sm:mt-0 sm:ml-6 lg:mt-10 lg:ml-0"
                            >
                                <p class="text-lg text-gray-600">
                                    Wahhh pelayanan here so fast gais,
                                    and packaging dikemas dengan rapi!
                                </p>
                                <cite
                                    class="block mt-4 not-italic font-semibold text-gray-900"
                                >
                                    Aji Gaul, South Jekardah
                                </cite>
                            </div>
                        </blockquote>
                    </div>
                </div>
            </section>
        </div>
    @stop