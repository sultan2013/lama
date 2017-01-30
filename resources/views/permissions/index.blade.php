@extends('layouts.admin_layout')
@include('layouts.top_bar')
@section('dashboard')

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
                                PERMISSIONS
                                <small>Show - Create - Edit - Delete permissions</small>
                            </h2>
                            <a href="{{route('permissions.create')}}" class="btn btn-info">CREATE NEW PERMISSION</a>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" permission="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{route('permissions.create')}}">Create New Permission</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>PERMISSION NAME</th>
                                        <th>PERMISSION LABEL</th>
                                        <th>SHOW</th>
                                        <th>EDIT</th>
                                        <th>DELETE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(!empty($permissions))
                                @foreach($permissions as $permission)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{$permission->name}}</td>
                                        <td>{{$permission->label}}</td>
                                        <td>
                                          <a href="{{route('permissions.show',$permission->id)}}"
                                          class="btn btn-primary">
                                           <span class="glyphicon glyphicon-eye-open"></span>
                                         </a>
                                        </td>

                                    <!-- permission edit button  -->

                                            <td><a href="{{route('permissions.edit',$permission->id)}}"
                                                   class="btn btn-warning ">
                                              <span class="glyphicon glyphicon-edit"></span></a></td>

                                          </td>
                                    <!-- END permission edit button  -->

                                    

                                          
                                    <!-- END permission edit button  -->

                                        

                                        <td>
                                    <!-- permission Delete  button  -->

                                         <form method="POST" action="{{route('permissions.destroy',$permission->id)}}">
                                           {{method_field('DELETE')}}
                                           {{ csrf_field() }}
                                           <button type="submit"
                                                    class="btn btn-danger ">
                                           <span class="glyphicon glyphicon-trash"></span>
                                         </button>
                                         </form>
                                          </td>
                                    <!-- END permission Delete  button  -->

                                       
                                    </tr>
                                @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Table -->

</div><!-- end of container -->
</section>
@endsection
