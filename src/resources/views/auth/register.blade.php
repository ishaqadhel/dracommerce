<x-guest-layout>
    <div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
          <img class="w-auto h-12 mx-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
          <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900">
            Daftar Pengguna
          </h2>
          <p class="mt-2 text-sm text-center text-gray-600">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="font-medium text-cerise-600 hover:text-cerise-400">
              Masuk disini
            </a>
          </p>
        </div>
      
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">
                        Nama
                        </label>
                        <div class="mt-1">
                            <input id="name" name="name" type="name" required class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-cerise-400 focus:border-cerise-400 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">
                        Alamat Email
                        </label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" required class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-cerise-400 focus:border-cerise-400 sm:text-sm">
                        </div>
                    </div>
            
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">
                        Password
                        </label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-cerise-400 focus:border-cerise-400 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                        Password (Ketik Ulang)
                        </label>
                        <div class="mt-1">
                            <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="current-password" required class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-cerise-400 focus:border-cerise-400 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">
                        Nomor Handphone
                        </label>
                        <div class="mt-1">
                            <input id="phone" name="phone" type="phone" required class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-cerise-400 focus:border-cerise-400 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">
                        Alamat Rumah
                        </label>
                        <div class="mt-1">
                            <input id="address" name="address" type="textarea" autocomplete="address" required class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-cerise-400 focus:border-cerise-400 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="zip" class="block text-sm font-medium text-gray-700">
                        Kode Pos
                        </label>
                        <div class="mt-1">
                            <input id="zip" name="zip" type="number" required class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-cerise-400 focus:border-cerise-400 sm:text-sm">
                        </div>
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
                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cerise-500 focus:border-cerise-500 sm:text-sm"
                        >
                            @foreach($cities as $city)                         
                                <option value={{$city->id}}>{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <div>
                        <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-cerise-600 hover:bg-cerise-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cerise-400">
                        Daftar
                        </button>
                    </div>
                </form>
            
                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 text-gray-500 bg-white">
                                Selamat Datang di Drakuli
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
