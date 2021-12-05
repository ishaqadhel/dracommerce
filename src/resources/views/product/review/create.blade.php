@extends('layouts.base')
    @section('content')
    <div class="py-5 mx-auto space-y-6 lg:col-span-9 max-w-7xl sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-2 py-9 sm:px-0">
                    <h3 class="ml-10 text-lg font-medium leading-6 text-gray-900 ml">
                        Review
                    </h3>
                    <p class="mt-1 ml-10 text-sm text-gray-600">
                        Silahkan mengisi form berikut untuk memberi
                        Feedback atas pengalaman anda dengan produk kami
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{route('product.review.store')}}" method="POST">
                    @csrf
                    <div class="overflow-hidden shadow sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nama
                                        Produk</label>
                                    <input type="text" name="name" id="name" autocomplete="cc-given-name" readonly value="{{$product->name}}"
                                        class="block w-full px-3 py-2 mt-1 bg-gray-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="rating"
                                        class="block text-sm font-medium text-gray-700">Rating</label>
                                    <select id="rating" name="rating" autocomplete="rating"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cerise-500 focus:border-cerise-500 sm:text-sm">
                                        <option value=1 >1</option>
                                        <option value=2 >2</option>
                                        <option value=3 >3</option>
                                        <option value=4 >4</option>
                                        <option value=5 >5</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-10 sm:col-span-5">
                                    <label for="description"
                                        class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                    <textarea id="description" name="description" rows="5" required
                                        class="block w-full max-w-lg border border-gray-300 rounded-md shadow-sm focus:ring-cerise-500 focus:border-cerise-500 sm:text-sm"></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_product" value={{$product->id}} />
                        <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-cerise-600 hover:bg-cerise-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cerise-500">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @stop