@extends('layouts.adminlayout.admin_design')
@section('title','Product Color - Ecommerce')
@section('breadcrubmb','Product Color') @section('content')
@if(Session::has('flash_message_success'))
        <p class="alert alert-success"  id="message"> {{session('flash_message_success')}}</p>
@endif

@if(Session::has('flash_message_error'))
    <p class="alert alert-danger"  id="message"> {{session('flash_message_error')}}</p>
@endif
		<div class="panel panel-default">
	 
			<div class="panel-body">
				<form class="form-inline" method="post" action="{{url('admin/product/color/add')}}" >
					{{csrf_field()}}
					<div class="form-group">
					 
						<input type="text" name="color_name" class="form-control"  >
					</div><!-- form-group -->
					
					 
					<button type="submit" class="btn btn-primary mr5"> <i class="fa fa-save"></i>   Save</button>
					
					
				</form>
			</div><!-- panel-body -->
			
		</div><!-- panel -->
		
		<div class="panel panel-primary-head">
			
			 <table class="table table-success table-hover mb30">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>Color</th>
                                           
                                            <th></th>
                                             
                                          </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($colors as $color)
                                          <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$color->color_name}}</td>
                                           
                                            <td>   
                                      		<a href="{{ url('admin/product/color/edit/'.$color->id) }}" data-toggle="tooltip" title="Edit" class="delete-row tooltips"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;

                                      		<a href="{{ url('admin/product/color/delete/'.$color->id) }}" data-toggle="tooltip" title="Edit" onclick="return(confirm('are you sure to delete?'))" class="delete-row tooltips"><i class="fa fa-trash-o"></i></a>&nbsp;&nbsp;

                                  			</td>
                                            
                                          </tr>

                                          <span style="display: none">{{$i++}}</span>

                                          @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div><!-- table-responsive -->
		</div><!-- panel -->
		
		
	</div><!-- mainwrapper -->
</section>
@endsection