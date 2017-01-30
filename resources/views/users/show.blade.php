@extends('layouts.admin_layout')
@include('layouts.top_bar')
@section('dashboard')
<div class="container">
<!--- alert for add new role update new role or delete new role -->
@include('flash::message')
@include('errors.list')
<!-- end of flash message -->
  <table class="table">
      <thead>
        <tr>
          <th>User Name</th>
          <th>User Email</th>
          <th>Created At</th>
            <th>Updated At</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->created_at}}</td>
          <td>{{$user->updated_at}}</td>
        </tr>

      </tbody>
    </table>
<hr>
  
  <h4>Assign Role To User </h4>
<div class="row" >
   <div class="col-md-6">
  <form method="post" action="{{route('roles.assignRoles',$user->id)}}">
    {{csrf_field()}}
    @if($all_roles->count() >0)
    @foreach($all_roles as $role)
  </br>
    <label class="checkbox-inline">
      <input name="data[]"
             type="checkbox"
             value="{{$role->id}}"
             id="checkbox"
             v-model="roles"
             >
             {{$role->label}}</label>

    @endforeach
    @endif
    <hr>
     <button type="submit"  class="btn btn-default ">save</button>
  </form>
  <a href="{{url('testtrait')}}">test trait </a>
</div><!-- end of first row -->


<div class="col-md-6">
  @if(!empty($related_roles))
    <h3>ASSIGNED ROLES</h3>
  
    <div class="table-responsive table-condensed">
    <table class="table">
    @foreach($related_roles as $role)
      <tr>
        <td>{{$role->label}}</td>
          <td><a href="{{route('roles.edit',$role->id)}}"
                 class="btn btn-info ">
            <span class="glyphicon glyphicon-edit"></span></a></td>
        <td>
       <form method="POST" action="{{url('role')}}/{{$role->id}}/roles/{{$role->id}}">

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

  </div><!-- end of users related roles list -->
    @endif
  </div> <!--end of row class -->


  </div> <!--end of row class -->
</div><!-- end of the row -->
  <hr>
</div><!-- end of the container -->

<script>


@endsection
