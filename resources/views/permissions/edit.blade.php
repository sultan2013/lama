@extends('layouts.app')

@section('content')
<div class="container">

  <!--- alert for add new role update new role or delete new role -->
  @include('flash::message')
  @include('errors.list')
  <!-- end of flash message --->

  <div class="row">
    <div class="col-sm-6">
<h3>EDIT A PERMISSION</h3>
<form method="POST" action="{{route('permissions.update',$_permission->id)}}">
  {{method_field('PATCH')}}
  {{ csrf_field() }}
  <div class="form-group">
    <label >PERMISSION NAME</label>
    <input type="text"
           name="name"
           value="{{$_permission->name}}"
           class="form-control"
           placeholder="edit_students">
  </div>
  <div class="form-group">
    <label >PERMISSION LABEL</label>
    <input type="text"
           name="label"
           value="{{$_permission->label}}"
           class="form-control"
           placeholder="Edit Students">
  </div>
    <button name="submit" class="btn btn-info btn-block">Edit</button>
</form>
</div><!---- form colomn -->
<div class="col-sm-6">
  <h3>PERMISSIONS LIST</h3>
  @if(!empty($permissions))
  <div class="table-responsive table-condensed">
  <table class="table">
  @foreach($permissions as $permission)
    <tr>
      <td>{{$permission->label}}</td>
        <td><a href="{{route('permissions.edit',$permission->id)}}"
               class="btn btn-info ">
          <span class="glyphicon glyphicon-edit"></span></a></td>
      <td>
     <form method="POST" action="{{route('permissions.destroy',$permission->id)}}">
       {{method_field('DELETE')}}
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

</div><!-- container -->
@endsection
