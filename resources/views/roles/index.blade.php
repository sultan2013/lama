@extends('layouts.app')

@section('content')
<div class="container">
<h3>ROLES</h3>
<a href="{{route('roles.create')}}" class="btn btn-info">CREATE NEW ROLE</a>
<hr>
<div class="col-sm-12">
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

</div><!-- end of container -->
@endsection
