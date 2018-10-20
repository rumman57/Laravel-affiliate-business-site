@extends('myadmin.adminmaster')
@section('title','Products')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sold Products
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Products</a></li>
        <li class="active">Sold Products</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div style="overflow-x:auto;">
              <table id="example1" class="table table-bordered table-striped" >
                <thead>
                 <tr>
                  <th style="text-align: center;">Num.</th>
                  <th style="text-align: center;">Reference ID</th>
                  <th style="text-align: center;">Date</th>
                  <th style="text-align: center;">View</th>
                </tr>
                </thead>
                <tbody style="overflow: auto;">
                <?php $i=0;?>
              @foreach($products as $product)
              <?php $i++;?>
                <tr style="text-align: center;">
                  <td>{{$i}}</td>
                  <td>{{$product->ref_id}}</td>   
                  <td>{{date('M j, Y h:i a',strtotime($product->created_at))}}</td>   
                  <td>
                    <a href="{{route('sold.product',$product->ref_id)}}"><button class="btn btn-primary">View Details</button></a>
                  </td>
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
