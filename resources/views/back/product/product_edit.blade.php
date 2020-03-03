@extends('layouts.adminlayout.admin_design')
@section('title','Product Edit - Ecommerce')
@section('breadcrubmb','PRODUCT Edit')
@section('content')
<div class="contentpanel">
	@if(Session::has('flash_message_success'))
		<p class="alert alert-success"  id="message"> {{session('flash_message_success')}}</p>
	@endif

	@if(Session::has('flash_message_error'))
		<p class="alert alert-danger"  id="message"> {{session('flash_message_error')}}</p>
	@endif
	<div class="contentpanel">
		<div class="row">
			<form method="post" action="{{url('admin/product/update/'.$product->id)}}" enctype="multipart/form-data" >
				{{csrf_field()}}
			<div class="col-sm-8">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Category</label>
									<select name="category_id" required data-placeholder="Choose One" class="form-control">
										<option value="">Choose One</option>
										@foreach($categories as $category)
											<option value="{{$category->id}}" @if($product->category_id == $category->id) selected="" @endif>{{$category->category_name}}</option>
										@endforeach
									</select>
								</div> 
							</div>
							<div class="col-sm-5">
								<div class="form-group">
									<label class="control-label">Product Name</label>
									<input type="text" name="product_name" value="{{$product->product_name}}" class="form-control" />
								</div> 
							</div> 
						 	<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">Model</label>
									<input type="text" name="model" value="{{$product->model}}" class="form-control" />
								</div> 
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Brand</label>
									<select  name="brand_id" required  data-placeholder="Choose One" class="form-control">
										<option value="">Choose One</option>
										@foreach($brands as $brand)
											<option value="{{$brand->id}}"  @if($product->brand_id == $brand->id) selected="" @endif>{{$brand->brand_name}}</option>
										@endforeach
									</select>
								</div> 
							</div> 
							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">Color</label>
									<select  name="color_id"  required data-placeholder="Choose One" class="form-control">
										<option value="">Choose One</option>
										@foreach($colors as $color)
											<option value="{{$color->id}}"  @if($product->color_id == $color->id) selected="" @endif>{{$color->color_name}}</option>
										@endforeach
									</select>
								</div> 
							</div>	 
							<div class="col-sm-2">
								<div class="form-group">
									<label class="control-label"> Price</label>
									<input type="text" name="price"  value="{{$product->price}}" class="form-control" />
								</div><!-- form-group -->
							</div><!-- col-sm-6 -->
							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">Sale Price</label>
									<input type="text" name="sale_price"  value="{{$product->sale_price}}" class="form-control" />
								</div> 
							</div> 
						</div> 
						<div class="row">
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label class="control-label"> Description </label>
									<textarea name="description" class="form-control" rows="2" cols="50">  {{$product->description}}
									</textarea>
								</div><!-- form-group -->	</div><!-- form-group -->
						</div><!-- col-sm-8 -->
					</div></div></div>
					<div class="col-sm-2">
						<div class="form-group">
							<label class="control-label"> Featured Image</label>
							<input type="file" name="fea_image1" class="form-control" />
						</div>
						<div class="form-group">
							<input type="file" name="fea_image2" class="form-control" />
						</div><!-- form-group -->
						<div class="form-group">
							<input type="file" name="fea_image3" class="form-control" />
						</div><!-- form-group -->
						<div class="form-group">
							<input type="file" name="fea_image4" class="form-control" />
						</div><!-- form-group -->
						<div class="form-group">
							<input type="file" name="fea_image5" class="form-control" />
						</div><!-- form-group -->
					</div><!-- col-sm-6 -->   
					<div class="col-sm-2">
						<label> Select  Place</label>
						<div class="form-group">
							<div class="col-sm-8">
								<div class="ckbox ckbox-success">
									<input type="checkbox" name="featured" value="1" id="checkboxDefault" @if($product->featured == '1') checked @endif>
									<label for="checkboxDefault">Featured </label>
								</div>
								<div class="ckbox ckbox-primary">
									<input type="checkbox" name="new_arrival" value="1" id="checkboxPrimary"@if($product->new_arrival == '1') checked @endif >
									<label for="checkboxPrimary">New Arri.</label>
								</div>
								<div class="ckbox ckbox-warning">
									<input type="checkbox" name="hot_deals" value="1" id="checkboxWarning" @if($product->hot_deals == '1') checked @endif>
									<label for="checkboxWarning">Hot Deals</label>
								</div>
								<div class="ckbox ckbox-danger">
								<input type="checkbox" name="offer" value="1" id="checkboxdanger" @if($product->offer == '1') checked @endif>
									<label for="checkboxdanger">Offer</label>
								</div>
							</div><!-- col-sm-6 -->
						</div><!-- col-sm-6 -->
					</div><!-- col-sm-6 -->
		</div><!-- col-sm-6 -->
		<hr>
		<div class="footer">
			<button type="submit" class="btn btn-warning btn-md"><i class="fa fa-save"></i> Publish</button>
		</div><!-- panel-footer -->
	</div><!-- panel -->
</form>
</div><!-- panel -->
</div><!-- mainwrapper -->
</section> 
@endsection