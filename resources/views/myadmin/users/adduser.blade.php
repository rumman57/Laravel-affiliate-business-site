@extends('myadmin.adminmaster')
@section('title','Sell Products')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User</a></li>
        <li class="active">Add User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <small></small>

              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
             @include('myadmin.lib.message')
       <form action="{{route('add.user')}}" method="post" enctype="multipart/form-data">
       {{csrf_field()}}

         <div class="row">
         <div class="col-xs-7">
          <div class="form-group has-feedback">
            <label>Username</label>
            <input type="text" class="form-control" placeholder="User Name" name="name" value="{{Request::old('name')}}" required="1">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          </div>
         </div>

        <div class="row">
         <div class="col-xs-7">
          <div class="form-group has-feedback">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="User Emal" name="email" value="{{Request::old('email')}}" required="1">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          </div>
         </div>

          <div class="row">
         <div class="col-xs-7">
          <div class="form-group has-feedback">
            <label>Phone</label>
            <input type="text" class="form-control" placeholder="User Phone" name="phone" value="{{Request::old('phone')}}" >
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          </div>
         </div>

         <div class="row">
         <div class="col-xs-7">
          <div class="form-group has-feedback">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="User Password" name="password" value="{{Request::old('password')}}" required="1">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          </div>
         </div> 

         <div class="row">
         <div class="col-xs-7">
          <div class="form-group has-feedback">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="User Confirm Password" name="password_confirmation" value="{{Request::old('password_confirmation')}}" required="1">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          </div>
         </div>

    
         

 
          <div class="row">
          <!-- /.col -->
            <div class="col-xs-3">
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="ADD">
            </div>
            <!-- /.col -->
          </div>

         </form>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('footer_js')
<script type="text/javascript" src="{{ URL::asset('https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/select2.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $(".js-example-basic-single").select2();
    });
    </script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
@endsection
@section('footer')
@include('myadmin.lib.adminfooter')
@endsection

