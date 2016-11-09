@extends('layouts.app')

@section('content')
<div class="container">
<h3>PERMISSIONS</h3>
<a href="{{route('permissions.create')}}" class="btn btn-info">CREATE NEW PERMISSION</a>
<hr>
<ul class="list-group {{$text_alignment}}">
  @if($permissions->count() > 0)
  @foreach($permissions as $permission)
<a href="{{route('permissions.show',$permission->id)}}"class="list-group-item">{{$permission->label}}</a>
@endforeach
@endif
</ul>
</div><!-- end of container -->
@endsection
