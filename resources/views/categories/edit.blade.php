<x-layouts.app>
  <x-form.category-form 
    action="category.update" 
    title_form="Actualizar categoría"
    hidden="false"
    id="edit-category"
    identifier="{{$category->id}}"
    description="{{$category->description}}"
    id="edit-category"
    submit_button_title="Actualizar categoría"
    edit_category="true" 
  />

  
</x-layouts.app>
