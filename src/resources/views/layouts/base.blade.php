<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <title>Drakuli</title>
    </head>
    <body>
        <div class="bg-white">
            <header class="relative z-10">
                <nav aria-label="Top">
                    <!-- Top navigation -->
                    <div class="bg-gray-900">
                        <div
                            class="flex items-center justify-between h-10 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8"
                        >
                            <!-- Currency selector -->
                            <form class="hidden lg:block lg:flex-1">
                                <div class="flex">
                                    <label
                                        for="desktop-currency"
                                        class="sr-only"
                                        >Currency</label
                                    >
                                    <div
                                        class="relative -ml-2 bg-gray-900 border-transparent rounded-md group focus-within:ring-2 focus-within:ring-white"
                                    >
                                        <select
                                            id="desktop-currency"
                                            name="currency"
                                            class="bg-none bg-gray-900 border-transparent rounded-md py-0.5 pl-2 pr-5 flex items-center text-sm font-medium text-white group-hover:text-gray-100 focus:outline-none focus:ring-0 focus:border-transparent"
                                        >
                                            <option>IDR</option>
                                        </select>
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center pointer-events-none"
                                        >
                                            <svg
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 20 20"
                                                class="w-5 h-5 text-gray-300"
                                            >
                                                <path
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.5"
                                                    d="M6 8l4 4 4-4"
                                                />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <p
                                class="flex-1 text-sm font-medium text-center text-white lg:flex-none"
                            >
                                Dapatkan Voucher Gratis Ongkir Sampai 100%
                            </p>
                            @auth
                            <div
                                class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6"
                            >
                                <p
                                    href="{{ route('register') }}"
                                    class="text-sm font-medium text-white hover:text-gray-100"
                                >
                                    Hello, {{ auth()->user()->name }}
                                </p>
                                <span
                                    class="w-px h-6 bg-gray-600"
                                    aria-hidden="true"
                                ></span>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <p
                                        class="text-sm font-medium text-white cursor-pointer hover:text-gray-100"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                    >
                                        Keluar Akun
                                    </p>
                                </form>
                            </div>
                            @else     
                            <div
                                class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6"
                            >
                                <a
                                    href="{{ route('register') }}"
                                    class="text-sm font-medium text-white hover:text-gray-100"
                                    >Buat Akun</a
                                >
                                <span
                                    class="w-px h-6 bg-gray-600"
                                    aria-hidden="true"
                                ></span>
                                <a
                                    href="{{ route('login') }}"
                                    class="text-sm font-medium text-white hover:text-gray-100"
                                    >Masuk Akun</a
                                >
                            </div>
                            @endauth
                        </div>
                    </div>

                    <!-- Secondary navigation -->
                    <div class="bg-white">
                        <div class="border-b border-gray-200">
                            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                                <div
                                    class="flex items-center justify-between h-16"
                                >
                                    <!-- Logo (lg+) -->
                                    <div class="hidden lg:flex lg:items-center">
                                        <a href="#">
                                            <span class="sr-only"
                                                >Workflow</span
                                            >
                                            <img
                                                class="w-auto h-8"
                                                src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600"
                                                alt=""
                                            />
                                        </a>
                                    </div>

                                    <div class="hidden h-full lg:flex">
                                        <!-- Mega menus -->
                                        <div class="ml-8">
                                            <div
                                                class="flex justify-center h-full space-x-8"
                                            >
                                                <a
                                                    href="{{route('index')}}"
                                                    class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800"
                                                    >Beranda</a
                                                >
                                                <a
                                                    href="{{route('product.index')}}"
                                                    class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800"
                                                    >Katalog</a
                                                >
                                                @auth
                                                <a
                                                    href="{{route('order.index')}}"
                                                    class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800"
                                                    >Orderan Saya</a
                                                >
                                                    @if(auth()->user()->role == 2)
                                                    <a
                                                        href="{{route('admin.index')}}"
                                                        class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800"
                                                        >Admin Panel</a
                                                    >
                                                    @endif
                                                @endauth
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Mobile menu and search (lg-) -->
                                    <div
                                        class="flex items-center flex-1 lg:hidden"
                                    >
                                        <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
                                        <button
                                            type="button"
                                            class="p-2 -ml-2 text-gray-400 bg-white rounded-md"
                                        >
                                            <span class="sr-only"
                                                >Open menu</span
                                            >
                                            <!-- Heroicon name: outline/menu -->
                                            <svg
                                                class="w-6 h-6"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                aria-hidden="true"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M4 6h16M4 12h16M4 18h16"
                                                />
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Logo (lg-) -->
                                    <a href="#" class="lg:hidden">
                                        <span class="sr-only">Workflow</span>
                                        <img
                                            src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600"
                                            alt=""
                                            class="w-auto h-8"
                                        />
                                    </a>

                                    <div
                                        class="flex items-center justify-end flex-1"
                                    >
                                    @auth
                                        <div class="flex items-center lg:ml-8">
                                            <div class="flex space-x-8">
                                                <div class="flex">
                                                    <a
                                                        href="{{route('account.edit')}}"
                                                        class="p-2 -m-2 text-gray-400 hover:text-gray-500"
                                                    >
                                                        <span class="sr-only"
                                                            >Account</span
                                                        >
                                                        <!-- Heroicon name: outline/user -->
                                                        <svg
                                                            class="w-6 h-6"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke="currentColor"
                                                            aria-hidden="true"
                                                        >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                                            />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>

                                            <span
                                                class="w-px h-6 mx-4 bg-gray-200 lg:mx-6"
                                                aria-hidden="true"
                                            ></span>

                                            <div class="flow-root">
                                                <a
                                                    href="{{route('cart.index')}}"
                                                    class="flex items-center p-2 -m-2 group"
                                                >
                                                    <!-- Heroicon name: outline/shopping-cart -->
                                                    <svg
                                                        class="flex-shrink-0 w-6 h-6 text-gray-400 group-hover:text-gray-500"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke="currentColor"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                                                        />
                                                    </svg>
                                                    <span class="sr-only"
                                                        >items in cart, view
                                                        bag</span
                                                    >
                                                </a>
                                            </div>
                                        </div>
                                    @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <!-- Nav -->

            <!-- Isi Content Disini -->
            @yield('content')

            <!-- Footer -->
            <footer aria-labelledby="footer-heading" class="bg-white">
                <h2 id="footer-heading" class="sr-only">Footer</h2>
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="border-t border-gray-200 pt-7">
                        <div
                            class="lg:grid lg:grid-cols-2 lg:gap-x-6 xl:gap-x-8"
                        >
                            <div
                                class="flex items-center p-6 bg-gray-100 rounded-lg sm:p-10"
                            >
                                <div class="max-w-sm mx-auto">
                                    <h3 class="font-semibold text-gray-900">
                                        Jadi pelanggan setia kami
                                    </h3>
                                    <p class="mt-2 text-sm text-gray-500">
                                        Dapatkan berita tentang produk dan info
                                        menarik dari kami tiap minggunya.
                                    </p>
                                    <form class="mt-4 sm:mt-6 sm:flex">
                                        <label
                                            for="email-address"
                                            class="sr-only"
                                            >Alamat Email</label
                                        >
                                        <input
                                            id="email-address"
                                            type="text"
                                            autocomplete="email"
                                            required
                                            class="w-full min-w-0 px-4 py-2 text-base text-gray-900 placeholder-gray-500 bg-white border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:border-cerise-500 focus:ring-1 focus:ring-cerise-500"
                                        />
                                        <div
                                            class="mt-3 sm:flex-shrink-0 sm:mt-0 sm:ml-4"
                                        >
                                            <button
                                                type="submit"
                                                class="flex items-center justify-center w-full px-4 py-2 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-cerise-600 hover:bg-cerise-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-cerise-500"
                                            >
                                                Daftar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div
                                class="relative flex items-center px-6 py-12 mt-6 sm:py-16 sm:px-10 lg:mt-0"
                            >
                                <div
                                    class="absolute inset-0 overflow-hidden rounded-lg"
                                >
                                    <img
                                        src="https://tailwindui.com/img/ecommerce-images/footer-02-exclusive-sale.jpg"
                                        alt=""
                                        class="object-cover object-center w-full h-full filter saturate-0"
                                    />
                                    <div
                                        class="absolute inset-0 bg-cerise-600 bg-opacity-90"
                                    ></div>
                                </div>
                                <div
                                    class="relative max-w-sm mx-auto text-center"
                                >
                                    <h3
                                        class="text-2xl font-extrabold tracking-tight text-white"
                                    >
                                        Dapatkan Voucher Belanja
                                    </h3>
                                    <p class="mt-2 text-gray-200">
                                        Daftar untuk mendapatkan produk terbaru
                                        dari toko kami.
                                        <a
                                            href="#"
                                            class="font-bold text-white whitespace-nowrap hover:text-gray-200"
                                            >Lihat Selengkapnya<span
                                                aria-hidden="true"
                                            >
                                                &rarr;</span
                                            ></a
                                        >
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="py-10 md:flex md:items-center md:justify-between"
                    >
                        <div class="text-center md:text-left">
                            <p class="text-sm text-gray-500">
                                &copy; 2021 All Rights Reserved - MPPL E05
                            </p>
                        </div>

                        <div
                            class="flex items-center justify-center mt-4 md:mt-0"
                        >
                            <div class="flex space-x-8">
                                <a
                                    href="#"
                                    class="text-sm text-gray-500 hover:text-gray-600"
                                >
                                    Accessibility
                                </a>

                                <a
                                    href="#"
                                    class="text-sm text-gray-500 hover:text-gray-600"
                                >
                                    Privacy
                                </a>

                                <a
                                    href="#"
                                    class="text-sm text-gray-500 hover:text-gray-600"
                                >
                                    Terms
                                </a>
                            </div>

                            <div class="pl-6 ml-6 border-l border-gray-200">
                                <a
                                    href="#"
                                    class="flex items-center text-gray-500 hover:text-gray-600"
                                >
                                    <span class="ml-3 text-sm">
                                        Indonesia
                                    </span>
                                    <span class="sr-only"
                                        >location and currency</span
                                    >
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
