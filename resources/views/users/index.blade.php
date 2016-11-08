@extends('layouts.app')

@section('content')
<div class="container">
<h3>USERS</h3>
<a href="{{route('users.create')}}" class="btn btn-info">CREATE NEW USER</a>
<hr>
<ul class="list-group {{$text_alignment}}">
  @if($users->count() > 0)
  @foreach($users as $user)
<a href="{{route('users.show',$user->id)}}"class="list-group-item">{{$user->name}}</a>
@endforeach
@endif
</ul>
</div><!-- end of container -->
@endsection
