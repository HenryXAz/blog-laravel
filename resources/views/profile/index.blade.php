<x-layouts.app>
    <h1 class="font-light text-2xl">
        Perfil de Usuario
    </h1>

    @if (session('user_updated'))
        <p class="text-emerald-500 text-center text-lg">
            {{ session('user_updated') }}
        </p>
    @endif


    <div class="max-w-4xl mx-auto my-5">

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf

            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                    Name</label>
                <input type="text" name="name" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ Auth::user()->name }}">
            </div>

            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                    Email</label>
                <input type="email" name="email" id="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ Auth::user()->email }}">


                @error('user_exists')
                    <x-error-message.error>{{ $message }}</x-error-message.error>
                @enderror
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
            <h3 class="text-xl mb-7">
                Change Password
            </h3>

            <div class="mb-6">
                <label for="new_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your new
                    password</label>
                <input type="password" name="new_password" id="new_password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                @error('new_password')
                    <x-error-message.error>{{ $message }}</x-error-message.error>
                @enderror
            </div>

            <div class="mb-6">
                <label for="new_password_confirmation"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm your new
                    password</label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">


            @error('user_not_found')
                <x-error-message.error>{{ $message }}</x-error-message.error>
            @enderror
            @error('password')
                <x-error-message.error> {{ $message }}</x-error-message.error>
            @enderror
            <h3 class="text-xl mb-7">
                Enter your password for apply changes
            </h3>

            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your current
                    password</label>
                <input type="password" name="password" id="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
                profile</button>
        </form>
    </div>

</x-layouts.app>
