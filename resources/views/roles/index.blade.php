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
                                ROLES
                                <small>Show - Create - Edit - Delete Roles</small>
                            </h2>
                            <a href="{{route('roles.create')}}" class="btn btn-info">CREATE NEW ROLE</a>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{route('roles.create')}}">Create New Role</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ROLE NAME</th>
                                        <th>ROLE LABEL</th>
                                        <th>SHOW</th>
                                        <th>EDIT</th>
                                        <th>DELETE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(!empty($roles))
                                @foreach($roles as $role)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->label}}</td>
                                        <td>
                                          <a href="{{route('roles.show',$role->id)}}"
                                          class="btn btn-primary">
                                           <span class="glyphicon glyphicon-eye-open"></span>
                                         </a>
                                        </td>
<<<<<<< HEAD
                                     
=======
                                        
                                          
>>>>>>> a59d21563f8176f0a03af0aabe55c863197cf468
                                    <!-- role edit button  -->

                                            <td><a href="{{route('roles.edit',$role->id)}}"
                                                   class="btn btn-warning ">
                                              <span class="glyphicon glyphicon-edit"></span></a></td>
<<<<<<< HEAD
                                          </td>
                                    <!-- END role edit button  -->

                                    
=======
                                          
                                    <!-- END role edit button  -->

                                        
>>>>>>> a59d21563f8176f0a03af0aabe55c863197cf468
                                        <td>
                                    <!-- role Delete  button  -->

                                         <form method="POST" action="{{route('roles.destroy',$role->id)}}">
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
