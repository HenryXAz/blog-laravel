<x-layouts.app >
  <h1 class="font-light text-2xl">Usuarios</h1>

  @error('register_failed')
    <p id="register_failed" class="my-6 text-center text-red-500">
      {{ $message }}   
    </p> 
  @enderror

  @error('update_failed')
    <p class="my-6 text-center text-red-500">
      {{ $message }}   
    </p> 
  @enderror

  @error('user_not_found')
    <p class="my-6 text-center text-red-500">
      {{ $message }}   
    </p> 
  @enderror

  @if (session('register_success'))
      <p class="my-6 text-center text-emerald-500">
        {{ session('register_success')}}
      </p>
  @endif

  @if (session('user_updated'))
      <p class="my-6 text-center text-emerald-500">
        {{ session('user_updated')}}
      </p>
  @endif


  @if (session('user_deleted'))
      <p class="my-6 text-center text-emerald-500">
        {{ session('user_deleted')}}
      </p>
  @endif

 <!-- Modal toggle -->
<button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  Nuevo Usuario
</button> 

  @include('users.user-form')


  @include('users.users-table')
</x-layouts.app>

