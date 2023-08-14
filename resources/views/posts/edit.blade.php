<x-layouts.app>


<x-form.post-form 
  action="posts.update"
  title_form="Editar Post"
  hidden="false"
  id="edit-post"
  identifier="{{$post->id}}"
  title="{{$post->title}}"
  content="{{$post->content}}"
  image_path="{{$post->img_path}}"
  category_description="{{$post->category->description}}"
  :categories="$categories"
  selected="true"
  submit_button_title="Editar Post"
  edit_post=true
/>

</x-layouts.app>