<x-layouts.guest>
  <div class="flex justify-end my-5 gap-4 max-w-4xl mx-auto">
    <span>publicado el {{$publish_date}}</span>
    <span>categoria: {{$post->category->description}}</span>
  </div>

  <article>

    <div class="flex justify-center">

        <img src="{{ asset($post->img_path) }}"  class="bg-cover w-full md:w-1/2"  />
    </div>
    
    <h1 class="text-center font-light  text-xl md:text-4xl">{{ $post->title }}</h1>

    <p class="text-justify my-5 max-w-3xl mx-auto">
      {{$post->content}}
    </p>

  </article>


</x-layouts.guest>
