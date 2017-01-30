@extends('layouts.admin_layout')
@include('layouts.top_bar')
@section('dashboard')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD SULTAN :)</h2>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                USERS
                                <small>Show - Create - Edit - Delete USERS</small>
                            </h2>
                            <a href="{{route('roles.create')}}" class="btn btn-info">CREATE NEW USER</a>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{route('roles.create')}}">Create New user</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>USER NAME</th>
                                        <th>USER EMAIL</th>
                                        <th>SHOW</th>
                                        <th>EDIT</th>
                                        <th>DELETE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(!empty($users))
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                          <a href="{{route('users.show',$user->id)}}"
                                          class="btn btn-primary">
                                           <span class="glyphicon glyphicon-eye-open"></span>
                                         </a>
                                        </td>

                                    <!-- role edit button  -->

                                            <td><a href="{{route('users.edit',$user->id)}}"
                                                   class="btn btn-warning ">
                                              <span class="glyphicon glyphicon-edit"></span></a></td>

                                          </td>
                                    <!-- END role edit button  -->

                                    

                                          
                                    <!-- END role edit button  -->

                                        

                                        <td>
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
