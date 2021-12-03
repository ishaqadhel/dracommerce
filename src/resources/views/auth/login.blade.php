<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen px-4 py-12 bg-gray-50 sm:px-6 lg:px-8">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="w-full max-w-md space-y-8">
            <div>
                <img class="w-auto h-12 mx-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
                <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900">
                    Masuk Pengguna
                </h2>
                <p class="mt-2 text-sm text-center text-gray-600">
                    Belum punya akun?
                <a href="{{ route('register')}}" class="font-medium text-cerise-600 hover:text-cerise-400">
                    Daftar disini
                </a>
                </p>
            </div>
            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <input type="hidden" name="remember" value="true">
                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="email" class="sr-only">Email address</label>
                        <input id="email" name="email" type="email" autocomplete="email" required class="relative block w-full px-3 py-2 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-none appearance-none rounded-t-md focus:outline-none focus:ring-cerise-500 focus:border-cerise-500 focus:z-10 sm:text-sm" placeholder="Email address">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="relative block w-full px-3 py-2 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-none appearance-none rounded-b-md focus:outline-none focus:ring-cerise-500 focus:border-cerise-500 focus:z-10 sm:text-sm" placeholder="Password">
                    </div>
                </div>
      
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox" class="w-4 h-4 border-gray-300 rounded text-cerise-600 focus:ring-cerise-400">
                        <label for="remember-me" class="block ml-2 text-sm text-gray-900">
                        Remember me
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-medium text-cerise-600 hover:text-cerise-400">
                                Lupa Password?
                            </a>
                        </div>
                    @endif
                </div>
      
                <div>
                <button type="submit" class="relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md group bg-cerise-600 hover:bg-cerise-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cerise-500">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5 text-cerise-600 group-hover:text-cerise-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                    </span>
                    Masuk
                </button>
                </div>
            </form>
        </div>
      </div>
</x-guest-layout>
