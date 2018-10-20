@extends('myadmin.adminmaster')
@section('title','Products')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Total Selling Income 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Total Selling Income</a></li>
        <li class="active">Total Selling Income</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <h3>Total Sold Product: <b><span style="color: green">{{$products->count()}}</span></b></h3>
                <h3>Total Sold Price: <b><span style="color: crimson">{{$products->sum('product_price')}}</span></b></h3>
            </div><br><br>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                  <th>Num.</th>
                  <th>Name</th>
                  <th>Selling Price</th>
                  <th>Sold By User</th>
                  <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0;?>
              @foreach($products as $product)
              <?php $i++;?>
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$product->product_name}}</td>
                  <td>{{$product->product_price}}</td>
                  <td>{{$product->user->name}}</td>
                  <td>{{date('M j, Y',strtotime($product->created_at))}}</td>
               @endforeach
                </tbody>             
              </table>
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
