@extends('layouts.base')
    @section('content')
    <div class="py-5 mx-auto space-y-6 lg:col-span-9 max-w-7xl sm:px-6 lg:px-8">
        <section aria-labelledby="payment-details-heading">
            <form action="{{route('account.update')}}" method="POST">
                @csrf
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-6 bg-white sm:p-6">
                        <div>
                            <h2 id="payment-details-heading" class="text-lg font-medium leading-6 text-gray-900">
                                Profil Akun
                            </h2>
                        </div>

                        <div class="grid grid-cols-4 gap-6 mt-6">
                            <div class="col-span-4 sm:col-span-2">
                                <label
                                    for="name"
                                    class="block text-sm font-medium text-gray-700"
                                    >Nama</label
                                >
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    value={{$user->name}}
                                    autocomplete="cc-given-name"
                                    required
                                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                />
                            </div>

                            <div class="col-span-4 sm:col-span-2">
                                <label
                                    for="address"
                                    class="block text-sm font-medium text-gray-700"
                                    >Alamat</label
                                >
                                <input
                                    type="text"
                                    name="address"
                                    id="address"
                                    value={{$user->address}}
                                    autocomplete="address"
                                    required
                                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                />
                            </div>

                            <div class="col-span-4 sm:col-span-2">
                                <label
                                    for="phone"
                                    class="block text-sm font-medium text-gray-700"
                                    >Nomor Handphone</label
                                >
                                <input
                                    type="text"
                                    name="phone"
                                    id="phone"
                                    value={{$user->phone}}
                                    autocomplete="phone"
                                    required
                                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                />
                            </div>

                            <div class="col-span-4 sm:col-span-2">
                                <label
                                    for="id_city"
                                    class="block text-sm font-medium text-gray-700"
                                    >Kota</label
                                >
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
                            </div>

                            <div class="col-span-4 sm:col-span-2">
                                <label
                                    for="zip"
                                    class="block text-sm font-medium text-gray-700"
                                    >Kode Pos</label
                                >
                                <input
                                    type="text"
                                    name="zip"
                                    id="zip"
                                    value={{$user->zip}}
                                    autocomplete="zip"
                                    required
                                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                                />
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="flex justify-end px-4 py-3 space-x-2 text-right bg-gray-50 sm:px-6">
                        <a href="{{route('index')}}"
                            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-cerise-500 hover:bg-cerise-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                            kembali
                        </a>
                        <button type="submit"
                            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-gray-800 border border-transparent rounded-md shadow-sm hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                            simpan
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </div>
    @stop