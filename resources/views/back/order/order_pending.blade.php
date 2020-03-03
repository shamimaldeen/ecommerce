@extends('layouts.adminlayout.admin_design')
@section('title','Order Pending - Ecommerce')
@section('breadcrubmb','Order Pending ')
@section('content')
<link href="css/style.datatables.css" rel="stylesheet">
<link href="//cdn.datatables.net/responsive/1.0.1/css/dataTables.responsive.css" rel="stylesheet">
<div class="contentpanel">
	@if(Session::has('flash_message_success'))
		<p class="alert alert-success"  id="message"> {{session('flash_message_success')}}</p>
	@endif

	@if(Session::has('flash_message_error'))
		<p class="alert alert-danger"  id="message"> {{session('flash_message_error')}}</p>
	@endif
	<table id="basicTable" class="table table-striped  table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Order. Date</th>
				<th>Customer Name</th>
				<th>Contact</th>
				<th>Total Qty.</th>
				<th>Amount</th>
				<th>Shipping</th>
				<th>Payment Type</th>
				
				<th width="170"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($orders as $order)
			<tr>
				<td ‍>{{$order['id']}}</td>
				<td>{{date('d/m/Y',strtotime($order['created_at']))}}</td>
				<td >{{$order['customer']['first_name'] ." ". $order['customer']['last_name']}}</td>
				<td>{{$order['customer']['mobile']}}</td>
				<td >{{$order['total_quantity']}}</td>
				<td >{{$order['total_price']}}</td>
				<td >{{$order['shipping_cost']}}</td>
				<td >{{$order['payment_method']}}</td>
				<td>
					<a href="{{ url('admin/order/view/'.$order['id']) }}" type="submit" class="btn btn-warning btn-sm"><i class="fa fa-search"></i>  View</a>
					<a href="{{ url('admin/order/delete/'.$order['id']) }}" onclick="return(confirm('are you sure to confirm?'))" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> </a>
					{{-- <button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash-o"></i> </button> --}}
				</td>
			</tr>
			@endforeach
			
		</tbody>
	</table>
	</div><!-- panel -->
	</div><!-- mainwrapper -->
</section>
@endsection