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
<!-- the  part that shows related permissions -->
<section class="content" style="margin-top: 10px;">
<div class="container-fluid">
            <!-- Basic Table -->
<div class="row clearfix">
<div class="col-md-12">
<div class="card">
<div class="header">
    <h2>
     Related Permissions
    <small>Show - Create - Edit - Delete Roles</small>
    </h2>
</div>
   <form style="margin-top: 20px ;" method="post" action="{{url('add_permissions_to_roles')}}/{{$role->id}}">
    {{csrf_field()}}
                  @if($all_permissions->count() >0)
          <select multiple class="form-control" id="sel2" name="permissions[]"> 
                  @foreach($all_permissions as $permission)
                  <option value="{{$permission->id}}">{{$permission->label}}</option>
                  @endforeach
                  @endif
        </select>

                   <button style="margin: 0px 0px 20px 30px ;" type="submit" v-bind:class ="{disabled:isEmpty}" class="btn btn-default ">save</button>
</form>
</div><!-- end of first row -->
</div><!-- end of col-md-12 -->
</div><!-- end of row-clearfix -->
</div><!-- end of container-fluid -->
</section>




<section class="content" style="margin-top: 10px;">
 <div class="container-fluid">
            <!-- Basic Table -->
<div class="row clearfix">
<div class="col-md-12">
<div class="card">
<div class="header">
      <h2>
       ASSIGNED PERMISSIONS
      <small>Show - Create - Edit - Delete Roles</small>
      </h2>
</div>
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
    </div> <!-- end of card -->
  </div> <!--end of col-ms-12 -->
</div><!-- end of the row-clearfix -->
</div><!-- end of the container -->
</section>


@endsection
