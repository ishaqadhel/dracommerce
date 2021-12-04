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
                    @foreach($cart->productsCarts as $productCart)
                        <li class="flex py-6 sm:py-10">
                            <div class="flex-shrink-0">
                                <img
                                    src="{{ asset('images/'.$productCart->product->image)}}"
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
                                                    {{ $productCart->product->name }}
                                                </a>
                                            </h3>
                                            <p
                                                class="mt-1 text-sm text-gray-500"
                                            >
                                                {{ $productCart->product->productCategory->name }}
                                            </p>
                                        </div>

                                        <p
                                            class="text-sm font-medium text-right text-gray-900"
                                        >
                                            Rp {{ $productCart->product->price }}
                                        </p>
                                    </div>

                                    <div
                                        class="flex items-center mt-4 sm:block sm:absolute sm:top-0 sm:left-1/2 sm:mt-0"
                                    >
                                        <label
                                            for="quantity"
                                            class="sr-only"
                                            >Quantity, Nomad
                                            Tumbler</label
                                        >
                                        <select
                                            id="quantity"
                                            name="quantity"
                                            readonly
                                            class="block max-w-full rounded-md border border-gray-300 py-1.5 text-base leading-5 font-medium text-gray-700 text-left shadow-sm focus:outline-none focus:ring-1 focus:ring-cerise-500 focus:border-cerise-500 sm:text-sm"
                                        >
                                            <option>{{ $productCart->quantity }}</option>
                                        </select>
                                        <form method="POST" action="{{ route('cart.removeItem', ['id' => $productCart->product->id]) }}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button
                                                type="submit"
                                                class="ml-4 text-sm font-medium text-cerise-600 hover:text-cerise-500 sm:ml-0 sm:mt-3"
                                            >
                                                <span>Remove</span>
                                            </button>
                                        </form>
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
                    @endforeach
                    </ul>
                </div>

                <!-- Order summary -->
                <div class="mt-10">
                    <div class="mt-10">
                        <a href="{{route('checkout.index')}}">
                            <button
                                class="w-full px-4 py-3 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-cerise-600 hover:bg-cerise-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-cerise-500"
                            >
                                Pesan
                            </button>
                        </a>
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