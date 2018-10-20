@extends('myadmin.adminmaster')
@section('title','Sell Products')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Delivery
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Products</a></li>
        <li class="active">Create Delivery</li>
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
       <form action="{{route('sell.product')}}" method="post" enctype="multipart/form-data">
       {{csrf_field()}}
         
         <h4>Recipient Details</h4><br>
         <div class="row">

         <div class="col-xs-5 col-md-5">
          <div class="form-group has-feedback">
             <label>Recipient Name</label>
            <input type="text" class="form-control" placeholder="Recipient Name" name="bname" value="{{Request::old('bname')}}" required="1" >
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          </div>

          <div class="col-xs-5 col-md-5">
          <div class="form-group has-feedback">
             <label>Recipient Number</label>
            <input type="text" class="form-control" placeholder="Recipient Number" name="bphone" value="{{Request::old('bphone')}}" required="1" >
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          </div>
          
          <div class="col-xs-2 col-md-2">
          </div>
         </div>

        <div class="row">

           <div class="col-xs-5 col-md-5">
              <div class="form-group has-feedback">
               <label>Recipient Email</label>
              <input type="email" class="form-control" placeholder="Recipient Email" name="bemail" value="{{Request::old('bemail')}}"  >
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            </div>

            <div class="col-xs-5 col-md-5">
               <div class="form-group has-feedback">
               <label>Recipient Zone/District</label>
              <input type="text" class="form-control" placeholder="Recipient Zone/District" name="bdistrict" value="{{Request::old('bdistrict')}}">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            </div>
            
            <div class="col-xs-2 col-md-2">
            </div>
        </div>
         
          <div class="row">
           <div class="col-xs-7">
            <div class="form-group has-feedback">
               <label>Recipient Address</label>
               <textarea class="form-control" placeholder="Recipient Address" name="baddress" required="1" cols="40" rows="6">{{Request::old('baddress')}}</textarea>
            </div>
            </div>
         </div>

         <div class="row">
         <div class="col-xs-7">
          <div class="form-group has-feedback">
            <label>Product Name</label>
            <input type="text" class="form-control" placeholder="Product Name" name="product_name" value="@foreach($products as $product){{$product->name}}@if(!$loop->last),@endif @endforeach"
             required="1" readonly="1">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          </div>
         </div>

    
         <div class="row">
         <div class="col-xs-7">
          <div class="form-group has-feedback">
             <label>Product Price</label>
            <input type="text" class="form-control" placeholder="Product Sell Price" name="product_price" value="@foreach($products as $product){{$product->sellprice}}@if(!$loop->last),@endif @endforeach" required="1">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          </div>
         </div>

         <div class="row">
         <div class="col-xs-7">
          <div class="form-group has-feedback">
             <label>Product Commission</label>
            <input type="text" class="form-control" placeholder="Product Comission" name="product_commission" value="@foreach($products as $product){{$product->commision}}@if(!$loop->last),@endif @endforeach" required="1" readonly="">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          </div>
         </div>

         <div class="row">
         <div class="col-xs-7">
          <div class="form-group has-feedback">
             <label>Delivery On Day</label>
            <input type="date" class="form-control" placeholder="Ex: 12-12-2018" name="delveryonday"   required="1">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          </div>
         </div>

         <div class="row">
         <div class="col-xs-7">
          <div class="form-group has-feedback">
             <label>Delivery Time</label>
            <input type="text" class="form-control" placeholder="Ex: 10:00 am" name="delverytime" value="{{Request::old('delverytime')}}" >
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          </div>
         </div>
         

         <div class="row">
           <div class="col-xs-7">
            <div class="form-group has-feedback">
               <label>Special Instructions</label>
               <textarea class="form-control" placeholder="Recipient Address" name="special_ins" cols="40" rows="6">{{Request::old('special_ins')}}</textarea>
            </div>
            </div>
         </div>
          <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}"> 
          <input type="hidden" class="form-control" name="product_id" value="@foreach($products as $product){{$product->id}}@if(!$loop->last),@endif @endforeach">

 
          <div class="row">
          <!-- /.col -->
            <div class="col-xs-3">
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="Create Delivery">
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

