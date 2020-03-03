<div class="leftpanel">
		<div class="media profile-left">
			<a class="pull-left profile-thumb" href="profile.html">
				<img class="img-circle" src="{{asset('asset/back/images/photos/profile.png')}}" alt="">
			</a>
			<div class="media-body">
				<h4 class="media-heading"> {{Session::get('site_admin')}}</h4>
				<small class="text-muted">ADMIN</small>
			</div>
		</div><!-- media -->
				
				<h5 class="leftpanel-title">Navigation</h5>
				<ul class="nav nav-pills nav-stacked">
					<li class="active"><a href="{{url('admin/dashboard')}}"><i class="fa fa-home"></i> <span>Dashbaord</span></a></li>
					
					<li class="parent"><a href=""><i class="fa fa-th"></i> <span> Products  <span class="badge badge-info"> {{Session::get('totalproduct')}}</span></span></a>
						<ul class="children">
							<li><a href="{{ url('admin/product/add') }}">Add Product</a></li>
							<li><a href="{{ url('admin/product/archive') }}">Product List</a></li>
						</ul>
					</li>
					
					<li class="parent"><a href=""><i class="fa fa-shopping-cart"></i> <span>Order</span></a>
						<ul class="children">
							<li><a href="{{ url('admin/order/pending') }}">Pending Order </a></li>
							<li><a href="{{ url('admin/order/delivered') }}">Delivered Order</a></li>
							<li><a href="{{ url('admin/order/report') }}">Reports</a></li>
						</ul>
					</li>


				 
					<li class="parent"><a href=""><i class="fa fa-pencil-square"></i> <span>Account</span></a>
						<ul class="children">
							<li><a href="{{ url('admin/transaction/add') }}">Transacton Entry</a></li>
							<li><a href="{{ url('admin/transaction/archive') }}">Transaction Archive</a></li>
							<li><a href="{{ url('admin/transaction/category') }}">Transaction Category</a></li>                       
						</ul>
					</li>
					<li class="parent"><a href=""><i class="fa fa-users"></i> <span>Customer</span></a>
						<ul class="children">
							<li><a href="orders_pending.php">Customer List</a></li>
							<li><a href="order_delivered.php">Delivered Order</a></li>
							<li><a href="order_report.php">Reports</a></li>
						</ul>
					</li>

					
					
					<li class="parent"><a href=""><i class="fa fa-list"></i> <span>Pages</span></a>
						<ul class="children">
						<li><a href="{{route('page.index')}}">Page Archive</a></li>
	                     </ul>
					</li>
					<li class="parent"><a href=""><i class="fa fa-cog"></i> <span>Settings</span></a>
						<ul class="children">
							<li><a href="{{ url('admin/product/category') }}">Product Category</a></li>
							<li><a href="{{ url('admin/product/brand') }}"> Brand List</a></li>
							<li><a href="{{ url('admin/product/color') }}">Color</a></li>
							<li><a href="{{ url('admin/slider') }}">Slider </a></li>
							<li><a href="{{ url('admin/site') }}">Site Profile</a></li>

							
						</ul>
					</li>
					
				</ul>
				
			</div><!-- leftpanel -->