@extends('layouts.base')
    @section('content')
    <div class="bg-white">
        <div
            class="px-4 py-16 mx-auto max-w-7xl sm:py-24 sm:px-6 lg:px-8"
        >
            <h1
                class="text-3xl font-extrabold tracking-tight text-gray-900"
            >
                Keranjang Belanja
            </h1>

            <form class="mt-12">
                <div>
                    <h2 class="sr-only">
                        Barang-barang yang ada dalam keranjang
                    </h2>

                    <ul
                        role="list"
                        class="border-t border-b border-gray-200 divide-y divide-gray-200"
                    >
                        <li class="flex py-6 sm:py-10">
                            <div class="flex-shrink-0">
                                <img
                                    src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-01-product-03.jpg"
                                    alt="Insulated bottle with white base and black snap lid."
                                    class="object-cover object-center w-24 h-24 rounded-lg sm:w-32 sm:h-32"
                                />
                            </div>

                            <div
                                class="relative flex flex-col justify-between flex-1 ml-4 sm:ml-6"
                            >
                                <div>
                                    <div
                                        class="flex justify-between sm:grid sm:grid-cols-2"
                                    >
                                        <div class="pr-6">
                                            <h3 class="text-sm">
                                                <a
                                                    href="#"
                                                    class="font-medium text-gray-700 hover:text-gray-800"
                                                >
                                                    Nomad Tumbler
                                                </a>
                                            </h3>
                                            <p
                                                class="mt-1 text-sm text-gray-500"
                                            >
                                                Aksesoris
                                            </p>
                                        </div>

                                        <p
                                            class="text-sm font-medium text-right text-gray-900"
                                        >
                                            Rp 350,000
                                        </p>
                                    </div>

                                    <div
                                        class="flex items-center mt-4 sm:block sm:absolute sm:top-0 sm:left-1/2 sm:mt-0"
                                    >
                                        <label
                                            for="quantity-0"
                                            class="sr-only"
                                            >Quantity, Nomad
                                            Tumbler</label
                                        >
                                        <select
                                            id="quantity-0"
                                            name="quantity-0"
                                            class="block max-w-full rounded-md border border-gray-300 py-1.5 text-base leading-5 font-medium text-gray-700 text-left shadow-sm focus:outline-none focus:ring-1 focus:ring-cerise-500 focus:border-cerise-500 sm:text-sm"
                                        >
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>

                                        <button
                                            type="button"
                                            class="ml-4 text-sm font-medium text-cerise-600 hover:text-cerise-500 sm:ml-0 sm:mt-3"
                                        >
                                            <span>Remove</span>
                                        </button>
                                    </div>
                                </div>

                                <p
                                    class="flex mt-4 space-x-2 text-sm text-gray-700"
                                >
                                    <!-- Heroicon name: solid/check -->
                                    <svg
                                        class="flex-shrink-0 w-5 h-5 text-green-500"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        aria-hidden="true"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    <span>Stok Tersedia</span>
                                </p>
                            </div>
                        </li>

                        <li class="flex py-6 sm:py-10">
                            <div class="flex-shrink-0">
                                <img
                                    src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-01-product-01.jpg"
                                    alt="Front of men&#039;s Basic Tee in sienna."
                                    class="object-cover object-center w-24 h-24 rounded-lg sm:w-32 sm:h-32"
                                />
                            </div>

                            <div
                                class="relative flex flex-col justify-between flex-1 ml-4 sm:ml-6"
                            >
                                <div>
                                    <div
                                        class="flex justify-between sm:grid sm:grid-cols-2"
                                    >
                                        <div class="pr-6">
                                            <h3 class="text-sm">
                                                <a
                                                    href="#"
                                                    class="font-medium text-gray-700 hover:text-gray-800"
                                                >
                                                    Basic Tee
                                                </a>
                                            </h3>
                                            <p
                                                class="mt-1 text-sm text-gray-500"
                                            >
                                                Sienna
                                            </p>

                                            <p
                                                class="mt-1 text-sm text-gray-500"
                                            >
                                                Large
                                            </p>
                                        </div>

                                        <p
                                            class="text-sm font-medium text-right text-gray-900"
                                        >
                                            $32.00
                                        </p>
                                    </div>

                                    <div
                                        class="flex items-center mt-4 sm:block sm:absolute sm:top-0 sm:left-1/2 sm:mt-0"
                                    >
                                        <label
                                            for="quantity-1"
                                            class="sr-only"
                                            >Quantity, Basic Tee</label
                                        >
                                        <select
                                            id="quantity-1"
                                            name="quantity-1"
                                            class="block max-w-full rounded-md border border-gray-300 py-1.5 text-base leading-5 font-medium text-gray-700 text-left shadow-sm focus:outline-none focus:ring-1 focus:ring-cerise-500 focus:border-cerise-500 sm:text-sm"
                                        >
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>

                                        <button
                                            type="button"
                                            class="ml-4 text-sm font-medium text-cerise-600 hover:text-cerise-500 sm:ml-0 sm:mt-3"
                                        >
                                            <span>Remove</span>
                                        </button>
                                    </div>
                                </div>

                                <p
                                    class="flex mt-4 space-x-2 text-sm text-gray-700"
                                >
                                    <!-- Heroicon name: solid/check -->
                                    <svg
                                        class="flex-shrink-0 w-5 h-5 text-green-500"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        aria-hidden="true"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    <span>In stock</span>
                                </p>
                            </div>
                        </li>

                        <!-- More products... -->
                    </ul>
                </div>

                <!-- Order summary -->
                <div class="mt-10">
                    <div
                        class="px-4 py-6 rounded-lg bg-gray-50 sm:p-6 lg:p-8"
                    >
                        <h2 class="sr-only">Order summary</h2>

                        <div class="flow-root">
                            <dl
                                class="-my-4 text-sm divide-y divide-gray-200"
                            >
                                <div
                                    class="flex items-center justify-between py-4"
                                >
                                    <dt class="text-gray-600">Total</dt>
                                    <dd
                                        class="font-medium text-gray-900"
                                    >
                                        Rp 99.00
                                    </dd>
                                </div>
                                <div
                                    class="flex items-center justify-between py-4"
                                >
                                    <dt class="text-gray-600">Pajak</dt>
                                    <dd
                                        class="font-medium text-gray-900"
                                    >
                                        Rp 8.32
                                    </dd>
                                </div>
                                <div
                                    class="flex items-center justify-between py-4"
                                >
                                    <dt
                                        class="text-base font-medium text-gray-900"
                                    >
                                        Order total
                                    </dt>
                                    <dd
                                        class="text-base font-medium text-gray-900"
                                    >
                                        Rp 112.32
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                    <div class="mt-10">
                        <button
                            type="submit"
                            class="w-full px-4 py-3 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-cerise-600 hover:bg-cerise-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-cerise-500"
                        >
                            Pesan
                        </button>
                    </div>

                    <div class="mt-6 text-sm text-center text-gray-500">
                        <p>
                            atau
                            <a
                                href="{{route('product.index')}}"
                                class="font-medium text-cerise-600 hover:text-cerise-500"
                                >Kembali Berbelanja<span
                                    aria-hidden="true"
                                >
                                    &rarr;</span
                                ></a
                            >
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @stop