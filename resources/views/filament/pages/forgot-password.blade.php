<x-filament-panels::page>
    <div class="flex justify-center">
        <div class="w-full max-w-md">

            <div class="fi-section rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">

                {{-- Logo --}}
                <div class="mb-6 flex justify-center">
                    <img
                        src="{{ asset('images/Headway-logo.png') }}"
                        alt="Headway"
                        class="h-12 object-contain"
                    >
                </div>

                {{-- Heading --}}
                <div class="mb-6 text-center">
                    <h2 class="text-xl font-bold text-gray-950 dark:text-white">
                        Forgot Password?
                    </h2>

                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        Enter your admin email address and we will send you an OTP.
                    </p>
                </div>

                {{-- Email --}}
                <div>
                    <label
                        for="email"
                        class="fi-fo-field-wrp-label block text-sm font-medium text-gray-950 dark:text-white"
                    >
                        Email Address
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Enter your admin email"
                        class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
                    >
                </div>

                {{-- Button --}}
                <div class="mt-6">
                    <button
                        type="button"
                        class="w-full rounded-lg bg-primary-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-primary-500"
                    >
                        Send OTP
                    </button>
                </div>

                {{-- Back to login --}}
                <div class="mt-5 text-center">
                    <a
                        href="{{ filament()->getLoginUrl() }}"
                        class="text-sm font-medium text-primary-600 hover:underline"
                    >
                        ← Back to Login
                    </a>
                </div>

            </div>

        </div>
    </div>
</x-filament-panels::page>