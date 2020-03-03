@extends('layouts.frontlayout.front_design')
@section('title','Order Confirmation')
<!-- ========================= SECTION MAIN ========================= -->
@section('content')
<section class="section-content bg padding-y-sm">
	<div class="container">
		<nav class="mb-3">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
				<li class="breadcrumb-item"><a href="{{url('product')}}">Order</a></li>
				<li class="breadcrumb-item active" aria-current="page">Confirmation</li>
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
				
					<p style="color: green" class="text-muted">Dear, <strong>{{Session::get("customer_firstname")}} {{Session::get("customer_lastname")}}</strong> Your order(<strong>{{$order['0']['id']}}</strong>) has been placed. We will contact with you soon. Go to  <a href="{{ url('/') }}">homepage...</a></p>
				
			</main> <!-- col.// -->
						

							
							
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