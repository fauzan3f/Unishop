<x-guest-layout>

            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white">Create Account</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">Register for a new account</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Name')" class="text-gray-700 dark:text-gray-300" />
                    <x-text-input id="name" 
                                 class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 text-gray-900" 
                                 type="text" 
                                 name="name" 
                                 :value="old('name')" 
                                 required 
                                 autofocus 
                                 autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-300" />
                    <x-text-input id="email" 
                                 class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 text-gray-900" 
                                 type="email" 
                                 name="email" 
                                 :value="old('email')" 
                                 required 
                                 autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Role Selection -->
                <div class="mb-4">
                    <x-input-label for="role" :value="__('Register as')" class="text-gray-700 dark:text-gray-300" />
                    <select id="role" 
                            name="role" 
                            class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            required>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300" />
                    <x-text-input id="password" 
                                 class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 text-gray-900"
                                 type="password"
                                 name="password"
                                 required 
                                 autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 dark:text-gray-300" />
                    <x-text-input id="password_confirmation" 
                                 class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 text-gray-900"
                                 type="password"
                                 name="password_confirmation" 
                                 required 
                                 autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <button type="submit" 
                        class="w-full py-3 px-4 text-white bg-blue-600 hover:bg-blue-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-300">
                    {{ __('Register') }}
                </button>
            </form>

            <p class="text-center mt-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Already have an account?') }}
                <a href="{{ route('login') }}" 
                   class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                    {{ __('Sign in') }}
                </a>
            </p>


</x-guest-layout>
