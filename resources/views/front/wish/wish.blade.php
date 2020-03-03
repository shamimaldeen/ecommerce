@extends('layouts.frontlayout.front_design')
@section('title','Wishlist')
<!-- ========================= SECTION MAIN ========================= -->
@section('content')
<section class="section-content bg padding-y-sm">
	<div class="container">
		<nav class="mb-3">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
				<li class="breadcrumb-item"><a href="{{url('product')}}">Product</a></li>
				<li class="breadcrumb-item active" aria-current="page">Wishlist</li>
			</ol>
		</nav>

		@if(Session::has('flash_message_success'))
		<p class="alert alert-info"  id="message"> {{session('flash_message_success')}}</p>
		@endif
		@if(Session::has('flash_message_error'))
		<p class="alert alert-info"  id="message"> {{session('flash_message_error')}}</p>
		@endif
		
		<div class="row">
			<main class="col-sm-12">
				<div class="card">
					<table class="table table-hover shopping-cart-wrap">
						<thead class="text-muted">
							<tr>
								<th scope="col">Product</th>
								<th scope="col" width="120">Price</th>
								<th scope="col" class="text-right" width="200">Action</th>
							</tr>
						</thead>
						<tbody>
							@php
							$price = $totalprice = 0;
							@endphp
							@foreach($wishes as $wish)
							<tr>
								<td>
									<figure class="media">
										<div class="img-wrap"><img src="{{ asset('uploads/product/feature_image/'.$wish['product']['fea_image1']) }}" class="img-thumbnail img-sm"></div>
										<figcaption class="media-body">
											<h6 class="title text-truncate">{{$wish['product']['product_name']}}</h6>
											<dl class="dlist-inline small">
												<dt>Size: </dt>
												<dd>XXL</dd>
											</dl>
											<dl class="dlist-inline small">
												<dt>Color: </dt>
												<dd>Orange color</dd>
											</dl>
										</figcaption>
									</figure>
								</td>
								
								<td>
									<div class="price-wrap">
										<var class="price">BDT {{$wish['product']['sale_price']}}</var>
										<small class="text-muted">(BDT {{$wish['product']['sale_price']}} each)</small>
									</div> <!-- price-wrap .// -->
								</td>
								<td class="text-right">
									<a data-original-title="By Now" title="" href="{{ url('cart/add/product/'.$wish['product_id']) }}" class="btn btn-outline-success" data-toggle="tooltip"> <i class="fa fa-shopping-cart"></i></a>
									<a href="{{ url('customer/wish/delete/'.$wish['id']) }}" class="btn btn-outline-danger"> × Remove</a>
								</td>
							</tr>
							@php 
							$price = $price + $wish['product']['sale_price']
							@endphp
							@endforeach
							
						</tbody>
					</table>
				</div> <!-- card.// -->
			</main> <!-- col.// -->
			
		</div>
	</div> <!-- container .//  --><br><br>
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection