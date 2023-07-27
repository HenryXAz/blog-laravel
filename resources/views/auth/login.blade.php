<x-layouts.guest>
  <h1 class="my-5 text-center font-light text-xl md:text-2xl">{{ _('Iniciar Sesión') }}</h1>

<div class="max-w-3xl mx-auto" >

<form method="POST" action="{{ route('auth.login.post')}}">
  @csrf 
  
  <div class="mb-6"> 
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{_('Email')}}</label>
    <input type="email" name="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required> 
    @error('email')
      <x-error-message.error>{{$message}}</x-error-message.error>
    @enderror
  
  </div>
  <div class="mb-6">
    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('Contraseña')}}</label>
    <input type="password" name="password" id="password" placeholder="******"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
    @error('password')
      <x-error-message.error>{{$message}}</x-error-message.error> 
    @enderror 
  </div>
  <div class="mb-6">
    <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('Repetir Contraseña')}}</label>
    <input type="password" name="password_confirmation" id="repeat-password" placeholder="******" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
  </div>

  <div class="flex justify-center w-full">
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Iniciar Sesión</button>
  </div>

</form>

</div>
</x-layouts.guest>