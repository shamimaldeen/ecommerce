@extends('layouts.adminlayout.admin_design')
@section('title','ORDER PREVIEW - Ecommerce')
@section('breadcrubmb','ORDER PREVIEW ')
@section('content')
<div class="contentpanel">
	@if(Session::has('flash_message_success'))
		<p class="alert alert-success"  id="message"> {{session('flash_message_success')}}</p>
	@endif

	@if(Session::has('flash_message_error'))
		<p class="alert alert-danger"  id="message"> {{session('flash_message_error')}}</p>
	@endif
	<div class="row">
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-body">Order#: <b>455215</b> |
					Date: <b>12/12/2018</b>
					<br>
					Customer Name: <b>Md. Abdullah Al Mamun</b>
					<br>
					Billing Address: <b>Dagonbhuiyan, Feni</b><br>
					Contact : <b>01777615690</b>
				</div>
			</div><table id="" class="table table-striped  table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Category</th>
					<th>Product Name</th>
					<th>Brand</th>
					<th>Color</th>
					<th>Model</th>
					
					<th>Qty.</th>
					<th> Price</th>
					<th>Sub Total.</th>
					<th width="20"></th>
				</tr>
			</thead>
			<tbody>

				@php 

				$total = $shipping = $grandtotal = $quantity = 0;
				$order_id = '';
				@endphp
				@foreach($orders as $order)
				<tr>
					<td>1DA58</td>
					<td >{{$order->category_name}}</td>
					<td>{{$order->product_name}}</td>
					<td ‍>{{$order->brand_name}}</td>
					<td >{{$order->color_name}}</td>
					<td >{{$order->model}}</td>
					<td >{{$order->quantity}}</td>
					<td >{{$order->price}}</td>
					<td >{{$order->quantity * $order->price}}</td>
					<td ><a href ="{{ url('admin/order/product/delete/'.$order->order_pro_id) }}" class="btn btn-danger btn-sm" onclick="return(confirm('are you sure to delete?'))"> <i class="fa fa-trash-o"></i> </a></td>
				</tr>

				@php
					$quantity =  $quantity  + $order->quantity;
					$total  =  $total + ($order->quantity * $order->price);
					$shipping =  $shipping  + $order->shipping_cost;
					$grandtotal = $grandtotal + ($total + $shipping);
					$order_id = $order->id;

				@endphp

				@endforeach
				
				<tr>
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td ‍></td>
						<td ></td>
						<td >Total </td>
						<td ><b>{{$quantity}}</b> </td>
						<td ></td>
						<td ><b>{{$total}}</b></td>
						<td>
							
							
						</td>
					</tr>
					<tr>
						<td> </td>
						<td > </td>
						<td> </td>
						<td ‍> </td>
						<td > </td>
						<td > Shippings</td>
						<td >  </td>
						<td ></td>
						<td ><b>{{$shipping}}</b></td>
						<td>
							
							
						</td>
					</tr>
					
					<tr>
						<td> </td>
						<td > </td>
						<td> </td>
						<td ‍> </td>
						<td > </td>
						<td > Grand Total</td>
						<td >  </td>
						<td ></td>
						<td ><b>{{$grandtotal}}</b></td>
						<td>
						</td>
					</tr>
					
				</tbody>
			</table>
		</div>
		<div class="col-sm-3">
			<form action="{{ url('admin/order/change_status/'.$order_id) }}" method="post">
				@csrf
			<div class="panel panel-default">
				<div class="panel-body">
					
					<div class="form-group">
						<label class="control-label">Order Status</label>
						<select class="form-control" name="order_status" required="">
							<option value="" selected="" disabled=""> Choose One</option>
							<option value="delivered"> Deliverd</option>
							<option value="pending"> Pending</option>
						</select>
					</div>
				</div>
				<div class="panel-footer"><center>
					<button type="submit" class="btn btn-warning btn-md"><i class="fa fa-save"></i> Status Update</button></center>
				</div>
			</div>

		</form>

		</div>
		</div><!-- col-sm-6 -->
		</div><!-- col-sm-6 -->
		
		<!-- panel-footer -->
		</div><!-- panel -->
		</div><!-- panel -->
		</div><!-- mainwrapper -->
	</section>
	@endsection