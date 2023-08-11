<div class="max-w-4xl mx-auto relative mt-6 overflow-x-auto shadow-md sm:rounded-lg">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                Descripción
              </th>
              <th scope="col" class="px-6 py-3">
                Acciones
              </th>
          </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
            <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $category->description }}
              </th>
              <td class="px-6 py-4">
                <div class="flex gap-2 justify-center">
                  <a href="{{route("category.edit", $category->id)}}" type="button" class="focus:outline-none cursor-pointer text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Editar</a>
                  {{-- <button type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Editar</button>   --}}
                  <button type="button" onclick="deleteCategory({{$category->id}})"   class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Eliminar</button>
                </div>
              </td>
            </tr>
        @endforeach
      
      
      </tbody>
  </table>

  <script lang="javascript">

    function deleteCategory(id) {
      const confirmDelete = confirm("¿esta seguro que desea eliminar esta categoría?")

      if(confirmDelete) {
        window.location.assign(`http://localhost:8000/categories/delete/${id}`)
      }
    }

  </script>
</div>
