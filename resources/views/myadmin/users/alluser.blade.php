@extends('myadmin.adminmaster')
@section('title','Products')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Show Users
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Users</a></li>
        <li class="active">All Users</li>
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
                  <th style="text-align: center;" width="20%">Email</th>
                  <th style="text-align: center;" width="20%">Total Product Sell</th>
                  <th style="text-align: center;" width="20%">Commission Settings</th>
                  <th style="text-align: center;" width="10%">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0;?>
              @foreach($users as $user)
              <?php $i++;?>
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>
                    @php $count = 0; @endphp
                      @foreach($user->sell_products as $usp)
                        @if($usp->is_approve==1)
                          @php $count++; @endphp
                        @endif
                      @endforeach
                      {{$count}}
                  </td>
                  <td> <a href="{{route('user.commission.details',$user->id)}}"><button class="btn btn-primary">Check Details</button></a></td>
                  <td>
                    <form method="POST" action="{{action('UserController@destroy',['id'=>$user->id])}}">
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
