@extends('layouts.adminlayout.admin_design')
@section('title','Pages Edit - Ecommerce')
@section('breadcrubmb','Page Edit ')
@section('content')
<div class="contentpanel">
    @if(Session::has('flash_message_success'))
    <p class="alert alert-success"  id="message"> {{session('flash_message_success')}}</p>
    @endif
    @if(Session::has('flash_message_error'))
    <p class="alert alert-danger"  id="message"> {{session('flash_message_error')}}</p>
    @endif
    <div class="panel panel-default">
        <form method="post" action="{{url('admin/page/update/'.$page->id)}}">
            {{csrf_field()}}
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="control-label">Page Title</label>
                            <input type="text" name="page_title" value="{{$page->page_title}}" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label"> Description </label>
                            <textarea class="form-control" name="page_description" rows="6" cols="50">{{$page->page_description}}
                            </textarea>
                        </div>
                        <!-- form-group -->
                    </div>
                    <!-- col-sm-6 -->
                </div>
            </div>
            <!-- panel-body -->
            <div class="panel-footer">
                <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Update</button>
            </div>
            <!-- panel-footer -->
        </form>
    </div>
    <!-- panel -->
</div>
<!-- panel -->
</div>
<!-- mainwrapper -->
</section>
<script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
<script>
// CKEDITOR.replace( 'page_description' );
</script>
@endsection