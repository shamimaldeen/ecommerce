<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
		
        <title>Admin- Smartonline.com.bd</title>
		
        <link href="{{asset('asset/back/css/style.default.css')}}" rel="stylesheet">
		
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
	
    <body class="signin">
        
        
        <section>
            
            <div class="panel panel-signin">
                <div class="panel-body">
                    <div style="font-size: 24px;
					text-align: center;
					color: #428bca;">
                       Login
					</div>

                    @if(Session::has('flash_message_error'))
                        <p class="alert alert-danger" id="message"> {{session('flash_message_error')}}</p>
                    @endif
					
                    <div class="mb30"></div>
                    
                    <form action="{{url('admin')}}" method="post">
                    {{csrf_field()}}
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" name="email" class="form-control" placeholder="Username">
						</div><!-- input-group -->
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Password">
						</div><!-- input-group -->
                        
                        <div class="clearfix">
                            <div class="pull-left">
                             <a href="#"> Forgot Password</a>
							</div>
                        
						</div>                      
					
                    
				</div><!-- panel-body -->
                <div class="panel-footer">
				<center>
				  {{-- <a href="signup.php" class="btn btn-default ">Registration</a>  --}}
				 <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-log-in"></i>   Login  </button>
                  
					<center>
				</div><!-- panel-footer -->
			</form>
			</div><!-- panel -->
			<div style="text-align:center; padding: 10px;">
            Technical Support- explore-it</div>
		</section>
		
		
        <script src="{{asset('asset/back/js/jquery-1.11.1.min.js')}}"></script>
        <script src="{{asset('asset/back/js/jquery-migrate-1.2.1.min.js')}}"></script>
        <script src="{{asset('asset/back/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('asset/back/js/modernizr.min.js')}}"></script>
        <script src="{{asset('asset/back/js/pace.min.js')}}"></script>
        <script src="{{asset('asset/back/js/retina.min.js')}}"></script>
        <script src="{{asset('asset/back/js/jquery.cookies.js')}}"></script>
        <script src="js/custom.js"></script>
        <script>
            $(document).ready(function(){
                setTimeout(function () {
                    $('#message').slideUp(500);
                },5000);
            });
        </script>
		
	</body>
</html>
