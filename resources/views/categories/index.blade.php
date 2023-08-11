<x-layouts.app>
    <h1 class="font-light text-2xl">Categorías</h1>

    @if (session('category_updated'))
        <p class="my-6 text-center text-emerald-500">
            {{ session('category_updated') }}
        </p>
    @endif

    @if (session('category_created'))
        <p class="my-6 text-center text-emerald-500">
            {{ session('category_created') }}
        </p>
    @endif
    
    @error('category_not_found')
        <p class="text-red-500 text-center">{{ $message }}</p>
    @enderror

    @error('description')
        <p class="text-red-500 text-center">{{ $message }}</p>
    @enderror

    <!-- Modal toggle -->
    <button data-modal-target="category-modal" data-modal-toggle="category-modal"
        class="block mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        Nueva Categoría
    </button>

    @include('categories.category-form')


    @include('categories.categories-table')

</x-layouts.app>
