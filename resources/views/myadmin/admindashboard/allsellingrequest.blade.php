@extends('myadmin.adminmaster')
@section('title','Products')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Products Selling Requests
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Products</a></li>
        <li class="active">All Selling Requests</li>
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                  <th style="text-align: center;" width="10%">Num.</th>
                  <th style="text-align: center;" width="20%">Name</th>
                  <th style="text-align: center;" width="10%">Price</th>
                  <th style="text-align: center;" width="10%">Commision</th>
                  <th style="text-align: center;" width="10%">Revenue By Commision</th>
                  <th style="text-align: center;" width="10%">Sold User</th>
                  <th style="text-align: center;" width="10%">Date</th>
                  <th style="text-align: center;" width="10%">Status</th>
                  <th style="text-align: center;" width="10%">Status</th>
                  <th style="text-align: center;" width="10%">Details</th>
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
                  <td>{{$product->product_commission}}%</td>
                  <td>{{(($product->product_price * $product->product_commission)/100)}}</td>   
                  <td>{{$product->user->name}}</td>   
                  <td>{{date('M j, Y',strtotime($product->created_at))}}</td>   
                  <td>
                    @if($product->is_approve==1)
                       <button class="btn btn-success">Approved</button>
                    @elseif($product->is_approve==3)
                       <button class="btn btn-danger">Rejected</button>
                    @else
                       <button class="btn btn-warning">Pending</button>
                    @endif 
                  </td>
                  <td>
                    @if($product->is_complete==1)
                       <button class="btn btn-info">Completed</button>
                    @else
                       <button class="btn btn-warning">Incomplete</button>
                    @endif 
                  </td>
                  <td><a href="{{route('product.details',$product->id)}}"><button class="btn btn-primary">View</button></a></td>
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
