@props(['action' => 'users.store', 'id' => 'authentication-modal', 'hidden' => 'true', 'title_form' => 'Title Form', 'identifier' => '','name' => '', 'email' => '', 'selected' => 'true', 'role' => 'author', 'password' => '', 'password_confirmation' => '', 'submit_button_title' => 'Crear Usuario', 'edit_user' => false])


<!-- Main modal -->
<div id="{{ $id }}" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 {{ $hidden === 'true' ? 'hidden' : '' }} w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full mx-auto max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="{{ $id }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">{{ $title_form }}</h3>
                <form class="space-y-6" action="{{ route($action) }}" method="POST">
                    @csrf

                    <input type="hidden" name="id" value="{{$identifier}}"/>

                    <div>
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                        <input value="{{ $name }}" type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Username" required>
                    </div>


                    <div>
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input value="{{ $email }}" type="email" name="email" id="email"
                            placeholder="user@example.com"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>


                    <div>

                        <label for="role"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione rol de
                            usuario</label>
                        <select name="role" id="role"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option {{ $role === 'author' ? 'selected' : '' }} value="author">Autor</option>
                            <option {{ $role === 'admin' ? 'selected' : '' }} value="admin">Administrador</option>
                        </select>
                    </div>

                    
                  @if(!$edit_user) 
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                        <input value="{{ $password }}" type="password" name="password" id="password"
                            placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>

                    <div>
                        <label for="password_confirmation"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmar
                            Contraseña</label>
                        <input value="{{ $password_confirmation }}" type="password" name="password_confirmation"
                            id="password_confirmation" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                  @endif



                    <div class="flex justify-between">
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ $submit_button_title }}</button>
                    @if ($edit_user)
                        <a href="{{ route('users.index') }}"
                            class="w-full block mt-4 text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">{{ __('Ir a la tabla de usuarios') }}</a>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
