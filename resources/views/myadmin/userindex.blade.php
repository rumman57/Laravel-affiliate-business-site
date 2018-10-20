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
                      <br><br> <h3> <b><span style="color: green">Total Affiliate Sell:</span></b></h3>
                       <h3>{{$total}} Tk</h3><br>
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
                       <br><br> <h3> <b><span style="color: green">Unpaid Bill</span></b></h3>
                       <h3>{{$remaining}} Tk</h3><br>
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
                      <br><br> <h3> <b><span style="color: green">Paid Affilate:</span></b></h3>
                       <h3>{{$paid}} Tk</h3><br>
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
                      <br><br> <h3> <b><span style="color: green">Pending Delivery</span></b></h3>
                       <h3>{{$pendingproduct->count()}}</h3><br>
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
                      <br><br> <h3> <b><span style="color: green">Completed Delivery</span></b></h3>
                       <h3>{{$completedproduct->count()}}</h3><br>
                </div>
             </div>
           </div>
          </div>
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->
      
       
            <!-- /.row --><br><br>
       <div class="row">
        <div class="col-xs-12 col-md-4  col-md-offset-4">
          <div class="box" class="text-center">
           <div class="row">
             <div class="col-md-12 col-xs-12 text-center">
                <div>
                      <a href="{{route('available.products')}}"><h3>Create Delivery</h3></a><br>
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