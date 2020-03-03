@extends('layouts.adminlayout.admin_design') 
@section('title','LEDGER ARCHIVE - '.Session::get('site_name')) 
@section('breadcrubmb','LEDGER ARCHIVE') 
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
					<th>Date</th>
					<th>Drescription/Voucher No</th>
					<th>Cash In</th>
					<th>Cash Out</th>
					<th width="170"></th>
				</tr>
			</thead>
			<tbody>
				@foreach($transactions as $transaction)
				<tr>
					<td>{{$i}}</td>
					<td >{{date('d/m/Y',strtotime($transaction['transaction_date']))}}</td>
					<td>{{$transaction['transactioncategory']['category_name']}}</td>
					<td ‍>{{$transaction['cash_pay']}}</td>
					<td >{{$transaction['cash_receive']}}</td>
					<td>   
						<a  href="{{url('admin/transaction/edit/'.$transaction['id'])}}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i>Edit</a>
						<a href="{{url('admin/transaction/delete/'.$transaction['id'])}}" class="btn btn-danger btn-sm"  onclick="return(confirm('are you sure to delete?'))"> <i class="fa fa-trash-o"></i>Delete</a>
					</td>
				</tr>

				<span style="display: none">{{$i++}}</span>
				@endforeach
				
			</tbody>
		</table>
	</div><!-- panel -->
</div><!-- mainwrapper -->
</section>
@endsection