@extends('layouts.adminlayout.admin_design') 
@section('title','Add New Transaction - '.Session::get('site_name')) 
@section('breadcrubmb','TRANSACTION ENTRY') 
@section('content')
<div class="contentpanel">
	@if(Session::has('flash_message_success'))
        <p class="alert alert-success"  id="message"> {{session('flash_message_success')}}</p>
    @endif

    @if(Session::has('flash_message_error'))
        <p class="alert alert-danger"  id="message"> {{session('flash_message_error')}}</p>
    @endif
		<div class="panel panel-default">
			<form method="post" action="{{url('admin/transaction/save')}}" >
				@csrf
			<div class="panel-heading">
				<div class="panel-btns">
					<a href="" class="panel-minimize tooltips" data-toggle="tooltip" title="Minimize Panel"><i class="fa fa-minus"></i></a>
					<a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
				</div><!-- panel-btns -->
				<h4 class="panel-title">Add New Transaction</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label"> Date </label>
							<div class="input-group">
								<input type="date" name="transaction_date" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							</div> 
						</div> 
					</div> 
					<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label">Category</label>
							<select   data-placeholder="Choose One" name="category_id" class="form-control">
								<option value="" disabled="" selected="">Choose One</option>
								@foreach($categories as $category)
									<option value="{{$category->id}}">{{$category->category_name}}</option>
								@endforeach

							</select>
						</div> 
					</div> 
					
				</div> 
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label"> Description/Voucher No.</label>
							<input type="text" name="description" class="form-control" />
						</div><!-- form-group -->
					</div><!-- col-sm-6 -->
					<div class="col-sm-2">
						<div class="form-group">
							<label class="control-label"> Cash Payment</label>
							<input type="text" name="cash_pay" class="form-control" />
						</div><!-- form-group -->
					</div><!-- col-sm-6 -->
					<div class="col-sm-2">
						<div class="form-group">
							<label class="control-label">Cash Receive</label>
							<input type="text" name="cash_receive" class="form-control" />
						</div> 
					</div> 
					
				</div> 
			</div><!-- panel-body -->
			<div class="panel-footer">
				<button class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
			</div><!-- panel-footer -->
		</div><!-- panel -->

	</form>
	</div><!-- panel -->
</div><!-- mainwrapper -->
</section> 
@endsection