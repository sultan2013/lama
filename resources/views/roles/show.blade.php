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
<div class="row" id="relatedPermissions">
   <div class="col-md-6">
  <form method="post" action="{{url('add_permissions_to_roles')}}/{{$role->id}}">
    {{csrf_field()}}
    @if($all_permissions->count() >0)
    @foreach($all_permissions as $permission)
  </br>
    <label class="checkbox-inline">
      <input name="permissions[]"
             type="checkbox"
             value="{{$permission->id}}"
             id="checkbox"
             v-model="permissions"
             >
             {{$permission->label}}</label>

    @endforeach
    @endif
    <hr>
     <button type="submit" v-bind:class ="{disabled:isEmpty}" class="btn btn-default ">save</button>
  </form>
</div><!-- end of first row -->
<div class="col-md-6">

    <h3>ASSIGNED PERMISSIONS</h3>
    @if(!empty($related_permissions))
    <div class="table-responsive table-condensed">
    <table class="table">
    @foreach($related_permissions as $permission)
      <tr>
        <td>{{$permission->label}}</td>
          <td><a href="{{route('permissions.edit',$permission->id)}}"
                 class="btn btn-info ">
            <span class="glyphicon glyphicon-edit"></span></a></td>
        <td>
       <form method="POST" action="{{url('role')}}/{{$role->id}}/permission/{{$permission->id}}">

         {{ csrf_field() }}
         <button type="submit"
                  class="btn btn-danger ">
         <span class="glyphicon glyphicon-trash"></span>
       </button>
       </form>
        </td>
      </tr>
    @endforeach
  </table>

  </div><!-- end roles list -->
    @endif
  </div> <!--end of row class -->
</div><!-- end of the row -->
  <hr>
</div><!-- end of the container -->

<script>


@endsection
