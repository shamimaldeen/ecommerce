@extends('layouts.adminlayout.admin_design')
@section('title','Pages - Ecommerce')
@section('breadcrubmb','Pages ')
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
                <th>Page Title</th>
                <th>Update</th>
                <th width="170"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pages as $page)
            <tr>
                <td>{{$page->i}}</td>
                <td >{{$page->page_title}}</td>
                <td >{{date('d/m/Y',strtotime($page->updated_at))}}</td>
                <td>
                    <a  href="{{route('page.edit',$page->id)}}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i>  Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div><!-- panel -->
    </div><!-- mainwrapper -->
</section>
@endsection