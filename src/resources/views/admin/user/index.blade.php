@extends('layouts.admin')
    @section('content')
    <div class='flex flex-col min-h-screen py-5 mx-auto max-w-7xl sm:px-6 lg:px-8'>
        <div class="py-5 my-10 border-b border-gray-200">
            <h1
                class="text-4xl font-extrabold tracking-tight text-gray-900"
            >
                Manajemen Pengguna
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
                                    Name
                                </th>
                                <th
                                    scope='col'
                                    class='px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase'
                                >
                                    Email
                                </th>
                                <th
                                    scope='col'
                                    class='px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase'
                                >
                                    Phone
                                </th>
                                <th
                                    scope='col'
                                    class='px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase'
                                >
                                    City
                                </th>
                                <th
                                    scope='col'
                                    class='px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase'
                                >
                                    Status
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
                            <!-- looping here -->
                            @foreach($users as $user)
                                <tr>
                                    <td class='px-6 py-4 whitespace-nowrap'>
                                        <div class='flex items-center'>
                                            <div class='ml-4'>
                                                <div class='text-sm font-medium text-gray-900'>
                                                    {{ $user->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class='px-6 py-4 whitespace-nowrap'>
                                        <div class='text-sm text-gray-500'>
                                            {{ $user->email }}
                                        </div>
                                    </td>
                                    <td class='px-6 py-4 text-sm text-gray-500 whitespace-nowrap'>
                                        {{ $user->phone }}
                                    </td>
                                    <td class='px-6 py-4 text-sm text-gray-500 whitespace-nowrap'>
                                        {{ $user->city->name }}
                                    </td>
                                    <td class='px-6 py-4 whitespace-nowrap'>
                                        @if($user->status == 1)
                                            <span class='inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full'>
                                                Active
                                            </span>
                                        @else
                                            <span class='inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full'>
                                                Suspended
                                            </span>
                                        @endif            
                                    </td>
                                    <td class='px-6 py-4 text-sm font-medium text-right whitespace-nowrap'>
                                            <a
                                                href="{{ route('admin.user.edit', ['id' => $user->id]) }}"
                                                class='text-indigo-600 hover:text-indigo-900'
                                            >
                                                Edit
                                            </a>
                                    </td>
                                    <td class='px-6 py-4 text-sm font-medium text-right whitespace-nowrap'>
                                        <form method="POST" action="{{ route('admin.user.destroy', ['id' => $user->id]) }}">
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
    </div>
    @stop