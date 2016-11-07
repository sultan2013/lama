@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-6">
<h3>CREATE NEW ROLE</h3>
<form method="POST" action="{{route('roles.store')}}">
  {{ csrf_field() }}
  <div class="form-group">
    <label >ROLE NAME</label>
    <input type="text"
           name="name"
           value="{{old('name')}}"
           class="form-control"
           placeholder="super_admin">
  </div>
  <div class="form-group">
    <label >ROLE LABEL</label>
    <input type="text"
           name="label"
           value="{{old('label')}}"
           class="form-control"
           placeholder="Site Manager">
  </div>
    <button name="submit" class="btn btn-info btn-xs">Add a Role</button>
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
<div class="row">
  <div class="col-sm-6">
@if($errors->count() > 0)
    <div class="alert alert-danger">

<ul class="list-group">
@foreach($errors->all() as $error)
  <li class="group-list-item ">{{$error}}</li>
@endforeach
</ul>

</div><!-- end of errors div -->
@endif
</div><!-- end row colm -->
  </div> <!-- end class row -->

</div><!-- container -->
@endsection
