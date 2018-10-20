@extends('myadmin.adminmaster')
@section('title','Dashboard')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       
      <div class="row">

        <div class="col-xs-12 col-md-4">
          <div class="box">
           <div class="row">
             <div class="col-md-12 col-xs-12  text-center">
                <div>
                      <br><br> <h3> <b><span style="color: green">Total Income:</span></b></h3>
                       <h3>{{$sellingincome->sum('product_price')}} Tk</h3><br>
                        <a href="{{route('admin.selling.income')}}"><button class="btn btn-info">View Details</button></a><br><br>
                </div>
             </div>
           </div>
          </div>
        </div>
        <!-- /.col -->

        <div class="col-xs-12 col-md-4">
          <div class="box">
           <div class="row">
             <div class="col-md-12 col-xs-12  text-center">
                <div>
                       <br><br> <h3> <b><span style="color: green">Total Product Sell:</span></b></h3>
                       <h3>{{$sellingincome->count()}}</h3><br>
                        <a href="{{route('selling.requests.approved')}}"><button class="btn btn-info">View Details</button></a><br><br>
                </div>
             </div>
           </div>
          </div>
        </div>
        <!-- /.col -->

        <div class="col-xs-12 col-md-4">
          <div class="box">
           <div class="row">
             <div class="col-md-12 col-xs-12  text-center">
                <div>
                      <br><br> <h3> <b><span style="color: green">Total Paid Affilate:</span></b></h3>
                       <h3>{{$paidaffiliate}} Tk</h3><br><br><br>
                </div>
             </div>
           </div>
          </div>
        </div>
        <!-- /.col -->


      </div>
      <!-- /.row -->

      <div class="row">

        <div class="col-xs-12 col-md-4">
          <div class="box">
           <div class="row">
             <div class="col-md-12 col-xs-12  text-center">
                <div>
                      <br><br> <h3> <b><span style="color: green">Pending Delivery:</span></b></h3>
                       <h3>{{$pendingproduct->count()}}</h3><br>
                        <a href="{{route('selling.requests')}}"><button class="btn btn-info">View Details</button></a><br><br>
                </div>
             </div>
           </div>
          </div>
        </div>
        <!-- /.col -->

        <div class="col-xs-12 col-md-4">
          <div class="box">
           <div class="row">
             <div class="col-md-12 col-xs-12  text-center">
                <div>
                       <br><br> <h3> <b><span style="color: green">Completed Delivery:</span></b></h3>
                       <h3>{{$completedproduct->count()}}</h3><br>
                        <a href="{{route('selling.requests')}}"><button class="btn btn-info">View Details</button></a><br><br>
                </div>
             </div>
           </div>
          </div>
        </div>
        <!-- /.col -->

        <div class="col-xs-12 col-md-4">
          <div class="box">
           <div class="row">
             <div class="col-md-12 col-xs-12  text-center">
                <div>
                      <br><br> <h3> <b><span style="color: green">Unpaid Bill:</span></b></h3>
                       <h3>{{$unpaidaffiliate}} Tk</h3><br><br><br>
                </div>
             </div>
           </div>
          </div>
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
  @include('myadmin.lib.adminfooter')
@endsection