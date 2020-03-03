@extends('layouts.adminlayout.admin_design')
@section('title','Site Profile - Ecommerce')
@section('breadcrubmb','Site Profile') 
@section('content')
	<div class="contentpanel">
		@if(Session::has('flash_message_success'))
        <p class="alert alert-success"  id="message"> {{session('flash_message_success')}}</p>
    @endif

    @if(Session::has('flash_message_error'))
        <p class="alert alert-danger"  id="message"> {{session('flash_message_error')}}</p>
    @endif
		<div class="panel panel-default">
		<form action="{{url('admin/site')}}" method="post"  enctype="multipart/form-data" >
			@csrf
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label"> Site Name </label>
						<input type="text" name="site_name" value="{{$siteprofile->site_name}}" class="form-control" />
						</div> 
					</div> 
				
					<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label">Address</label>
					<input type="text" name="address"  value="{{$siteprofile->address}}"  class="form-control" />
						</div> 
					</div> 
						<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label">Mobile</label>
					<input type="text" name="mobile"  value="{{$siteprofile->mobile}}"  class="form-control" />
						</div> 
					</div
			 
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label"> Fb Link</label>
							<input type="text"  value="{{$siteprofile->facebooklink}}"  name="facebooklink" class="form-control" />
						</div><!-- form-group -->
					</div><!-- col-sm-6 -->
				 		<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label"> Youtube Link</label>
							<input type="text" name="youtubelink"  value="{{$siteprofile->youtubelink}}"  class="form-control" />
						</div><!-- form-group -->
					</div><!-- col-sm-6 -->
				 
				 		<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label"> Twitter Link</label>
							<input type="text" name="twitterlink"  value="{{$siteprofile->twitterlink}}"  class="form-control" />
						</div><!-- form-group -->
					</div><!-- col-sm-6 -->
				 
				 		<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label"> Instragram Link</label>
							<input type="text" name="instagramlink"  value="{{$siteprofile->instagramlink}}"  class="form-control" />
						</div><!-- form-group -->
					</div><!-- col-sm-6 -->
				 
				</div> 
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label class="control-label"> Logo</label>
							<input type="file" name="site_logo"  class="form-control" />
						</div><!-- form-group -->
					</div></div>
			</div><!-- panel-body -->
			<div class="panel-footer">
				<button class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
			</div><!-- panel-footer -->
		</div><!-- panel -->
	</form>
	</div><!-- panel -->
</div><!-- mainwrapper -->
</section> 

@endsection