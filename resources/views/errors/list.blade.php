<div class="row">
  <div class="col-sm-6">
@if($errors->count() > 0)
    <div class="alert alert-danger">

<ul class="list-group">
@foreach($errors->all() as $error)
  <li class="group-list-item ">{{$error}}</li>
@endforeach
</ul>

</div><!-- end of errors div -->
@endif
</div><!-- end row colm -->
  </div> <!-- end class row -->
