@extends('layouts.app')

@section('content')
<div class="container">
<h3>PERMISSIONS</h3>
<a href="{{route('permissions.create')}}" class="btn btn-info">CREATE NEW PERMISSION</a>
<hr>
<div class="col-sm-12">
  <h3>PERMISSIONS' LIST</h3>
  @if(!empty($permissions))
  <div class="table-responsive table-condensed">
  <table class="table">
  @foreach($permissions as $permission)
    <tr>
<!-- permission label -->
      <td>{{$permission->label}}</td>
<!-- END of permission label -->


<!-- permission show button and adding permissions -->
      <td>
        <a href="{{route('permissions.show',$permission->id)}}"
        class="btn btn-primary">
         <span class="glyphicon glyphicon-eye-open"></span>
       </a>
      </td>
<!-- END of permission show button and adding permissions -->



<!-- permissionpermission edit button  -->

        <td><a href="{{route('permissions.edit',$permission->id)}}"
               class="btn btn-warning ">
          <span class="glyphicon glyphicon-edit"></span></a></td>
      <td>
<!-- END permissionpermission edit button  -->


<!-- permissionpermission Delete  button  -->

     <form method="POST" action="{{route('permissions.destroy',$permission->id)}}">
       {{method_field('DELETE')}}
       {{ csrf_field() }}
       <button type="submit"
                class="btn btn-danger ">
       <span class="glyphicon glyphicon-trash"></span>
     </button>
     </form>
      </td>
<!-- END permissionpermission Delete  button  -->
    </tr>
  @endforeach
</table>

</div><!-- end permission list -->
  @endif
</div> <!--end of row class -->
</div><!-- end of container -->
@endsection
