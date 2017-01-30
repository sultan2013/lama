@extends('layouts.admin_layout')
@include('layouts.top_bar')
@section('dashboard')
<div class="container">

  <!--- alert for add new role update new role or delete new role -->
  @include('flash::message')
  @include('errors.list')
  <!-- end of flash message --->

  <div class="row">
    <div class="col-sm-6">
<h3>EDIT A ROLE</h3>
<form method="POST" action="{{route('roles.update',$_role->id)}}">
  {{method_field('PATCH')}}
  {{ csrf_field() }}
  <div class="form-group">
    <label >ROLE NAME</label>
    <input type="text"
           name="name"
           value="{{$_role->name}}"
           class="form-control"
           placeholder="super_admin">
  </div>
  <div class="form-group">
    <label >ROLE LABEL</label>
    <input type="text"
           name="label"
           value="{{$_role->label}}"
           class="form-control"
           placeholder="Site Manager">
  </div>
    <button name="submit" class="btn btn-info btn-block">Edit</button>
</form>
</div><!---- form colomn -->
<div class="col-sm-6">
  <h3>ROLES LIST</h3>
  @if(!empty($roles))
  <div class="table-responsive table-condensed">
  <table class="table">
  @foreach($roles as $role)
    <tr>
      <td>{{$role->label}}</td>
        <td><a href="{{route('roles.edit',$role->id)}}"
               class="btn btn-info ">
          <span class="glyphicon glyphicon-edit"></span></a></td>
      <td>
     <form method="POST" action="{{route('roles.destroy',$role->id)}}">
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
