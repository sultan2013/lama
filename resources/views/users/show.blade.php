@extends('layouts.app')

@section('content')
<div class="container">

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
<div class="row" id="relatedPermissions">
   <div class="col-md-6">
  <form method="post" action="">
    {{csrf_field()}}
    @if($all_roles->count() >0)
    @foreach($all_roles as $role)
  </br>
    <label class="checkbox-inline">
      <input name="permissions[]"
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
</div><!-- end of first row -->
  </div> <!--end of row class -->
</div><!-- end of the row -->
  <hr>
</div><!-- end of the container -->

<script>


@endsection
