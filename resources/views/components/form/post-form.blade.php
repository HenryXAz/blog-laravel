@props(['action' => 'posts.store', 'id' => 'post-modal', 'hidden' => 'true', 'title_form' => 'Title Form', 'identifier' => '', 'title' => '', 'content' => '', 'image_path' => '#', 'category_description' => '', 'categories' => [], 'submit_button_title' => 'Crear Post', 'edit_post' => false])


<!-- Main modal -->
<div id="{{ $id }}" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 {{ $hidden === 'true' ? 'hidden' : '' }} w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full mx-auto max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="{{ $id }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">{{ $title_form }}</h3>
                <form class="space-y-6" action="{{ route($action) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $identifier }}" />


                    <div>
                        <label for="title"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
                        <input value="{{ $title }}" type="text" name="title" id="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Titulo" required>
                    </div>


                    <div>

                        <label for="content"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenido</label>
                        <textarea id="content" name="content" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Contenido del post...">{{$content}}</textarea>

                    </div>

                    <div class="flex flex-col items-center justify-center" id="preview_container">
                        <img id="image_path_preview" src="{{asset($image_path)}}" alt="preview" class="w-full"/>
                        <button type="button" class="w-full text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                          id="remove-image-button"
                        >
                          eliminar esta imagen
                        </button>
                    </div>

                    <div class="flex items-center justify-center w-full" id="image_path_container">
                        <label for="image_path"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                    800x400px)</p>
                            </div>
                            <input id="image_path" name="image_path" type="file" class="hidden" />
                        </label>
                    </div>
                    
                    <div>
                        <label for="category_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione categoría</label>
                        <select name="category_id" id="category_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                           
                          @foreach ($categories as $category)
                              <option {{$category->description === $category_description ? "selected" : ""}}   value="{{$category->id}}">
                                {{$category->description}}
                              </option> 
                          @endforeach 
                            
                            
                            {{-- <option {{ $role === 'author' ? 'selected' : '' }} value="author">Autor</option>
                            <option {{ $role === 'admin' ? 'selected' : '' }} value="admin">Administrador</option> --}}
                        </select>
                    </div>


                    <div class="flex justify-between">
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ $submit_button_title }}</button>
                    @if ($edit_post)
                        <a href="{{ route('posts.index') }}"
                            class="w-full block mt-4 text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">{{ __('Ir a la tabla de posts') }}</a>
                    @endif
                </form>
            </div>
        </div>
    </div>

    @vite("resources/js/control-post-image.js")
</div>
