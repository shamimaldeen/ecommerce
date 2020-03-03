@extends('layouts.adminlayout.admin_design')
@section('title','Product Entry - Ecommerce')
@section('breadcrubmb','PRODUCT Archive')
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
				<th>Category</th>
				<th>Product Name</th>
				<th>Brand</th>
				<th>Color</th>
				<th>Model</th>
				<th>Sales Price</th>
				<th width="170"></th>
			</tr>
		</thead>
		<tbody>
			{{-- {{dd($products)}} --}}
			@foreach($products as $product)
			<tr>
				<td>{{$product['id']}}</td>
				<td >{{$product['category']['category_name']}}</td>
				<td>{{$product['product_name']}}</td>
				<td ‍>{{$product['brand']['brand_name']}}</td>
				<td >{{$product['color']['color_name']}}</td>
				<td >{{$product['model']}}</td>
				<td >{{$product['sale_price']}}</td>
				<td>
					<a href ="{{url('admin/proedit/'.$product['id'].'/'.$product['category_id'].'/'.$product['brand_id'].'/'.$product['color_id'])}}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i>  Edit</a>
					<a href ="{{url('admin/product/delete/'.$product['id'])}}" class="btn btn-danger btn-sm" onclick="return(confirm('are you sure to delete?'))"> <i class="fa fa-trash-o"></i> </a>
				</td>
			</tr>
			@endforeach
			
		</tbody>
	</table>
	</div><!-- panel -->
	</div><!-- mainwrapper -->
</section>
@endsection