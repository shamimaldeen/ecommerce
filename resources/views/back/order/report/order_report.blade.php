@extends('layouts.adminlayout.admin_design')
@section('title','Order Report - Ecommerce')
@section('breadcrubmb','Order Report ')
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
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($orders as $order)
			<tr>
				<td ‍>{{$order->id}}</td>
				<td>{{date('d/m/Y',strtotime($order->created_at))}}</td>
				<td >{{$order->first_name." ". $order->last_name}}</td>
				<td>{{$order->mobile}}</td>
				<td >{{$order->total_price}}</td>
				<td >{{$order->total_amount}}</td>
				<td >{{$order->total_amount}}</td>
				<td>
					<a href="{{ url('admin/order/view/'.$order->id) }}" type="submit" class="btn btn-warning btn-sm"><i class="fa fa-search"></i>  View</a>
					
				</td>
			</tr>
			@endforeach
			
		</tbody>
	</table>
	</div><!-- panel -->
	</div><!-- mainwrapper -->
</section>
@endsection