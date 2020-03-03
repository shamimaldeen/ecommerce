@extends('layouts.frontlayout.front_design')
@section('title','Search Products')
{{-- {{dd($products)}} --}}
<!-- ========================= SECTION MAIN ========================= --> 
@section('content') 
<section  class="section-content bg padding-y-sm">
	<div class="container">
		<nav class="mb-3">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
				<li class="breadcrumb-item"><a href="{{ url('/product') }}">Product</a></li>
				<li class="breadcrumb-item"><a href="#">Search</a></li>
    <!-- <li class="breadcrumb-item"><a href="#">Category name</a></li>
    <li class="breadcrumb-item"><a href="#">Sub category</a></li>
    <li class="breadcrumb-item active" aria-current="page">Items</li> -->
</ol> 
</nav>
<div class="row">
	<aside class="col-sm-3">

		<div class="card card-filter">
			<article class="card-group-item">
				<header class="card-header">
					<a class="" aria-expanded="true" href="#" data-toggle="collapse" data-target="#collapse22">
						<i class="icon-action fa fa-chevron-down"></i>
						<h6 class="title">By Category</h6>
					</a>
				</header>
				<div style="" class="filter-content collapse show" id="collapse22">
					<div class="card-body">
						<form action="{{ url('search') }}" method="get" class="pb-3"> 
							<div class="input-group">
								<input class="form-control" name="search" placeholder="Search" type="text">
								<div class="input-group-append">
									<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</form>

						<ul class="list-unstyled list-lg">
							@foreach($categories as $category)

							<li><a href="{{ url('product/category/'.$category->id.'/'.str_replace(' ', '-', $category->category_name)) }}">{{$category->category_name}} <span class="float-right badge badge-light round">{{App\Http\Controllers\Front\ProductFront::procountbycategory($category->id)}}</span>  </a></li>

							@endforeach

						</ul>  
					</div> <!-- card-body.// -->
				</div> <!-- collapse .// -->
			</article> <!-- card-group-item.// -->
			<article class="card-group-item">
				<header class="card-header">
					<a href="#" data-toggle="collapse" data-target="#collapse33">
						<i class="icon-action fa fa-chevron-down"></i>
						<h6 class="title">By Price  </h6>
					</a>
				</header>
				<div class="filter-content collapse show" id="collapse33">
					<div class="card-body">
						<form action="{{ url('search/price/') }}" method="get" > 
							<input type="range" class="custom-range" min="0" max="10000" id="range" name="">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>Min</label>
									<input class="form-control" placeholder="$0" name="min" id="min" type="number">
								</div>
								<div class="form-group text-right col-md-6">
									<label>Max</label>
									<input class="form-control" placeholder="$1,0000" name="max" id="max" type="number">
								</div>
							</div> <!-- form-row.// -->
							<button class="btn btn-block btn-outline-primary" id="search_by_price" type="submit">Apply</button>
						</form>
					</div> <!-- card-body.// -->
				</div> <!-- collapse .// -->
			</article> <!-- card-group-item.// -->
			<article class="card-group-item">
				<header class="card-header">
					<a href="#" data-toggle="collapse" data-target="#collapse44">
						<i class="icon-action fa fa-chevron-down"></i>
						<h6 class="title">By Feature </h6>
					</a>
				</header>
				<div class="filter-content collapse show" id="collapse44">
					<div class="card-body">
						<form>
							<label class="form-check">
								<input class="form-check-input" value="" type="checkbox">
								<span class="form-check-label">
									<span class="float-right badge badge-light round">{{App\Http\Controllers\Front\ProductFront::procountbyfeatured()}}</span>
									<a href="{{ url('product/featured') }}">Featured</a>
								</span>
							</label>  <!-- form-check.// -->
							<label class="form-check">
								<input class="form-check-input" value="" type="checkbox">
								<span class="form-check-label">
									<span class="float-right badge badge-light round">{{App\Http\Controllers\Front\ProductFront::procountbynewarrival()}}</span>
									<a href="{{ url('product/new_arrival') }}">New Arrival</a>
								</span>
							</label> <!-- form-check.// -->
							<label class="form-check">
								<input class="form-check-input" value="" type="checkbox">
								<span class="form-check-label">
									<span class="float-right badge badge-light round">{{App\Http\Controllers\Front\ProductFront::procountbyhotdeals()}}</span>
									<a href="{{ url('product/hot_deals') }}">Hot Deals</a>
								</span>
							</label>  <!-- form-check.// -->
							<label class="form-check">
								<input class="form-check-input" value="" type="checkbox">
								<span class="form-check-label">
									<span class="float-right badge badge-light round">{{App\Http\Controllers\Front\ProductFront::procountbyoffer()}}</span>
									<a href="{{ url('product/offer') }}">Offer</a>
								</span>
							</label>  <!-- form-check.// -->
						</form>
					</div> <!-- card-body.// -->
				</div> <!-- collapse .// -->
			</article> <!-- card-group-item.// -->
		</div> <!-- card.// -->


	</aside> <!-- col.// -->
	<main class="col-sm-9">
		<div id="code_prod2">
			<p style="margin: 0px;">Search Results for <strong>{{$keyword}}</strong>. 
				@if($totalproducts >1) Available Products <strong>{{$totalproducts}}</strong> @else Available Product  <strong>{{$totalproducts}}</strong>@endif</p>
				<div class="row">


					@foreach($products as $product)	
					<div class="col-md-3">
						<figure class="card card-product">
							<div class="img-wrap"> 
								{{-- <img src="{{asset('uploads/product/feature_image/'.$product->fea_image1)}}"> --}}

								@if( $product->fea_image1 == null || $product->fea_image1 == '')
								<img src="{{asset('uploads/product/feature-default.jpg')}}" >
								@else
								<img src="{{asset('uploads/product/feature_image/'.$product->fea_image1)}}">
								@endif


								<a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
							</div>
							<figcaption class="info-wrap">
								<a href="{{ url('product/view/'.$product->id.'/'.str_replace(' ', '-', str_replace('/', '-', $product->product_name))) }}" class="title">{{$product->product_name}}</a>
								<div class="action-wrap">
									<a href="{{ url('cart/add/product/'.$product->id) }}" class="btn btn-primary btn-sm float-right"> Order </a>
									<div class="price-wrap h5">
										<span class="price-new">৳{{$product->sale_price}}</span>
										<del class="price-old">৳{{$product->price}}</del>
									</div> <!-- price-wrap.// -->
								</div> <!-- action-wrap -->
							</figcaption>
						</figure> <!-- card // -->
					</div> <!-- col // -->

					@endforeach
					<div class="pagition" style="width: 90%; left: 30%;">

						@if (isset($_GET['min']))
						<?php echo $products->appends(array('search' => $keyword,'min'=>$min,'max'=>$max))->links(); ?>

						@else
						<?php echo $products->appends(array('search' => $keyword))->links(); ?>	
						@endif

					</div>


				</div> <!-- row.// -->
			</div>

		</main> <!-- col.// -->
	</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<script>
	$(document).ready(function() {

		$('#range').change(function(){
			var max = $(this).val();
			$('#min').val(0);
			$('#max').val(max);

		});

		$('#search_by_price').click(function(){
			var max = $('#max').val();
			var min = $('#min').val();
			if(max == '' || max == 0){
				$('#max').val(0);
			}

			if(min == '' || min == 0){
				$('#min').val(0);
			}
			
		});
	});
</script>
@endsection