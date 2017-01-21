@extends('layouts.app')

@section('content')
<div class="container">
<h3>USERS</h3>
<a href="{{route('users.create')}}" class="btn btn-info">CREATE NEW USER</a>
<hr>
<h3>USERS' LIST</h3>
@if(!empty($users))
<div class="table-responsive table-condensed">
<table class="table">
@foreach($users as $user)
  <tr>
<!-- role label -->
    <td>{{$user->email}}</td>
<!-- END of role label -->


<!-- role show button and adding permissions -->
    <td>
      <a href="{{route('users.show',$user->id)}}"
      class="btn btn-primary">
       <span class="glyphicon glyphicon-eye-open"></span>
     </a>
    </td>
<!-- END of role show button and adding permissions -->



<!-- role edit button  -->

      <td><a href="{{route('users.edit',$user->id)}}"
             class="btn btn-warning ">
        <span class="glyphicon glyphicon-edit"></span></a></td>
    <td>
<!-- END role edit button  -->


<!-- role Delete  button  -->

   <form method="POST" action="{{route('users.destroy',$user->id)}}">
     {{method_field('DELETE')}}
     {{ csrf_field() }}
     <button type="submit"
              class="btn btn-danger ">
     <span class="glyphicon glyphicon-trash"></span>
   </button>
   </form>
    </td>
<!-- END role Delete  button  -->
  </tr>
@endforeach
</table>

</div><!-- end roles list -->
@endif
</div> <!--end of row class -->

</div><!-- end of container -->
@endsection
