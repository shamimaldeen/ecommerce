@extends('layouts.adminlayout.admin_design') 
@section('title','Add New Category - '.Session::get('site_name')) 
@section('breadcrubmb','Category') @section('content')
<div class="contentpanel">
    @if(Session::has('flash_message_success'))
        <p class="alert alert-success"  id="message"> {{session('flash_message_success')}}</p>
    @endif

    @if(Session::has('flash_message_error'))
        <p class="alert alert-danger"  id="message"> {{session('flash_message_error')}}</p>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-btns">
                <a href="" class="panel-minimize tooltips" data-toggle="tooltip" title="Minimize Panel"><i class="fa fa-minus"></i></a>
                <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
            </div>
            <!-- panel-btns -->
            <h4 class="panel-title"> Add New Category </h4>
        </div>
        <div class="panel-body">
            <form class="form-inline" method="post" action="{{url('admin/transaction/category')}}" >
                @csrf
                <div class="form-group">

                    <input type="text" name="category_name" class="form-control">
                </div>
                <!-- form-group -->

                <button type="submit" class="btn btn-primary mr5"><i class="fa fa-save"></i> Save</button>

            </form>
        </div>
        <!-- panel-body -->

    </div>
    <!-- panel -->

    <div class="panel panel-primary-head">

        <table class="table table-success table-hover mb30">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Order Number</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

            	@foreach ($categories as $category)
            		<tr>
            			<td>{{$i}}</td>
            			<td>{{$category->category_name}}</td>
                        <td>{{$category->order_by}}</td>
            			<td>
            			<a href="{{url('admin/transaction/cat/del/'.$category->id)}}" data-toggle="tooltip" title="Delete" class="delete-row tooltips" onclick="return(confirm('are you sure to delete?'))"><i class="fa fa-trash-o"></i> Delete</a></td>
            		</tr>
                    <span style="display: none;">{{$i++}}</span>

            	@endforeach
                
            </tbody>
        </table>
    </div>
    <!-- table-responsive -->
</div>
<!-- panel -->

</div>
<!-- mainwrapper -->
</section>
@endsection
