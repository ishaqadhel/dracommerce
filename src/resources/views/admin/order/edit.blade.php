@extends('layouts.admin')
    @section('content')
    <div
    class="py-5 mx-auto space-y-6 lg:col-span-9 max-w-7xl sm:px-6 lg:px-8"
>
    <section aria-labelledby="payment-details-heading">
        <form action="{{route('admin.order.update', ['id' => $order->id])}}" method="POST">
            @csrf
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-6 bg-white sm:p-6">
                    <div>
                        <h2
                            id="payment-details-heading"
                            class="text-lg font-medium leading-6 text-gray-900"
                        >
                            Sunting Order
                        </h2>
                    </div>

                    <div class="grid grid-cols-4 gap-6 mt-6">
                        <div class="col-span-4 sm:col-span-2">
                            <label
                                for="invoice_number"
                                class="block text-sm font-medium text-gray-700"
                                >Nomor Invoice</label
                            >
                            <input
                                type="text"
                                name="invoice_number"
                                id="invoice_number"
                                value="INV-NUM-{{$order->id}}"
                                autocomplete="cc-given-invoice_number"
                                readonly
                                class="block w-full px-3 py-2 mt-1 bg-gray-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            />
                        </div>

                        <div class="col-span-4 sm:col-span-2">
                            <label
                                for="date"
                                class="block text-sm font-medium text-gray-700"
                                >Tanggal</label
                            >
                            <input
                                type="text"
                                name="date"
                                id="date"
                                value="{{$order->created_at}}"
                                autocomplete="date"
                                readonly
                                class="block w-full px-3 py-2 mt-1 bg-gray-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            />
                        </div>

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
                                value="{{$order->name}}"
                                autocomplete="cc-given-name"
                                readonly
                                class="block w-full px-3 py-2 mt-1 bg-gray-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
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
                                value="{{$order->address}}"
                                autocomplete="address"
                                readonly
                                class="block w-full px-3 py-2 mt-1 bg-gray-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
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
                                value="{{$order->phone}}"
                                autocomplete="phone"
                                readonly
                                class="block w-full px-3 py-2 mt-1 bg-gray-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            />
                        </div>

                        <div class="col-span-4 sm:col-span-2">
                            <label
                                for="city"
                                class="block text-sm font-medium text-gray-700"
                                >Kota</label
                            >
                            <select
                                id="city"
                                name="city"
                                autocomplete="city"
                                readonly
                                class="block w-full px-3 py-2 mt-1 bg-gray-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            >
                                <option>United States</option>
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
                                value="{{$order->zip}}"
                                autocomplete="zip"
                                readonly
                                class="block w-full px-3 py-2 mt-1 bg-gray-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            />
                        </div>

                        <div class="col-span-4 sm:col-span-2">
                            <label
                                for="total"
                                class="block text-sm font-medium text-gray-700"
                                >Total</label
                            >
                            <input
                                type="text"
                                name="total"
                                id="total"
                                autocomplete="total"
                                value="{{$order->total}}"
                                readonly
                                class="block w-full px-3 py-2 mt-1 bg-gray-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            />
                        </div>

                        <div class="col-span-4 sm:col-span-2">
                            <label
                                for="status"
                                class="block text-sm font-medium text-gray-700"
                                >Status</label
                            >
                            <select
                                id="status"
                                name="status"
                                autocomplete="status"
                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            >
                                <option 
                                    value=1
                                    @if ($order->status == 1)
                                        selected="selected"
                                    @endif
                                    >
                                        Belum Dibayar
                                </option>
                                <option 
                                    value=2
                                    @if ($order->status == 2)
                                        selected="selected"
                                    @endif
                                    >
                                        Sudah Dibayar
                                </option>
                                <option 
                                    value=3
                                    @if ($order->status == 3)
                                        selected="selected"
                                    @endif
                                    >
                                        Sedang Dikirim
                                </option>
                                <option 
                                    value=4
                                    @if ($order->status == 4)
                                        selected="selected"
                                    @endif
                                    >
                                        Sudah Sampai
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="_method" value="PUT">
                <div
                    class="flex justify-end px-4 py-3 space-x-2 text-right bg-gray-50 sm:px-6"
                >
                    <a
                        href="{{route('admin.order.index')}}"
                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-cerise-500 hover:bg-cerise-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
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
    </section>
</div>
    @stop