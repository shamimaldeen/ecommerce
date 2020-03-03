<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
		
        <title>@yield('title')</title>
		
        <link href="{{asset('asset/back/css/style.default.css')}}" rel="stylesheet">
        <link href="{{asset('asset/back/css/morris.css')}}" rel="stylesheet">
        <link href="{{asset('asset/back/css/select2.css')}}" rel="stylesheet" />
		<link href="{{asset('asset/back/css/jquery.tagsinput.css')}}" rel="stylesheet" />
		<link href="{{asset('asset/back/css/toggles.css')}}" rel="stylesheet" />
		<link href="{{asset('asset/back/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" />
		<link href="{{asset('asset/back/css/select2.css')}}" rel="stylesheet" />
		<link href="{{asset('asset/back/css/colorpicker.css')}}" rel="stylesheet" />
		<link href="{{asset('asset/back/css/dropzone.css')}}" rel="stylesheet" />
	</head>
	
    <body>
        
        <header>
            <div class="headerwrapper">
                <div class="header-left">
                    <a href="{{ url('admin/dashboard') }}" class="logo">
                        <i class="fa fa-shopping-cart"></i>  {{Session::get('site_name')}}
					</a>
                    <div class="pull-right">
                        <a href="" class="menu-collapse">
                            <i class="fa fa-bars"></i>
						</a>
					</div>
				</div><!-- header-left -->
                
                <div class="header-right">
                    
                    <div class="pull-right">
                        
                        <form class="form form-search" action="search-results.html">
                            <input type="search" class="form-control" placeholder="Search" />
						</form>
                        
                        <div class="btn-group btn-group-list btn-group-notification">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-bell-o"></i>
								<span class="badge">1</span>
							</button>
                            <div class="dropdown-menu pull-right">
                                <a href="" class="link-right"></a>
                                <h5>Notification</h5>
                                <ul class="media-list dropdown-list">
                                    <li class="media">
                                        <img class="img-circle pull-left noti-thumb" src="{{asset('asset/back/images/photos/user1.png')}}" alt="">
                                        <div class="media-body">
											<strong>Under  </strong> Construction
											<small class="date"><i class="fa fa-thumbs-up"></i> 15 minutes ago</small>
										</div>
									</li>
									
								</li>
							</ul>
							<div class="dropdown-footer text-center">
								
							</div>
						</div><!-- dropdown-menu -->
					</div><!-- btn-group -->
					
					<div class="btn-group btn-group-list btn-group-messages">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-envelope-o"></i>
							<span class="badge">1</span>
						</button>
						<div class="dropdown-menu pull-right">
							<a href="" class="link-right"><i class="fa fa-plus"></i></a>
							<h5>New Messages</h5>
							<ul class="media-list dropdown-list">
								<li class="media">
									<span class="badge badge-success">New</span>
									<img class="img-circle pull-left noti-thumb" src="{{asset('asset/back/images/photos/user1.png')}}" alt="">
									<div class="media-body">
										<strong>Under Construction</strong>
										<p>Under Construction ..............</p>
										<small class="date"><i class="fa fa-clock-o"></i> 15 minutes ago</small>
									</div>
								</li>
								
								
							</ul>
							<div class="dropdown-footer text-center">
								<a href="messages.php" class="link">See All Messages</a>
							</div>
						</div><!-- dropdown-menu -->
					</div><!-- btn-group -->
					
					<div class="btn-group btn-group-option">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-caret-down"></i>
						</button>
						<ul class="dropdown-menu pull-right" role="menu">
							
							<li><a href="#"><i class="glyphicon glyphicon-star"></i> Active Logs</a></li>
							<li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
							
							<li><a href="user_settings.php"><i class="glyphicon glyphicon-cog"></i>User Settings</a></li>
							<li><a href="{{ url('admin/logout') }}"><i class="glyphicon glyphicon-log-out"></i>Logout</a></li>
						</ul>
					</div><!-- btn-group -->
					
				</div><!-- pull-right -->
				
			</div><!-- header-right -->
			
		</div><!-- headerwrapper -->
	</header>
	
	<section>
		<div class="mainwrapper">

			
				