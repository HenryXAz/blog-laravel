<x-layouts.app>
    <h1 class="font-light text-2xl">Posts</h1>

  @if (session('post_created'))
    <p class="my-6 text-center text-emerald-500">
      {{ session('post_created') }}
    </p>
  @endif


  @if (session('post_updated'))
    <p class="my-6 text-center text-emerald-500">
      {{ session('post_updated') }}
    </p>
  @endif

  @error('post_not_found')
    <p class="my-6 text-center text-red-500">
      {{ $message }}   
    </p> 
  @enderror

    <!-- Modal toggle -->
    <button data-modal-target="post-modal" data-modal-toggle="post-modal"
        class="block mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        Nuevo Post
    </button>


    @include('posts.post-form')

    @if(count($posts) > 0)

    @include('posts.posts-table')

    @else 
      <p class="text-center">No hay posts</p>
    @endif

</x-layouts.app>
