@extends('layouts.adminlayout.admin_design')
@section('title','Dashboard - '.Session::get('site_name'))
@section('breadcrubmb','Dashboard')
@section('content')
<div class="contentpanel">
	@if(Session::has('flash_message_success'))
		<p class="alert alert-success"  id="message"> {{session('flash_message_success')}}</p>
	@endif

	@if(Session::has('flash_message_error'))
		<p class="alert alert-danger"  id="message"> {{session('flash_message_error')}}</p>
	@endif

		<div class="row row-stat">
			<div class="col-md-4">
				<div class="panel panel-info-alt noborder">
					<div class="panel-heading noborder">
						<div class="panel-btns">
							<a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
						</div><!-- panel-btns -->
						<div class="panel-icon"><i class="fa fa-info-circle"></i></div>
						<div class="media-body">
							<h5 class="md-title nomargin">Today Order</h5>
							<h2 " class="mt5">{{number_format((float)($pending_order + $delivered_order), 2, '.', '')}}</h2>

						</div><!-- media-body -->
						<hr>
						<div class="clearfix mt20">
							<div class="pull-left">
								<h5 class="md-title nomargin"> Pending</h5>
								<h5  class="nomargin">{{number_format((float)($pending_order), 2, '.', '')}}</h4>
							</div>
							<div class="pull-right">
								<h5 class="md-title nomargin"> Delivered</h5>
								<h5 class="nomargin">{{number_format((float)($delivered_order), 2, '.', '')}}</h4>
							</div>
						</div>  
						<hr>
						    					 
						
					</div><!-- panel-body -->
				</div><!-- panel -->
			</div><!-- col-md-4 -->
			
		<div class="col-md-4">
				<div class="panel panel-info-alt noborder">
					<div class="panel-heading noborder">
						<div class="panel-btns">
							<a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
						</div><!-- panel-btns -->
						<div class="panel-icon"><i class="fa fa-info-circle"></i></div>
						<div class="media-body">
							<h5 class="md-title nomargin">This Month Order</h5>
							<h2 " class="mt5">8,102.32</h2>
						</div><!-- media-body -->
						<hr>
						<div class="clearfix mt20">
							<div class="pull-left">
								<h5 class="md-title nomargin"> Pending</h5>
								<h5  class="nomargin">29,009.17</h4>
							</div>
							<div class="pull-right">
								<h5 class="md-title nomargin"> Delivered</h5>
								<h5 class="nomargin">99,103.67</h4>
							</div>
						</div>  
						<hr>
					   					 
						
					</div><!-- panel-body -->
				</div><!-- panel -->
			</div><!-- col-md-4 -->
			
			<div class="col-md-4">
				<div class="panel panel-info-alt noborder">
					<div class="panel-heading noborder">
						<div class="panel-btns">
							<a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
						</div><!-- panel-btns -->
						<div class="panel-icon"><i class="fa fa-info-circle"></i></div>
						<div class="media-body">
							<h5 class="md-title nomargin">Overall Order</h5>
							<h2 " class="mt5">{{number_format((float)($overall_pending + $overall_delivered), 2, '.', '')}} </h2>


						</div><!-- media-body -->
						<hr>
						<div class="clearfix mt20">
							<div class="pull-left">
								<h5 class="md-title nomargin"> Pending</h5>
								<h5  class="nomargin">{{number_format((float)($overall_pending), 2, '.', '')}} </h4>
							</div>
							<div class="pull-right">
								<h5 class="md-title nomargin"> Delivered</h5>
								<h5 class="nomargin">{{number_format((float)($overall_delivered), 2, '.', '')}} </h4>
							</div>
						</div>  
						<hr>
			  					 
						
					</div><!-- panel-body -->
				</div><!-- panel -->
			</div><!-- col-md-4 -->
		
		<div class="row">
			
			<div class="col-md-8">
				<div class="panel panel-warning widget-todo">
					<div class="panel-heading">
						<div class="pull-right">
							<a title="" data-toggle="tooltip" class="tooltips mr5" href="" data-original-title="Settings"><i class="glyphicon glyphicon-cog"></i></a>
							<a title="" data-toggle="tooltip" class="tooltips" id="addnewtodo" href="" data-original-title="Add New"><i class="glyphicon glyphicon-plus"></i></a>
						</div><!-- panel-btns -->
						<h3 class="panel-title">Note</h3>
					</div>
					<ul class="panel-body list-group nopadding">
						<li class="list-group-item">
							<div class="ckbox ckbox-default">
								<input type="checkbox" id="washcar" value="1">
								<label for="washcar"> Product Purchase</label>
							</div>
						</li>
						<li class="list-group-item">
							<div class="ckbox ckbox-default">
								<input type="checkbox" checked="checked" id="eatpizza" value="1">
								<label for="eatpizza">Product Sales</label>
							</div>
						</li>
						
					</ul>
				</div>
			</div><!-- col-md-8 -->
			
			<div class="col-md-4">
				<div class="panel panel-warning widget-newsletter">
					<div class="panel-heading">
						<h4 class="panel-title">Send SMS</h4>
					</div>
					<div class="panel-body">
						<label>Mobile Number</label>
						<input type="text" name="name" class="form-control mt10 mb10" value="" placeholder="Type Your Name" />
						<label>Please Write you comment here</label>
						<textarea class="form-control mb10" rows="3" id="comment"></textarea>
						<button class="btn btn-success btn-block">Send </button>
					</div><!-- panel-body -->
				</div><!-- panel -->
			</div><!-- col-md-9 -->
		</div><!-- row -->	
	</div><!-- contentpanel -->
@endsection