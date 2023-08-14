<x-layouts.guest>
<div class="max-w-2xl mx-auto flex flex-col items-center gap-5">
  @foreach($posts as $post)
    <div class="max-w-lg bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="{{route("home.post.show", $post->id)}}">
            <img class="rounded-t-lg" src="{{ asset($post->img_path) }}" alt="{{$post->title}}" />
        </a>
        <div class="p-5">
            <a href="{{route("home.post.show", $post->id)}}">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                  {{ $post->title }}
                </h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
              {{substr($post->content, 0, 100)}}...

            </p>

            <div class="flex justify-end">
             <span>

              {{_("category: ")}} {{ $post->category->description}}
            </span> 
            
            </div>

            <a href="{{route("home.post.show", $post->id)}}"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>
  @endforeach
</div>
</x-layouts.guest>
