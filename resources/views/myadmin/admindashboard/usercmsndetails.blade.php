@extends('myadmin.adminmaster')
@section('title','Products')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Commission Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Users</a></li>
        <li class="active">User Commission Details</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <h3>Total Commission : <b><span style="color: green">{{$total}}</span></b></h3>
                <h3>Paid Till: <b><span style="color: #0f5a7f">{{$paid}}</span></b></h3>
                <h3>Paid Remaining: <b><span style="color: crimson">{{$remaining}}</span></b></h3>
            </div><br>

            <div style="margin-left: 20px;">
              <h4 style="color: crimson;">**Note </h4>
              <h5 style="font-size: 17px;">After payment for each user for each product you must submit it  as paid.</h5>
            </div><br>
            <!-- /.box-header -->
            <div class="box-body">
               <div style="overflow-x:auto;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                 <th style="text-align: center;" width="10%">Num.</th>
                  <th style="text-align: center;" width="20%">Name</th>
                  <th style="text-align: center;" width="10%">Price</th>
                  <th style="text-align: center;" width="10%">Commision</th>
                  <th style="text-align: center;" width="10%">Revenue By Commision</th>
                  <th style="text-align: center;" width="10%">Date</th>
                  <th style="text-align: center;" width="10%">Status</th>
                  <th style="text-align: center;" width="10%">Submit as Paid</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0;?>
              @foreach($products as $product)
              <?php $i++;?>
                <tr style="text-align: center;">
                  <td>{{$i}}</td>
                  <td>{{$product->product_name}}</td>
                  <td>{{$product->product_price}}</td>
                  <td>{{$product->product_commission}}%</td>
                  <td>{{(($product->product_price * $product->product_commission)/100)}}</td>  
                  <td>{{date('M j, Y',strtotime($product->created_at))}}</td>   
                  <td>
                    @if($product->is_paid==1)
                       <button class="btn btn-success">Paid</button>
                    @else
                       <button class="btn btn-info">Not Paid</button>
                    @endif 
                  </td>
                  <td><a href="{{route('user.submission.payment',$product->id)}}"><button class="btn btn-primary">Submit As Paid</button></a></td>
                </tr>
               @endforeach
                </tbody>             
              </table>
            </div>
            </div>
            <!-- /.box-body -->
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
