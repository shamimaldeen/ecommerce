@extends('layouts.frontlayout.front_design')
@section('title','Cart')
<!-- ========================= SECTION MAIN ========================= -->
@section('content')
<section class="section-content bg padding-y-sm">
	<div class="container">
		<nav class="mb-3">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
				<li class="breadcrumb-item"><a href="{{url('product')}}">Product</a></li>
				<li class="breadcrumb-item active" aria-current="page">Cart</li>
			</ol>
		</nav>
		@if(Session::has('flash_message_success'))
		<p class="alert alert-info"  id="message"> {{session('flash_message_success')}}</p>
		@endif
		@if(Session::has('flash_message_error'))
		<p class="alert alert-info"  id="message"> {{session('flash_message_error')}}</p>
		@endif
		
		<div class="row">
			<main class="col-sm-8">
				<div class="card">
					<table class="table table-hover shopping-cart-wrap">
						<thead class="text-muted">
							<tr>
								<th scope="col">Product</th>
								<th scope="col" width="120">Quantity</th>
								<th scope="col" width="120">Price</th>
								<th scope="col" class="text-right" width="200">Action</th>
							</tr>
						</thead>
						<tbody>
							@php
							$price = $totalprice = $totalquantity = 0;
							@endphp
							@foreach($carts as $cart)
							<tr>
								<td>
									<figure class="media">
										<div class="img-wrap"><img src="{{ asset('uploads/product/feature_image/'.$cart['product']['fea_image1']) }}" class="img-thumbnail img-sm"></div>
										<figcaption class="media-body">
										<h6 class="title text-truncate">{{$cart['product']['product_name']}}</h6>
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
									<form method="post" action="{{ url('cart/edit/product/'.$cart['id']) }}">
									<select class="form-control" name="quantity">
										<option value="1" @if ($cart['quantity'] =='1')
											selected=""
										@endif>1</option>
										<option value="2" @if ($cart['quantity'] =='2')
											selected=""
										@endif>2</option>
										<option value="3" @if ($cart['quantity'] =='3')
											selected=""
										@endif>3</option>
										<option value="4" @if ($cart['quantity'] =='4')
											selected=""
										@endif>4</option>
									</select>
								</td>
								<td>
									<div class="price-wrap">
										<var class="price">BDT {{$cart['product']['sale_price'] * $cart['quantity']}}</var>
										<small class="text-muted">(BDT {{$cart['product']['sale_price']}} each)</small>
										</div> <!-- price-wrap .// -->
									</td>
									<td class="text-right">
										{{-- <!- <a data-original-title="Update Quantity" title="" href="{{url('cart/edit/product/'.$cart['product']['id'])}}" class="btn btn-outline-warning" data-toggle="tooltip"> <i class="fa fa-pen-square"></i></a>  --}}
										
											@csrf
											<input type="submit" class="btn btn-success" value="Update" data-original-title="Update Quantity" title="" data-toggle="tooltip">
										</form>



										<a data-original-title="Save to Wishlist" title="" href="{{url('customer/wish/add/product/'.$cart['product']['id'])}}" class="btn btn-outline-success" data-toggle="tooltip"> <i class="fa fa-heart"></i></a>


										<a href="{{ url('cart/delete/'.$cart['id']) }}" data-original-title="Remove from cart" title="" class="btn btn-outline-danger" data-toggle="tooltip">X</a>
									</td>
								</tr>
								@php
								$price = $price + $cart['product']['sale_price'] * $cart['quantity'];
								$totalquantity = $totalquantity + $cart['quantity'];
								@endphp
								@endforeach
								
							</tbody>
						</table>
						</div> <!-- card.// -->
						</main> <!-- col.// -->
						<aside class="col-sm-4">
							<form action="{{ url('order/placeorder') }}" method="post">
								@csrf
							<div class="box">		<h4> Billing Information</h4><hr>
								<dl class="dlist-inline">
									<dt>Name:</dt>
									@if(Session::has('customer_firstname') && Session::has('customer_lastname'))
									<dd>{{Session::get('customer_firstname').' '.Session::get('customer_lastname')}} </dd>
									@endif
								</dl>
								<dl class="dlist-inline">
									<dt>Billing Address:</dt>
									@if(Session::has('customer_billing_address'))
									<dd>{{Session::get('customer_billing_address')}} </dd>
									@endif
								</dl>
								<dl class="dlist-inline">
									<dt>Mobile: </dt>
									@if(Session::has('customer_mobile'))
									<dd>{{Session::get('customer_mobile')}} </dd>
									@endif
								</dl>
								
							</div>
							<br>
							<div class="alert alert-warning">
								<dl class="dlist-align">
									<dt>Total price: </dt>
									<dd class="text-right">BDT {{$price}}</dd>
									<input type="hidden" value="{{$totalquantity}}" name="total_quantity">
									<input type="hidden" value="{{$price}}" name="total_price">

								</dl>
								<dl class="dlist-align">
									<dt>Shipping:</dt>
									<dd class="text-right">BDT 50</dd>
									<input type="hidden" name="shipping_cost" value="50">
								</dl>
								<dl class="dlist-align h4">
									<dt>Total:</dt>
									<dd class="text-right"><strong>USD {{$price + 50}}</strong></dd>
									<input type="hidden" value="{{$price + 50}}" name="total_amount">
								</dl>
								
							</div>
							<div class="alert alert-info">
								<select class="form-control" name="payment_method" id="payment_method">
									<option selected="" disabled="">Payment Method</option>
									<option value="Cash On Delivery">Cash On Delivery</option>
									<option value="Bkash">Bkash</option>
									<option value="Rocket">Rocket</option>
								</select>
								<br>
								<input type="text" class="form-control" name="transaction_no" id="transaction_no" placeholder="Transaction No.">
							</div>
							<center>
							
							<input  type="submit" class="btn btn-success btn-block btn-lg" value="Place your order">
							</center>

						</form>
							</aside> <!-- col.// -->
						</div>
						</div> <!-- container .//  --><br><br>
					</section>
					<!-- ========================= SECTION CONTENT END// ========================= -->
					@endsection

					<!-- jquery select option -->
					<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
					<script>
						$(document).ready(function() {
							$('#payment_method').change(function(){
								let option_value = $(this).val();
								console.log(option_value); 
								if(option_value == 'Cash On Delivery')
								{
									$('#transaction_no').removeAttr("style");
									$('#transaction_no').attr("style","display:none");
									
								}else if(option_value == 'Bkash' || option_value == 'Rocket' ){
									$('#transaction_no').attr("style", "display: block");
								}
							});	
						});
					</script>