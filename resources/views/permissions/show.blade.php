@extends('layouts.app')

@section('content')
<div class="container">
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
<hr>
  <h4>Related Permissions</h4>
  <hr>
</div><!-- end of the container -->
@endsection
