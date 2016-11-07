@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-6">
<h3>CREATE NEW ROLE</h3>
<form method="POST" action="{{route('roles.store')}}">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="formGroupExampleInput">ROLE NAME</label>
    <input type="text"
           name="name"
           value="{{old('name')}}"
           class="form-control"
           id="formGroupExampleInput"
           placeholder="Example input">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">ROLE LABEL</label>
    <input type="text"
           name="label"
           value="{{old('label')}}"
           class="form-control"
           id="formGroupExampleInput2"
           placeholder="Another input">
  </div>
    <button name="submit" class="btn btn-info btn-xs">Add a Role</button>
</form>
</div><!---- form colomn -->
<div class="col-sm-6">
  <h3>ROLES LIST</h3>
  @if(!empty($roles))
  <ul class="list-group">
  @foreach($roles as $role)
    <li class="list-group-item">{{$role->label}}
      <span class="badge  alert-danger">
        <form method="DELETE" action="{{route('roles.destroy',$role->id)}}">
        <button >DELET</button></span>
  </form>
      </li>

  @endforeach
    </ul>
  @endif
</div><!-- end roles list -->
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
