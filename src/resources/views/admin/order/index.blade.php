@extends('layouts.admin')
    @section('content')
    <div class='flex flex-col min-h-screen py-5 mx-auto max-w-7xl sm:px-6 lg:px-8'>
        <div class="py-5 my-10 border-b border-gray-200">
            <h1
                class="text-4xl font-extrabold tracking-tight text-gray-900"
            >
                Manajemen Order
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
                                    Nomor Invoice
                                </th>
                                <th
                                    scope='col'
                                    class='px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase'
                                >
                                    Produk
                                </th>
                                <th
                                    scope='col'
                                    class='px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase'
                                >
                                    Status
                                </th>
                                <th
                                    scope='col'
                                    class='px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase'
                                >
                                    Payment
                                </th>
                                <th
                                    scope='col'
                                    class='px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase'
                                >
                                    Total
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
                            @foreach($orders as $order)
                                <tr>
                                    <td class='px-6 py-4 whitespace-nowrap'>
                                        <div class='flex items-center'>
                                            <div>
                                                <div class='text-sm font-medium text-gray-900'>
                                                    INV-NUM-{{ $order->id }}                                                   
                                                </div>
                                                <div class='text-sm text-gray-500'>
                                                    {{ $order->created_at }}
                                                </div>
                                            </div>
                                        </div> 
                                    </td>
                                    <td class='px-6 py-4 whitespace-nowrap'>
                                        <div class='text-sm text-gray-500'>
                                            @foreach($order->productsOrders as $productOrder)
                                                {{ $productOrder->product->name }} (x{{ $productOrder->quantity }}).
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class='px-6 py-4 whitespace-nowrap'>
                                        <span class='inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full'>
                                            @if($order->status == 1)
                                                Belum Dibayar
                                            @elseif($order->status == 2)
                                                Sudah Dibayar
                                            @elseif($order->status == 3)
                                                Sedang Dikirim
                                            @else
                                                Sudah Sampai
                                            @endif
                                        </span>
                                    </td>
                                    <td class='px-6 py-4 text-sm text-gray-500 whitespace-nowrap'>
                                        {{ $order->paymentType->name }}
                                    </td>
                                    <td class='px-6 py-4 text-sm text-gray-500 whitespace-nowrap'>
                                        Rp {{$order->total}}
                                    </td>
                                    <td class='px-6 py-4 text-sm font-medium text-right whitespace-nowrap'>
                                            <a 
                                                href='{{route('admin.order.edit', ['id' => $order->id])}}'
                                                class='text-indigo-600 hover:text-indigo-900'>
                                                Edit
                                            </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @stop