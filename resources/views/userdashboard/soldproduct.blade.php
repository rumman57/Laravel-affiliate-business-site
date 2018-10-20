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
               @foreach($products as $product)
                @if ($loop->first)
                  <h4>Recipient Name : <b><span style="color: green">{{$product->bname}}</span></b></h4>
                  <h4>Recipient Phone: <b><span style="color: #0f5a7f">{{$product->bphone}}</span></b></h4>
                  <h4>Recipient Address: <b><span style="color: crimson">{{$product->baddress}}</span></b></h4>
                @endif
               @endforeach
            </div><br>


            <!-- /.box-header -->
            <div class="box-body">
               <div style="overflow-x:auto;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                  <th style="text-align: center;" width="10%">Num.</th>
                  <th style="text-align: center;" width="20%">Name</th>
                  <th style="text-align: center;" width="20%">Price</th>
                  <th style="text-align: center;" width="20%">Commission</th>
                  <th style="text-align: center;" width="20%">Revenue By Commision</th>
                  <th style="text-align: center;" width="10%">Status</th>
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
                  <td>
                    @if($product->is_approve==1)
                       <button class="btn btn-success">Approved</button>
                    @elseif($product->is_approve==3)
                       <button class="btn btn-danger">Rejected</button>
                    @else
                       <button class="btn btn-warning">Pending</button>
                    @endif 
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
