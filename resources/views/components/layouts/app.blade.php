<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name')  }} </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white dark:bg-slate-900 text-gray-800 dark:text-gray-200">
  {{-- <div class="flex justify-end max-w-6xl my-5">
    <x-toggle-theme.toggle-theme />
  </div>  --}}
  <x-navbar.navbar />  
  <main class="container mx-auto">
    {{ $slot }}
  </main>
</body>

</html>
