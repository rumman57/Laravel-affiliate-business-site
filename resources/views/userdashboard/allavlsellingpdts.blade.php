@extends('myadmin.adminmaster')
@section('title','Dashboard')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Availabe For Selling Products
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sell Products</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <form method="POST" action="{{route('products.selected')}}">
        {{csrf_field()}}
        <div class="row">
          <div class="col-md-4 col-xs-12">
              <br><button class="btn btn-success btn-block">Submit Seleted Products</button><br>
          </div>
         
        </div>
        
       @foreach($products->chunk(6) as $chunkproduct)
       <div class="row">
         @foreach($chunkproduct as $product)
         <div class="col-md-2 col-xs-12" class="text-center">
              <img style="display: block; margin-left: auto;margin-right: auto; " src="{{$product->image}}" height="170" width="170">
            <div class="text-center">
             <h3>{{$product->name}}</h3>
             <h4>Price: {{$product->sellprice}} Taka</h4>
             <h4>Commission: {{$product->commision}}%</h4>
             <div>
                 <div class="checkbox">
                  <label><input type="checkbox" value="{{$product->id}}" name="check_product[]">SELECT</label>
                </div>
             </div>
           </div>
         </div>
         @endforeach 
       </div>
       @endforeach
       </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('footer')
  @include('myadmin.lib.adminfooter')
@endsection