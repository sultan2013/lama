@extends('layouts.app')

@section('content')
<div class="container">
  <table class="table">
      <thead>
        <tr>
          <th>Role Name</th>
          <th>Role Label</th>
          <th>Created At</th>
            <th>Updated At</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{$role->name}}</td>
          <td>{{$role->label}}</td>
          <td>{{$role->created_at}}</td>
          <td>{{$role->updated_at}}</td>
        </tr>

      </tbody>
    </table>
<hr>
  <h4>Related Permissions</h4>

  <form method="post" action="{{url('add_permissions_to_roles')}}/{{$role->id}}">
    {{csrf_field()}}
    @if($all_permissions->count() >0)
    @foreach($all_permissions as $permission)
    <label class="checkbox-inline">
      <input name="permissions[]"
             type="checkbox"
             value="{{$permission->id}}"
             >
             {{$permission->label}}</label>

    @endforeach
    @endif
     <button type="submit" class="btn btn-default">save</button>
  </form>
  <hr>
</div><!-- end of the container -->
@endsection
