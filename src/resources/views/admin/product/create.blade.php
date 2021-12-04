@extends('layouts.admin')
    @section('content')
        <div
            class="py-5 mx-auto space-y-6 lg:col-span-9 max-w-7xl sm:px-6 lg:px-8"
            >
            <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
                        <div>
                            <h3
                                class="text-lg font-medium leading-6 text-gray-900"
                            >
                                Tambah Produk
                            </h3>
                        </div>
                        <div class="col-span-3">
                            <label
                                class="block text-sm font-medium text-gray-700"
                            >
                                Foto Produk
                            </label>
                            <div
                                class="flex justify-center px-6 pt-5 pb-6 mt-1 border-2 border-gray-300 border-dashed rounded-md"
                            >
                                <div class="space-y-1 text-center">
                                    <svg
                                        class="w-12 h-12 mx-auto text-gray-400"
                                        stroke="currentColor"
                                        fill="none"
                                        viewBox="0 0 48 48"
                                        aria-hidden="true"
                                    >
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label
                                            for="image"
                                            class="relative font-medium bg-white rounded-md cursor-pointer text-cerise-600 hover:text-cerise-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-cerise-500"
                                        >
                                            <span>Upload a file</span>
                                            <input
                                                id="image"
                                                name="image"
                                                type="file"
                                                class="sr-only"
                                                accept="image/*"
                                            />
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        PNG, JPG up to 2MB
                                    </p>
                                </div>
                            </div>
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
                                    autocomplete="cc-given-name"
                                    required
                                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cerise-500 focus:border-cerise-500 sm:text-sm"
                                />
                            </div>

                            <div class="col-span-4 sm:col-span-2">
                                <label
                                    for="id_category"
                                    class="block text-sm font-medium text-gray-700"
                                    >Kategori</label
                                >
                                <select
                                    id="id_category"
                                    name="id_category"
                                    autocomplete="id_category"
                                    required
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cerise-500 focus:border-cerise-500 sm:text-sm"
                                >
                                    @foreach($categories as $category)
                                        <option value={{ $category->id }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-span-4 sm:col-span-2">
                                <label
                                    for="description"
                                    class="block text-sm font-medium text-gray-700"
                                    >Deskripsi</label
                                >
                                <input
                                    type="text"
                                    name="description"
                                    id="description"
                                    autocomplete="description"
                                    required
                                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cerise-500 focus:border-cerise-500 sm:text-sm"
                                />
                            </div>

                            <div class="col-span-4 sm:col-span-2">
                                <label
                                    for="stock"
                                    class="block text-sm font-medium text-gray-700"
                                    >Stok</label
                                >
                                <input
                                    type="number"
                                    name="stock"
                                    id="stock"
                                    autocomplete="stock"
                                    required
                                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cerise-500 focus:border-cerise-500 sm:text-sm"
                                />
                            </div>

                            <div class="col-span-4 sm:col-span-2">
                                <label
                                    for="price"
                                    class="block text-sm font-medium text-gray-700"
                                    >Price</label
                                >
                                <input
                                    type="number"
                                    name="price"
                                    id="price"
                                    autocomplete="price"
                                    required
                                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cerise-500 focus:border-cerise-500 sm:text-sm"
                                />
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex justify-end px-4 py-3 space-x-2 text-right bg-gray-50 sm:px-6"
                    >
                        <a
                            href="{{route('admin.product.index')}}"
                            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-cerise-500 hover:bg-cerise-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cerise-500"
                        >
                            kembali
                        </a>
                        <button
                            type="submit"
                            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-gray-800 border border-transparent rounded-md shadow-sm hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
                        >
                            simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @stop