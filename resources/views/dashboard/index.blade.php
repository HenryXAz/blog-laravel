<x-layouts.app>
    <h2 class="font-light text-2xl">Dashboard</h2>

    <div class="max-w-4xl mx-auto mt-5 flex-col md:flex-row items-center flex gap-2 justify-center">

        <div
            class="block w-full sm:w-1/2 md:w-1/3  p-6 text-gray-200 border border-gray-200 rounded-lg shadow bg-indigo-700 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tighttext-gray-200">Posts</h5>

            <div class="flex flex-col gap-2 items-center">
                <p class="font-light text-5xl text-gray-200">{{ $total_posts }}</p>
                <p class="text-xl">posts in total</p>
            </div>

        </div>

        <div
            class="block w-full sm:w-1/2 md:w-1/3 p-6 text-gray-200 border border-gray-200 rounded-lg shadow bg-green-700 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tighttext-gray-200">Authors</h5>

            <div class="flex flex-col gap-2 items-center">
                <p class="font-light text-5xl text-gray-200">{{ $authors }}</p>
                <p class="text-xl">authors in total</p>
            </div>

        </div>

        <div
            class="block w-full sm:w-1/2 md:w-1/3 p-6 text-gray-200 border border-gray-200 rounded-lg shadow bg-blue-700 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tighttext-gray-200">Categories</h5>


            <div class="flex flex-col gap-2 items-center">
                <p class="font-light text-5xl text-gray-200">{{ $total_categories }}</p>
                <p class="text-xl">categories in total</p>
            </div>

        </div>

    </div>


    <div class="relative overflow-x-auto">
        <div
            class="flex justify-around overflow-x-auto w-96 md:min-w-none md:max-w-xl  mx-auto mt-2  p-2 text-gray-900 dark:text-gray-200 border border-gray-200 rounded-lg shadow bg-gray-50 dark:bg-gray-900 dark:border-gray-700">

            <div class="flex flex-col w-full overflow-x-auto">

                <h5 class="mb-2 text-2xl font-light tracking-tighttext-gray-200">Posts By Category</h5>
                @foreach ($posts_by_category as $post)
                    <div class="flex justify-between overflow-x-auto w-full text-gray-200 mb-3 gap-2">
                        <p class="rounded-md w-96 p-2 bg-amber-700"> {{ $post->category->description }} </p>
                        <p class="p-2 rounded-md w-96 bg-zinc-950">{{ $post->total }} posts in total</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-layouts.app>
