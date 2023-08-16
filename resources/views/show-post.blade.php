<x-layouts.guest>
  <div class="flex justify-end my-5 gap-4 max-w-4xl mx-auto">
    <span class="text-sm">Publish on  {{$publish_date}}</span>
   
  </div>

  <article>
    <h1 class="text-center font-light font-serif  text-xl md:text-4xl">{{ $post->title }}</h1>
    
    <p>
     
    <span class="max-w-5xl mx-auto block text-center text-sm my-5">Created by {{ Auth::user()->name }}
    |  {{$publish_date}}
    </span>
    
    <span></span>
    </p> 
    
    <div class="flex justify-center">

        <img src="{{ asset($post->img_path) }}"  class="bg-cover w-full md:w-1/2"  />
    </div>
  
    <p class="text-justify my-5 max-w-3xl mx-auto">
      {!!nl2br(e($post->content))!!}
    </p>


  </article>


</x-layouts.guest>
