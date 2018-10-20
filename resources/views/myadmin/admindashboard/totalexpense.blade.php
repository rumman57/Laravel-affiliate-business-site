@extends('myadmin.adminmaster')
@section('title','Products')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Total Expense For Product Buying
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Total Bying Expense</a></li>
        <li class="active">Total Bying Expense</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <h3>Total Product: <b><span style="color: green">{{$products->count()}}</span></b></h3>
                <h3>Total Buying Expenses: <b><span style="color: crimson">{{$products->sum('buyprice')}}</span></b></h3>
            </div><br><br>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                  <th style="text-align: center;">Num.</th>
                  <th style="text-align: center;">Name</th>
                  <th style="text-align: center;">Buying Price</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0;?>
              @foreach($products as $product)
              <?php $i++;?>
                <tr style="text-align: center;">
                  <td>{{$i}}</td>
                  <td>{{$product->name}}</td>
                  <td>{{$product->buyprice}}</td>
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
