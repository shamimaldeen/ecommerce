<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Bootstrap-ecommerce by Vosidiy">
	<title>@yield('title') - Smart.com.bd </title>
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	<!-- jQuery -->
	<script src="{{asset('asset/front/js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>
	<!-- Bootstrap4 files-->
	<script src="{{asset('asset/front/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
	<link href="{{asset('asset/front/css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>
	<!-- Font awesome 5 -->
	<link href="{{asset('asset/front/fonts/fontawesome/css/fontawesome-all.min.css')}}" type="text/css" rel="stylesheet">
	<!-- plugin: owl carousel  -->
	<link href="{{asset('asset/front/plugins/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
	<link href="{{asset('asset/front/plugins/owlcarousel/assets/owl.theme.default.css')}}" rel="stylesheet">
	<script src="{{asset('asset/front/plugins/owlcarousel/owl.carousel.min.js')}}"></script>
	<!-- custom style -->
	<link href="{{asset('asset/front/css/ui.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{asset('asset/front/css/responsive.css')}}" rel="stylesheet" media="only screen and (max-width: 1200px)" />
	<!-- plugin: fancybox  -->
	<script src="{{asset('asset/front/plugins/fancybox/fancybox.min.js')}}" type="text/javascript"></script>
	<link href="{{asset('asset/front/plugins/fancybox/fancybox.min.css')}}" type="text/css" rel="stylesheet">
	<link href="{{asset('asset/front/css/lightgallery.min.css')}}" type="text/css" rel="stylesheet">

	<!-- custom javascript -->
	<script src="{{asset('asset/front/js/lightgallery.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('asset/front/js/script.js')}}" type="text/javascript"></script>

	<script type="text/javascript">
		/// some script
		// jquery ready start
		$(document).ready(function() {
			// jQuery code
		});
		// jquery end
	</script>
</head>
<body>
	<header class="section-header">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">
				<a class="navbar-brand" href="{{url('/')}}"><img class="logo" src="{{asset('uploads/site/'.$siteobject->sitelogo)}}" alt="alibaba style e-commerce html template file" title="alibaba e-commerce html css theme">   </a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop" aria-controls="navbarTop" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarTop">
					<ul class="navbar-nav mr-auto">
						
					</ul>
					<ul class="navbar-nav">
						<li class="nav-item"><a href="{{url('/')}}" class="nav-link" > <i class="fa fa-home"></i>  </a></li>
						<li class="nav-item"><a href="{{url('product/brand/43')}}" class="nav-link" >Brands</a></li>
						<li class="nav-item"><a href="{{url('page/'.(1))}}/terms-and-policy" class="nav-link" > Terms and policy </a></li>
						<li class="nav-item"><a href="{{url('page/'.(2))}}/money-refund" class="nav-link" > Money refund  </a></li>
						<li class="nav-item"><a href="{{url('page/'.(3))}}/payment" class="nav-link" > Payment  </a></li>
						<li class="nav-item"><a href="{{url('contact')}}" class="nav-link" > Contact  </a></li>
					</ul> <!-- navbar-nav.// -->
				</div> <!-- collapse.// -->
			</div>
		</nav>
		<section class="header-main shadow-sm">
			<div class="container">
				<div class="row-sm align-items-center">
					<div class="col-lg-4-24 col-sm-3">
						<div class="category-wrap dropdown py-1">
							<button type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-bars"></i> Categories</button>
							<div class="dropdown-menu">
								@foreach($categories as $category)
								<a class="dropdown-item"  href="{{ url('product/category/'.$category->id.'/'.str_replace(' ', '-', $category->category_name)) }}">{{$category->category_name}}</a>
								@endforeach
							</div>
						</div>
					</div>
					<div class="col-lg-11-24 col-sm-8">
						<form action="{{ url('search') }}" method="get" class="py-1">

							<div class="input-group w-100">


								<select class="custom-select"  name="category_id">
									<option value="" disabled="" selected="">Category</option>

									@foreach($categories as $category)
									
									<option value="{{$category->id}}">{{$category->category_name}}</option>
									
									@endforeach


								</select>


								<input type="text" name="search" class="form-control" style="width:50%;" placeholder="Search">
								<div class="input-group-append">
									<button class="btn btn-warning" type="submit">
										<i class="fa fa-search"></i> Search
									</button>
								</div>
							</div>
						</form> <!-- search-wrap .end// -->
					</div> <!-- col.// -->
					<div class="col-lg-9-24 col-sm-12">
						<div class="widgets-wrap float-right row no-gutters py-1">
							<div class="col-auto">
								<div class="widget-header dropdown">
									<a href="#" data-toggle="dropdown" data-offset="20,10">
										<div class="icontext">
											<div class="icon-wrap"><i class="text-warning icon-sm fa fa-user"></i></div>
											<div class="text-wrap text-dark">
												@if(Session::has('customerlogin'))
												
												My account <i class="fa fa-caret-down"></i>
												@else
												Sign in <br>
												@endif
											</div>
										</div>
									</a>
									<div class="dropdown-menu">
										@if(!Session::has('customerlogin'))
										<form  method="post" action="{{url('customer/loginaction')}}" class="px-4 py-3">
											@csrf
											{{-- <form > --}}
												<div class="form-group">
													<label>Email address</label>
													<input type="email" name="email" class="form-control" placeholder="email@example.com">
												</div>
												<div class="form-group">
													<label>Password</label>
													<input type="password" name="password" class="form-control" placeholder="Password">
												</div>
												<button type="submit" class="btn btn-primary">Sign in</button>
											</form>
											<a class="dropdown-item" href="{{url('customer/signup')}}">Have account? Sign up</a>
											@endif
											@if(Session::has('customerlogin'))
											<a class="dropdown-item" href="{{url('customer/myaccount')}}">My Account</a>
											<a class="dropdown-item" href="{{url('customer/logout')}}">Logout</a>
											<a class="dropdown-item" href="#">Forgot password?</a>
											@endif
											<hr class="dropdown-divider">
											
											
										</div> <!--  dropdown-menu .// -->
									</div>  <!-- widget-header .// -->
								</div> <!-- col.// -->
								<div class="col-auto">
									<a href="{{url('cart')}}" class="widget-header">
										<div class="icontext">
											<div class="icon-wrap"><i class="text-warning icon-sm fa fa-shopping-cart"></i></div>
											<div class="text-wrap text-dark">
												Products <br> Cart({{$totalcart}})
											</div>
										</div>
									</a>
								</div> <!-- col.// -->
								<div class="col-auto">
									<a href="{{url('customer/wishlist')}}" class="widget-header">
										<div class="icontext">
											<div class="icon-wrap"><i class="text-warning icon-sm  fa fa-heart"></i></div>
											<div class="text-wrap text-dark">
												<span class="small round badge badge-secondary">
													@if(Session::has('totalwish'))
													{{Session::get('totalwish')}}
													@else
													0
													@endif
												</span>
												<div>Favorites</div>
											</div>
										</div>
									</a>
								</div> <!-- col.// -->
							</div> <!-- widgets-wrap.// row.// -->
						</div> <!-- col.// -->
					</div> <!-- row.// -->
				</div> <!-- container.// -->
			</section> <!-- header-main .// -->
																		</header> <!-- section-header.// -->