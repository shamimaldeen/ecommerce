@extends('layouts.adminlayout.admin_design') @section('title','Slider - Ecommerce') @section('breadcrubmb','Slider') @section('content')
<div class="contentpanel">
    @if(Session::has('flash_message_success'))
        <p class="alert alert-success"  id="message"> {{session('flash_message_success')}}</p>
    @endif

    @if(Session::has('flash_message_error'))
        <p class="alert alert-danger"  id="message"> {{session('flash_message_error')}}</p>
    @endif
    <div class="panel panel-default">

        <div class="panel-body">
        <form class="form-inline" action="{{url('admin/slider')}}" method="post" enctype="multipart/form-data" >
                @csrf

                <div class="form-group">

                    <input type="file" name="slider_image" class="form-control" required="">
                </div>
                <!-- form-group -->

                <button type="submit" class="btn btn-primary mr5"> <i class="fa fa-save"></i> Upload</button>

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
                    <th>Image</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                @foreach($sliders as $slider)
                <tr>
                    <td>{{$i}}</td>

                    <td><img class="img-circle pull-left noti-thumb" height="24" src="{{ asset('uploads/slider/'.$slider->slider_image) }}" alt=""> </td>
                    <td>
                        <a href="{{url('admin/slider/delete/'.$slider->id)}}" data-toggle="tooltip" onclick="return (confirm('are you sure to delete?'))" title="Delete" class="delete-row tooltips"><i class="fa fa-trash-o"></i></a></td>

                </tr>
                <span style="display: none">{{$i++}}</span>

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