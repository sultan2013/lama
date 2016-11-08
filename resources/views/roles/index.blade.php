@extends('layouts.app')

@section('content')
<div class="container">
<h3>ROLES</h3>
<a href="{{route('roles.create')}}" class="btn btn-info">CREATE NEW ROLE</a>
<hr>
<ul class="list-group {{$text_alignment}}">
  @if($roles->count() > 0)
  @foreach($roles as $role)
<a href="{{route('roles.show',$role->id)}}"class="list-group-item">{{$role->label}}</a>
@endforeach
@endif
</ul>
</div><!-- end of container -->
@endsection
