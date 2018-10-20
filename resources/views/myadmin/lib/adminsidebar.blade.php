<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        
        </div>
        <div class="pull-left info">
          <p></p>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
         @if(Auth::user()->role==1)
            <a href="{{route('admin.index')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
         @else
             <a href="{{route('user.index')}}">
               <i class="fa fa-dashboard"></i> <span>Dashboard</span>
             </a>
         @endif
        </li>
       
        @if(Auth::user()->role==1)
           <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Products</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('products.create')}}"><i class="fa fa-circle-o"></i>Create Product</a></li>
              <li><a href="{{route('products.index')}}"><i class="fa fa-circle-o"></i>Show Product</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Users</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('add.user')}}"><i class="fa fa-circle-o"></i>Add Users</a></li>
              <li><a href="{{route('all.users')}}"><i class="fa fa-circle-o"></i>All Users</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Sells</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('selling.requests')}}"><i class="fa fa-circle-o"></i>All Selling Request</a></li>

               <li><a href="{{route('selling.requests.approved')}}"><i class="fa fa-circle-o"></i>Approved Selling Request</a></li>

                <li><a href="{{route('selling.requests.rejected')}}"><i class="fa fa-circle-o"></i>Rejected Selling Request</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Statistics</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('admin.total.expense')}}"><i class="fa fa-circle-o"></i>Total Buying Expense</a></li>
              <li><a href="{{route('admin.selling.income')}}"><i class="fa fa-circle-o"></i>Total Selling Income</a></li>
            </ul>
          </li>
            <li class="treeview">
              <a href="{{route('admin.profile')}}">
                <i class="fa fa-edit"></i> <span>Settings</span>
                <span class="pull-right-container">
                 
                </span>
              </a>
          </li>
        @endif


        @if(Auth::user()->role==2)
           <li class="treeview">
              <a href="{{route('available.products')}}">
                <i class="fa fa-edit"></i> <span>Create Delivery</span>
                <span class="pull-right-container">
                 
                </span>
              </a>
          </li>
          <li class="treeview">
              <a href="{{route('sold.product.reference')}}">
                <i class="fa fa-edit"></i> <span>Sold Products</span>
                <span class="pull-right-container">
                 
                </span>
              </a>
          </li>
          <li class="treeview">
              <a href="{{route('user.product.revenue')}}">
                <i class="fa fa-edit"></i> <span>Revenue By Commission</span>
                <span class="pull-right-container">
                 
                </span>
              </a>
          </li>
          <li class="treeview">
              <a href="{{route('admin.profile')}}">
                <i class="fa fa-edit"></i> <span>Settings</span>
                <span class="pull-right-container">
                 
                </span>
              </a>
          </li>
        @endif
       {{--<li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Post</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('posts.create')}}"><i class="fa fa-circle-o"></i> Add Posts</a></li>
            <li><a href="{{route('posts.index')}}"><i class="fa fa-circle-o"></i> Show Posts</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('categories.create')}}"><i class="fa fa-circle-o"></i> Add Categories</a></li>
            <li><a href="{{route('categories.index')}}"><i class="fa fa-circle-o"></i> Show Categories</a></li>
          </ul>
        </li>

     
         <li>
          <a href="{{route('admin.contact')}}">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="">
              <small class="label pull-right bg-green">{{$notificatios->count()}}</small>
            </span>
          </a>
        </li>--}}
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>