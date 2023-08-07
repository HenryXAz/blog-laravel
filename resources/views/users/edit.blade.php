<x-layouts.app>
 
<x-form.user-form 
  action="users.update"
  title_form="Editar Usuario"
  hidden="false"
  id="edit-user"
  identifier="{{$user->id}}"
  name="{{$user->name}}"
  email="{{$user->email}}"
  role="{{$user->role}}"
  selected="true"
  submit_button_title="Editar Usuario"
  edit_user=true
/>  
</x-layouts.app>