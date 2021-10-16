<x-guest-layout>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col pt-8 sm:pt-0">
                <span class="py-4">Welcome to the </span>
                <div class="text-4xl text-gray-700"><span class="text-5xl">P</span>atient <span class="text-5xl">B</span>lood <span class="text-5xl">P</span>ressure Medical Records System</div>
                @if (Route::has('login'))
                    <div class="px-6 py-8 sm:block text-center">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register New User</a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-500 underline">Log in</a>
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-guest-layout>
