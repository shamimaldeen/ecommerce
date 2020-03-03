@extends('layouts.adminlayout.admin_design')
@section('title','Order - Ecommerce')
@section('breadcrubmb','ORDER REPORT')
@section('content')

<div class="contentpanel">
		<div class="panel panel-default">
			<form action="{{ url('admin/order/report/action') }}" method="get">
				
	 
			<div class="panel-body">
				<div class="row">
					
					<div class="col-sm-8">
						<div class="form-group">
							<label class="control-label">Report Name</label>
							<select name="report_name"  data-placeholder="Choose One" class="form-control">
								<option value="">Choose One</option>
								<option value="order_report">Order Report</option>
								<option value="product_sales_report">Porduct Sales Report</option>
							</select>
						</div> 
					</div> 
					
				</div> 
				<div class="row">
				
					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label"> Started Date </label>
							<div class="input-group">
								<input type="date" name="starting" class="form-control" id="datepicker">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							</div> 
						</div> 
					</div> 
					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label"> Ending Date </label>
							<div class="input-group">
								<input type="date" name="ending" class="form-control" id="datepicker">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							</div> 
						</div> 
					</div> 
				</div> 
			  
			</div><!-- panel-body -->
			<div class="panel-footer">
				<button type="submit" class="btn btn-primary "><i class="fa fa-search"></i> Priview</button>
			</div><!-- panel-footer -->

		</form>
		</div><!-- panel -->
	</div><!-- panel -->
</div><!-- mainwrapper -->
</section> 
@endsection