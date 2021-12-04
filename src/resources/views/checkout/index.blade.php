@extends('layouts.base')
    @section('content')
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <div class="bg-gray-50">
        <div
            class="max-w-2xl px-4 pt-16 pb-24 mx-auto sm:px-6 lg:max-w-7xl lg:px-8"
        >
            <h2 class="sr-only">Pemesanan Barang</h2>

            <form
                method = "POST"
                action="{{route('checkout.store')}}"
                class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16"
            >
                @csrf
                <div>
                    <div>
                        <h2 class="text-lg font-medium text-gray-900">
                            Informasi Pengiriman
                        </h2>

                        <div
                            class="grid grid-cols-1 mt-4 gap-y-6 sm:grid-cols-2 sm:gap-x-4"
                        >
                            <div class="sm:col-span-2">
                                <label
                                    for="name"
                                    class="block text-sm font-medium text-gray-700"
                                    >Nama</label
                                >
                                <div class="mt-1">
                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        value="{{$user->name}}"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-cerise-500 focus:border-cerise-500 sm:text-sm"
                                    />
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label
                                    for="address"
                                    class="block text-sm font-medium text-gray-700"
                                    >Alamat</label
                                >
                                <div class="mt-1">
                                    <input
                                        type="text"
                                        name="address"
                                        id="address"
                                        value="{{$user->address}}"
                                        autocomplete="street-address"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-cerise-500 focus:border-cerise-500 sm:text-sm"
                                    />
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label
                                    for="phone"
                                    class="block text-sm font-medium text-gray-700"
                                    >Phone</label
                                >
                                <div class="mt-1">
                                    <input
                                        type="text"
                                        name="phone"
                                        id="phone"
                                        value="{{$user->phone}}"
                                        autocomplete="tel"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-cerise-500 focus:border-cerise-500 sm:text-sm"
                                    />
                                </div>
                            </div>

                            <select
                                id="id_city"
                                name="id_city"
                                autocomplete="id_city"
                                required
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            >
                            @foreach($cities as $city)                         
                                <option value={{$city->id}}
                                    @if ($city->id == $user->id_city)
                                        selected="selected"
                                    @endif
                                    >{{ $city->name }}</option>
                            @endforeach
                            </select>

                            <div>
                                <label
                                    for="zip"
                                    class="block text-sm font-medium text-gray-700"
                                    >Kode Pos</label
                                >
                                <div class="mt-1">
                                    <input
                                        type="text"
                                        name="zip"
                                        id="zip"
                                        value="{{$user->zip}}"
                                        autocomplete="zip"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-cerise-500 focus:border-cerise-500 sm:text-sm"
                                    />
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label
                                    for="note"
                                    class="block text-sm font-medium text-gray-700"
                                    >Catatan</label
                                >
                                <div class="mt-1">
                                    <input
                                        type="text"
                                        name="note"
                                        id="note"
                                        placeholder="opsional"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-cerise-500 focus:border-cerise-500 sm:text-sm"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment -->
                    <div class="pt-10 mt-10 border-t border-gray-200">
                        <h2 class="text-lg font-medium text-gray-900">
                            Tipe Pembayaran
                        </h2>

                        <fieldset class="mt-4">
                            <legend class="sr-only">
                                Tipe Pembayaran
                            </legend>
                            <div
                                class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10"
                            >
                                <div class="flex items-center">
                                    <input
                                        id="gopay"
                                        name="payment"
                                        type="radio"
                                        value=2
                                        checked
                                        class="w-4 h-4 border-gray-300 text-cerise-600 focus:ring-cerise-500"
                                    />
                                    <label
                                        for="gopay"
                                        class="block ml-3 text-sm font-medium text-gray-700"
                                    >
                                        Gopay
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="ovo"
                                        name="payment"
                                        type="radio"
                                        value=1
                                        class="w-4 h-4 border-gray-300 text-cerise-600 focus:ring-cerise-500"
                                    />
                                    <label
                                        for="ovo"
                                        class="block ml-3 text-sm font-medium text-gray-700"
                                    >
                                        OVO
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="bank"
                                        name="payment"
                                        type="radio"
                                        value=3
                                        class="w-4 h-4 border-gray-300 text-cerise-600 focus:ring-cerise-500"
                                    />
                                    <label
                                        for="bank"
                                        class="block ml-3 text-sm font-medium text-gray-700"
                                    >
                                        Virtual Account Bank
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <!-- Order summary -->
                <div class="mt-10 lg:mt-0">
                    <h2 class="text-lg font-medium text-gray-900">
                        Rangkuman Barang Belanja
                    </h2>

                    <div
                        class="mt-4 bg-white border border-gray-200 rounded-lg shadow-sm"
                    >
                        <h3 class="sr-only">Barang Belanjaan</h3>
                        <ul
                            role="list"
                            class="divide-y divide-gray-200"
                        >
                        @foreach($cart->productsCarts as $productCart)
                            <li class="flex px-4 py-6 sm:px-6">
                                <div class="flex-shrink-0">
                                    <img
                                        src="{{ asset('images/'.$productCart->product->image)}}"
                                        alt="Front of men&#039;s Basic Tee in black."
                                        class="w-20 rounded-md"
                                    />
                                </div>

                                <div class="flex flex-col flex-1 ml-6">
                                    <div class="flex">
                                        <div class="flex-1 min-w-0">
                                            <h4 class="text-sm">
                                                <a
                                                    href="#"
                                                    class="font-medium text-gray-700 hover:text-gray-800"
                                                >
                                                {{ $productCart->product->name }}
                                                </a>
                                            </h4>
                                            <p
                                                class="mt-1 text-sm text-gray-500"
                                            >
                                            x{{ $productCart->quantity}}
                                            </p>
                                        </div>
                                    </div>

                                    <div
                                        class="flex items-end justify-between flex-1 pt-2"
                                    >
                                        <p
                                            class="mt-1 text-sm font-medium text-gray-900"
                                        >
                                            Rp {{ $productCart->product->price }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                            <!-- More products... -->
                        </ul>
                        <dl
                            class="px-4 py-6 space-y-6 border-t border-gray-200 sm:px-6"
                        >
                            <div
                                class="flex items-center justify-between"
                            >
                                <dt class="text-sm">Subtotal</dt>
                                <dd
                                    class="text-sm font-medium text-gray-900"
                                >
                                    Rp {{ $cart->total }}
                                </dd>
                            </div>
                            <div
                                class="flex items-center justify-between"
                            >
                                <dt class="text-sm">Pengiriman</dt>
                                <dd
                                    class="text-sm font-medium text-gray-900"
                                >
                                    Rp 20.000
                                </dd>
                            </div>
                            <div
                                class="flex items-center justify-between"
                            >
                                <dt class="text-sm">Pajak</dt>
                                <dd
                                    class="text-sm font-medium text-gray-900"
                                >
                                @php
                                    $tax = $cart->total*10/100;
                                @endphp
                                    Rp {{ $tax }}
                                </dd>
                            </div>
                            <div
                                class="flex items-center justify-between pt-6 border-t border-gray-200"
                            >
                                <dt class="text-base font-medium">
                                    Total
                                </dt>
                                <dd
                                    class="text-base font-medium text-gray-900"
                                >
                                @php
                                    $total = $cart->total + 20000 + $tax;
                                @endphp
                                    Rp {{ $total }}
                                </dd>
                            </div>
                        </dl>
                        <input type="hidden" value={{$total}} name="total">
                        <div
                            class="px-4 py-6 border-t border-gray-200 sm:px-6"
                        >
                            <button
                                type="submit"
                                class="w-full px-4 py-3 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-cerise-600 hover:bg-cerise-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-cerise-500"
                            >
                                Pesan dan Bayar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @stop