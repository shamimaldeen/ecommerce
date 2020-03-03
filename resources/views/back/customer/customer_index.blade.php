@extends('layouts.adminlayout.admin_design')
@section('title','Customer Archive - Ecommerce')
@section('breadcrubmb','customer Archive')
@section('content')
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
				<th>Name</th>
				<th>Gender</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>Billing Address</th>
			</tr>
		</thead>
		<tbody>
			{{-- {{dd($customers)}} --}}
			@php $i =1; @endphp
			@foreach($customers as $customer)
			<tr>
				<td>{{$i}}</td>
				<td>{{$customer->first_name. " ".$customer->last_name}}</td>
				<td >{{$customer->gender}}</td>
				<td >{{$customer->email}}</td>
				<td >{{$customer->mobile}}</td>
				<td >{{$customer->billing_address}}</td>
				{{-- <td>
					<a href ="{{url('admin/proedit/'.$customer['id'].'/'.$customer['category_id'].'/'.$customer['brand_id'].'/'.$customer['color_id'])}}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i>  Edit</a>
					<a href ="{{url('admin/customer-delete/'.$customer['id'])}}" class="btn btn-danger btn-sm" onclick="return(confirm('are you sure to delete?'))"> <i class="fa fa-trash-o"></i> </a>
				</td> --}}
			</tr>
			@endforeach
			
		</tbody>
	</table>
	</div><!-- panel -->
	</div><!-- mainwrapper -->
</section>
@endsection