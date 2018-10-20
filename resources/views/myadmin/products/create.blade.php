@extends('myadmin.adminmaster')
@section('title','Products')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Product
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Product</a></li>
        <li class="active">Add Product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <small>Below add the Blog Product</small>

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
       <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
       {{csrf_field()}}

         <div class="row">
         <div class="col-xs-7">
          <div class="form-group has-feedback">
            <label>Product Name</label>
            <input type="text" class="form-control" placeholder="Product Name" name="name" value="{{Request::old('name')}}" required="1">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          </div>
         </div>

         <div class="row">
         <div class="col-xs-7">
          <div class="form-group has-feedback">
             <label>Product Buy Price</label>
            <input type="text" class="form-control" placeholder="Product Buy Price" name="buyprice" value="{{Request::old('buyprice')}}" required="1">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          </div>
         </div>

         <div class="row">
         <div class="col-xs-7">
          <div class="form-group has-feedback">
             <label>Product Sell Price</label>
            <input type="text" class="form-control" placeholder="Product Sell Price" name="sellprice" value="{{Request::old('sellprice')}}" required="1">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          </div>
         </div>

         <div class="row">
         <div class="col-xs-7">
          <div class="form-group has-feedback">
             <label>Product Comission</label>
            <input type="text" class="form-control" placeholder="Product Comission" name="commision" value="{{Request::old('commision')}}" required="1">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          </div>
         </div>


         <div class="row">
         <div class="col-xs-7">
          <div class="form-group has-feedback">
          <label for="sel1">Product Image:</label>
            <input type="file" class="form-control" name="image">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          </div>
         </div>

       
 
          <div class="row">
          <!-- /.col -->
            <div class="col-xs-3">
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="CREATE">
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

