@extends('layouts.adminlayout.admin_design')
 @section('title','Dashboard - Ecommerce')
  @section('breadcrubmb','Product Brand Edit') @section('content')

<div class="contentpanel">
    @if(Session::has('flash_message_success'))
        <p class="alert alert-success"  id="message"> {{session('flash_message_success')}}</p>
    @endif

    @if(Session::has('flash_message_error'))
        <p class="alert alert-danger"  id="message"> {{session('flash_message_error')}}</p>
    @endif

    <div class="panel panel-default">

        <div class="panel-body">
            <form class="form-inline" method="post" action="{{url('admin/product/brand/update/'.$id)}}" enctype="multipart/form-data" >
                {{csrf_field()}}
                <div class="form-group">
                    <label>Product Brand :</label>
                    <input type="text" name="brand_name" value="{{$brandsingle}}" class="form-control">
                </div>
                <!-- form-group -->

                <div class="form-group">
                    <label>Logo:</label>
                    <input type="file" name="brand_image" class="form-control">
                </div>
                <!-- form-group -->

                <button type="submit" class="btn btn-primary mr5"> <i class="fa fa-save"></i> Update</button>

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
                    <th>Product Brand</th>
                    <th>Logo</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                @foreach($brands as $brand)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$brand->brand_name}}</td>
                    <td><img class="img-circle pull-left noti-thumb" height="24" src="{{ asset('uploads/category/'.$brand->brand_image) }}" alt=""> </td>
                    <td>
                        <a href="{{ url('admin/product-cat-edit/'.$brand->catid) }}" data-toggle="tooltip" title="Edit" class="delete-row tooltips"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;

                        <a href="#" onclick="return(confirm('are you sure to delete?'))" data-toggle="tooltip" title="Delete" class="delete-row tooltips"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                <span style="display: none" >{{$i++}}</span>
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