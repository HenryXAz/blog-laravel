<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name') }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js']) 
</head>

<body class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200">

  <div class="flex justify-end gap-2 max-w-6xl my-5"> 
    <x-toggle-theme.toggle-theme />
    
    @if (Auth::user())
    <a href="{{route("dashboard.index")}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Dashboard</a>
       {{-- <a class="p-2 border rounded-md transition-all duration-300 border-blue-700 hover:bg-blue-600 hover:text-gray-200"   href="{{ route('dashboard.index')}}">Dashboard</a>  --}}
    
    {{-- @else --}}
      {{-- <a class="p-2 border rounded-md transition-all duration-300 border-blue-700 hover:bg-blue-600 hover:text-gray-200"   href="{{route('auth.login.view')}}">Login</a>  --}}
    @endif 
  </div>

  <main class="container mx-auto min-h-screen">
        {{ $slot }}
  </main>

  <x-footer.footer />
</body>

</html>
