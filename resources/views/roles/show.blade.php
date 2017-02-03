@extends('layouts.admin_layout')
@include('layouts.top_bar')
@section('dashboard')


<!-- the upper part that shows the role details -->
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ROLES
                                <small>Show - Create - Edit - Delete Roles</small>
                            </h2>
  <table class="table">
      <thead>
        <tr>
          <th>Role Name</th>
          <th>Role Label</th>
          <th>Created At</th>
            <th>Updated At</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{$role->name}}</td>
          <td>{{$role->label}}</td>
          <td>{{$role->created_at}}</td>
          <td>{{$role->updated_at}}</td>
        </tr>

      </tbody>
    </table>
</div></div></div></div></div></section>
<!-- END the upper part that shows the role details -->
<section class="content">
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="header">
                   <h1>Related Permissions </h1>
                   <small>tesdklsfjsl dkfjlsdkfj </small>
              </div> <!-- end of header -->
<div>
  <!-- start of the code -->
 @if(!empty($related_permissions))
    <div class="table-responsive table-condensed">
    <table class="table">
    @foreach($related_permissions as $permission)
      <tr>
        <td>{{$permission->label}}</td>
          <td><a href="{{route('permissions.edit',$permission->id)}}"
                 class="btn btn-info ">
            <span class="glyphicon glyphicon-edit"></span></a></td>
        <td>
       <form method="POST" action="{{url('role')}}/{{$role->id}}/permission/{{$permission->id}}">

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
</div>
  </div><!-- end roles list -->
    @endif

<!-- end of the code -->
</div>

          </div> <!-- end of card class -->
      </div> <!-- end of col-md-12 -->
  </div> <!-- end of row class -->
</section><!-- end of permission section -->



<section class="content">
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="header">
                   <h1>Related Permissions </h1>
                   <small>tesdklsfjsl dkfjlsdkfj </small>
              </div> <!-- end of header -->
             
<!-- start of the code -->
<div class="body">
   <form method="post" action="{{url('add_permissions_to_roles')}}/{{$role->id}}">
                  <input type="checkbox" id="basic_checkbox_2" class="filled-in" >
                  @foreach($all_permissions as $permission)
                  <label for="basic_checkbox_2">
                    
                  {{$permission->label}}
                  
                  </label>
                  @endforeach

    

                   <button style="margin: 0px 0px 20px 30px ;" type="submit" v-bind:class ="{disabled:isEmpty}" class="btn btn-default ">save</button>
</form>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</div>
<!-- end of the code -->

          </div> <!-- end of card class -->

      </div> <!-- end of col-md-12 -->
  </div> <!-- end of row class -->
</section><!-- end of permission section -->

@endsection
