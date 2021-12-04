@extends('layouts.base')
    @section('content')
    <div>
        <main class="max-w-2xl px-4 mx-auto lg:max-w-7xl lg:px-8">
            <div class="pt-24 pb-10 border-b border-gray-200">
                <h1
                    class="text-4xl font-extrabold tracking-tight text-gray-900"
                >
                    Produk Kami
                </h1>
                <p class="mt-4 text-base text-gray-500">
                    Produk terbaik yang kami hadirkan untuk para gamers
                    di Indonesia.
                </p>
            </div>

            <div
                class="pt-12 pb-24 lg:grid lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4"
            >
                <aside>
                    <h2 class="sr-only">Filters</h2>

                    <!-- Mobile filter dialog toggle, controls the 'mobileFilterDialogOpen' state. -->
                    <button
                        type="button"
                        class="inline-flex items-center lg:hidden"
                    >
                        <span class="text-sm font-medium text-gray-700"
                            >Filters</span
                        >
                        <!-- Heroicon name: solid/plus-sm -->
                        <svg
                            class="flex-shrink-0 w-5 h-5 ml-1 text-gray-400"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </button>

                    <div class="hidden lg:block">
                        <form
                            class="space-y-10 divide-y divide-gray-200"
                        >
                            <div>
                                <fieldset>
                                    <legend
                                        class="block text-sm font-medium text-gray-900"
                                    >
                                        Harga
                                    </legend>
                                    <div class="pt-6 space-y-3">
                                        <div class="flex items-center">
                                            <input
                                                id="color-0"
                                                name="color[]"
                                                value="white"
                                                type="checkbox"
                                                class="w-4 h-4 border-gray-300 rounded text-cerise-600 focus:ring-cerise-500"
                                            />
                                            <label
                                                for="color-0"
                                                class="ml-3 text-sm text-gray-600"
                                            >
                                                Normal
                                            </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input
                                                id="color-1"
                                                name="color[]"
                                                value="beige"
                                                type="checkbox"
                                                class="w-4 h-4 border-gray-300 rounded text-cerise-600 focus:ring-cerise-500"
                                            />
                                            <label
                                                for="color-1"
                                                class="ml-3 text-sm text-gray-600"
                                            >
                                                Diskon
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="pt-10">
                                <fieldset>
                                    <legend
                                        class="block text-sm font-medium text-gray-900"
                                    >
                                        Kategori
                                    </legend>
                                    <div class="pt-6 space-y-3">
                                        <div class="flex items-center">
                                            <input
                                                id="category-0"
                                                name="category[]"
                                                value="new-arrivals"
                                                type="checkbox"
                                                class="w-4 h-4 border-gray-300 rounded text-cerise-600 focus:ring-cerise-500"
                                            />
                                            <label
                                                for="category-0"
                                                class="ml-3 text-sm text-gray-600"
                                            >
                                                Aksesoris
                                            </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input
                                                id="category-1"
                                                name="category[]"
                                                value="tees"
                                                type="checkbox"
                                                class="w-4 h-4 border-gray-300 rounded text-cerise-600 focus:ring-cerise-500"
                                            />
                                            <label
                                                for="category-1"
                                                class="ml-3 text-sm text-gray-600"
                                            >
                                                Permainan
                                            </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input
                                                id="category-2"
                                                name="category[]"
                                                value="crewnecks"
                                                type="checkbox"
                                                class="w-4 h-4 border-gray-300 rounded text-cerise-600 focus:ring-cerise-500"
                                            />
                                            <label
                                                for="category-2"
                                                class="ml-3 text-sm text-gray-600"
                                            >
                                                Figuran
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </form>
                    </div>
                </aside>

                <section
                    aria-labelledby="product-heading"
                    class="mt-6 lg:mt-0 lg:col-span-2 xl:col-span-3"
                >
                    <h2 id="product-heading" class="sr-only">
                        Products
                    </h2>

                    <div
                        class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8 xl:grid-cols-3"
                    >
                    @foreach($products as $product)
                        <div
                            class="relative flex flex-col overflow-hidden bg-white border border-gray-200 rounded-lg group"
                        >
                            <div
                                class="bg-gray-200 group-hover:opacity-75"
                            >
                                <img
                                    src="{{asset('images/'.$product->image)}}"
                                    alt="product-image"
                                    class="object-cover object-center w-full h-full sm:w-full sm:h-full"
                                />
                            </div>
                            <div
                                class="flex flex-col flex-1 p-4 space-y-2"
                            >
                                <h3
                                    class="text-sm font-medium text-gray-900"
                                >
                                    <a href="{{route('product.show', ['id' => $product->id])}}">
                                        <span
                                            aria-hidden="true"
                                            class="absolute inset-0"
                                        ></span>
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <p class="text-sm text-gray-500">
                                    {{ $product->description }}
                                </p>
                                <div
                                    class="flex flex-col justify-end flex-1"
                                >
                                @if($product->stock <= 0)
                                    <p
                                        class="text-sm italic text-red-500"
                                    >
                                        Barang tidak tersedia
                                    </p>
                                @else
                                    <p
                                        class="text-sm italic text-gray-500"
                                    >
                                        Tersisa {{ $product->stock }} barang
                                    </p>

                                    <p
                                        class="text-base font-medium text-gray-900"
                                    >
                                        Rp {{ $product->price }}
                                    </p>
                                @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </section>
            </div>
        </main>
    </div>
    @stop