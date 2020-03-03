@include('layouts.adminlayout.admin_header')
@include('layouts.adminlayout.admin_sidebar')
<div class="mainpanel">
	<div class="pageheader">
		<div class="media">
			<div class="pageicon pull-left">
				<i class="fa fa-home"></i>
			</div>
			<div class="media-body">
				<ul class="breadcrumb">
					<li><a href="{{url('admin/dashboard')}}"><i class="glyphicon glyphicon-home"></i></a></li>
					<li> @yield('breadcrubmb')</li>
				</ul>
				<h4>@yield('breadcrubmb')</h4>
			</div>
		</div><!-- media -->
	</div><!-- pageheader -->
	
	@yield('content')
	
</div><!-- mainpanel -->
</div><!-- mainwrapper -->
</section>

@include('layouts.adminlayout.admin_footer')