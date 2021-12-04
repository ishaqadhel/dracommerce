@extends('layouts.admin')
    @section('content')
    <div class='flex flex-col min-h-screen py-5 mx-auto max-w-7xl sm:px-6 lg:px-8'>
        <div class="py-5 my-10 border-b border-gray-200">
            <h1
                class="text-4xl font-extrabold tracking-tight text-gray-900"
            >
                Manajemen Produk
            </h1>
        </div>
        <div class='-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8'>
            <div class='inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8'>
                <div class='overflow-hidden border-b border-gray-200 shadow sm:rounded-lg'>
                    <table class='min-w-full divide-y divide-gray-200'>
                        <thead class='bg-gray-50'>
                            <tr>
                                <th
                                    scope='col'
                                    class='px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase'
                                >
                                    Nama
                                </th>
                                <th
                                    scope='col'
                                    class='px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase'
                                >
                                    Kategori
                                </th>
                                <th
                                    scope='col'
                                    class='px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase'
                                >
                                    Stok
                                </th>
                                <th
                                    scope='col'
                                    class='px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase'
                                >
                                    Harga
                                </th>
                                <th
                                    scope='col'
                                    class='relative px-6 py-3'
                                >
                                    <span class='sr-only'>
                                        Edit
                                    </span>
                                </th>
                                <th
                                    scope='col'
                                    class='relative px-6 py-3'
                                >
                                    <span class='sr-only'>
                                        Delete
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class='bg-white divide-y divide-gray-200'>
                            @foreach($products as $product)
                                <tr>
                                    <td class='px-6 py-4 whitespace-nowrap'>
                                        <div class='flex items-center'>
                                            <div class='flex-shrink-0 w-10 h-10'>
                                                <Img
                                                    class='w-10 h-10 rounded-full'
                                                    src="{{asset('images/'.$product->image)}}"
                                                    alt='product-image'
                                                    width={50}
                                                    height={50}
                                                />
                                            </div>
                                            <div class='ml-4'>
                                                <div class='text-sm font-medium text-gray-900'>
                                                    {{ $product->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class='px-6 py-4 whitespace-nowrap'>
                                        <div class='text-sm text-gray-500'>
                                            {{ $product->productCategory->name }}
                                        </div>
                                    </td>
                                    <td class='px-6 py-4 whitespace-nowrap'>
                                        <span class='inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full'>
                                            {{ $product->stock }}
                                        </span>
                                    </td>
                                    <td class='px-6 py-4 text-sm text-gray-500 whitespace-nowrap'>
                                        Rp {{ $product->price }}
                                    </td>
                                    <td class='px-6 py-4 text-sm font-medium text-right whitespace-nowrap'>
                                            <a 
                                                href='{{route('admin.product.edit', ['id' => $product->id])}}'
                                                class='text-indigo-600 hover:text-indigo-900'>
                                                Edit
                                            </a>
                                    </td>
                                    <td class='px-6 py-4 text-sm font-medium text-right whitespace-nowrap'>
                                        <form method="POST" action="{{ route('admin.product.destroy', ['id' => $product->id]) }}">
                                            @csrf
                                            <p
                                                class='text-red-600 cursor-pointer hover:text-red-900'
                                                onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                            >
                                                Delete
                                            </p>
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='my-5'>
            <a href={{route('admin.product.create')}}>
                <button
                    class='flex justify-center w-full px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-cerise-500 hover:bg-cerise-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cerise-500'
                >
                    Tambah Produk
                </button>
            </a>
        </div>
    </div>
    @stop