@extends('myadmin.adminmaster')
@section('title','Products')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Show Product
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Product</a></li>
        <li class="active">Show Product</li>
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
                  <th style="text-align: center;" width="6%">Num.</th>
                  <th style="text-align: center;" width="10%">Name</th>
                  <th style="text-align: center;" width="10%">Buy Price</th>
                  <th style="text-align: center;" width="20%">Sell Price</th>
                  <th style="text-align: center;" width="20%">Commision</th>
                  <th style="text-align: center;" width="20%">Image</th>
                  <th style="text-align: center;" width="7%">Update</th>
                  <th style="text-align: center;" width="7%">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0;?>
              @foreach($products as $product)
              <?php $i++;?>
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$product->name}}</td>
                  <td>{{$product->buyprice}}</td>
                  <td>{{$product->sellprice}}</td>
                  <td>{{$product->commision}}</td>
                  <td style="text-align: center;">
                    @if(isset($product->image))
                    <img src="{{URL::asset($product->image)}}" height="100" width="100">
                    @endif
                  </td>
                  <td>
                     <a href="{{route('products.edit',$product->id)}}"><button class="btn btn-primary">Edit</button></a>
                  </td>
                  <td>
                    <form method="POST" action="{{action('ProductController@destroy',['id'=>$product->id])}}">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                       <span onclick = "return confirm('Are You Sure To Delete ?')" href=""><button class="btn btn-danger">Delete</button></span>
                    </form>
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
