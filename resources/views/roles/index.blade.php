@extends('layouts.app')

@section('content')
<div class="conatainer">
welcome to roles model
  <a href="{{route('roles.create')}}" class="btn btn-info btn-xs">Add a Role</a>
  <ul>
    @foreach($roles as $role)
    <li>{{$role->label}}</li>
    @endforeach
  </ul>
</div><!-- end of container -->
@endsection
