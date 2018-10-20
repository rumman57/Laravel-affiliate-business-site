@extends('myadmin.adminmaster')
@section('title','Products')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Products Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Products</a></li>
        <li class="active">Product Details</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           <div class="row">
             <div class="col-md-11 col-xs-12 col-md-offset-1 col-xs-offset-1">
                    <div>
                      <h2 class="text-center">Product Information</h2>
                      <div>
                        <h4><b>Product Name: </b>{{$product->product_name}}</h4>
                        <h4><b>Product Price: </b>{{$product->product_price}}</h4>
                        <h4><b>Product Commission: </b>{{$product->product_commission}}%</h4>
                      </div>
                   </div>

                   <div>
                      <h2 class="text-center">Buyer Information</h2>
                      <div>
                        <h4><b>Name: </b>{{$product->bname}}</h4>
                        <h4><b>Email: </b>{{$product->bemail}}</h4>
                        <h4><b>Phone: </b>{{$product->bphone}}</h4>
                        <h4><b>Address: </b>{{$product->baddress}}</h4>
                        <h4><b>District: </b>{{$product->bdistrict}}</h4>
                        <h4><b>Delivery On Day: </b>{{$product->delveryonday}}</h4>
                        <h4><b>Delivery On Time: </b>{{$product->delverytime}}</h4>
                        <h4><b>Special Instructions: </b></h4><p style="font-size: 18px;">{{$product->special_ins}}</p>
                      </div>
                   </div>
             </div>
           </div>
           <div class="row">
             <div class="col-md-11 col-xs-12 col-md-offset-1">
                <h3>Current Status: </h3>
                @if($product->is_approve==1)
                   <button class="btn btn-success">Approved</button>
                @elseif($product->is_approve==3)
                   <button class="btn btn-danger">Rejected</button>
                @else
                   <button class="btn btn-warning">Pending</button>
                @endif

                 @if($product->is_complete==1)
                       <button class="btn btn-info">Completed</button>
                 @else
                       <button class="btn btn-warning">Incomplete</button>
                @endif

                @if($product->is_approve==1)
                   <button class="btn btn-info">Ongoing</button>
                @elseif($product->is_complete==1)
                   <button class="btn btn-info">Completed</button>
                @endif
             </div><br><br>
             
           </div>
           <div class="row">

             <div class="col-md-11 col-xs-12 col-md-offset-1">
              <h3>Take Action: </h3>
              <br><h4>First Step: </h4>
                <a href="{{route('product.approved',$product->id)}}"><button class="btn btn-success">Make It Approved</button></a>
                <a href="{{route('product.rejected',$product->id)}}"><button class="btn btn-danger">Make It Rejected</button></a><br><br>
              <h4>Second Step: </h4>
              <h5 style="color: red;"><b>***Note</b></h5>
              <p style="font-size: 18px;">1. <span style="color: crimson;">If the product is rejected, don't apply this step</span></p>
              <p style="font-size: 18px;">2. <span style="color: forestgreen;">After doing approvation & user's payment mark it as completed.</span></p>
                <a href="{{route('make.product.completed',$product->id)}}"><button class="btn btn-info">Mark It Completed</button></a>
             </div>
             
           </div><br><br>
              
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
@section('footer')
@include('myadmin.lib.fortable')
@endsection
