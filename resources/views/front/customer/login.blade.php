<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Bootstrap-ecommerce by Vosidiy">
        <title>Customer Login</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
        <!-- jQuery -->
        <script src="{{asset('asset/front/js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>
        <!-- Bootstrap4 files-->
        <script src="{{asset('asset/front/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
        <link href="{{asset('asset/front/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
        <!-- Font awesome 5 -->
        <link href="{{asset('asset/front/fonts/fontawesome/css/fontawesome-all.min.css')}}" type="text/css" rel="stylesheet">
        <!-- plugin: owl carousel  -->
        <link href="{{asset('asset/front/plugins/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('asset/front/plugins/owlcarousel/assets/owl.theme.default.css')}}" rel="stylesheet">
        <script src="{{asset('asset/front/plugins/owlcarousel/owl.carousel.min.js')}}"></script>
        <!-- custom style -->
        <link href="{{asset('asset/front/css/ui.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('asset/front/css/responsive.css')}}" rel="stylesheet" media="only screen and (max-width: 1200px)" />
        <!-- custom javascript -->
        <script src="{{asset('asset/front/js/script.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
        /// some script
        // jquery ready start
        $(document).ready(function() {
        // jQuery code
        });
        // jquery end
        </script>
    </head>
    <body>
        <header class="section-header">
        </header>
        <!-- section-header.// -->
        <!-- ========================= SECTION CONTENT ========================= -->
        <section class="section-content bg padding-y-sm">
            <div class="container">
                <nav class="mb-">
                </nav>
                <div class="row">
                    <div class="col-xl-12 col-md-9 col-sm-12">
                        <div class="row">
                            <aside class="col-sm-3">
                            </aside>
                            <!-- PRODUCT DETAIL -->
                            <aside class="col-sm-6">
                                <div id="code_register_1">
                                    <div class="card">
                                        <header class="card-header">
                                            <a href="{{ url('/') }}" class="float-right btn btn-outline-primary mt-1">Home </a>
                                            <h4 class="card-title mt-2">Customer Login</h4>
                                            @if(Session::has('flash_message_success'))
                                            <p class="alert alert-success"  id="message"> {{session('flash_message_success')}}</p>
                                            @endif
                                            @if(Session::has('flash_message_error'))
                                            <p class="alert alert-danger"  id="message"> {{session('flash_message_error')}}</p>
                                            @endif
                                            @if ($errors->any())
                                            
                                            @foreach ($errors->all() as $error)
                                            <p class="alert alert-danger  message">{{ $error }}</p>
                                            @endforeach
                                            
                                            @endif
                                            
                                        </header>
                                        <article class="card-body">
                                            <form  method="post" action="{{url('customer/loginaction')}}">
                                                @csrf
                                                <div class="form-row">
                                                    
                                                    
                                                </div>
                                                <!-- form-row end.// -->
                                                
                                                <!-- form-group end.// -->
                                                
                                                <!-- form-group end.// -->
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input name="email" class="form-control" type="text">
                                                </div>

                                                  <div class="form-group">
                                                    <label>Password</label>
                                                    <input name="password" class="form-control" type="password">
                                                </div>


                                                <!-- form-group end.// -->
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-block"> Register </button>
                                                </div>
                                                <!-- form-group// -->
                                                <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>
                                            </form>
                                        </article>
                                        <!-- card-body end .// -->
                                        <div class="border-top card-body text-center">Have not account? <a href="{{url('customer/signup')}}">Create new</a></div>
                                    </div>
                                    <!-- card.// -->
                                </div>
                                <!-- code-wrap.// -->
                            </aside>
                            <!-- card.// -->
                            <!-- PRODUCT DETAIL .// -->
                        </div>
                        <!-- col // -->
                    </div>
                    <!-- row.// -->
                </div>
                <!-- container // -->
            </section>
            <!-- ========================= SECTION CONTENT .END// ========================= -->
            <script src="{{asset('asset/front/js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>
            <script>
                $(document).ready(function() {
                   setTimeout(function(){
                        $('.message').slideUp(500);
                   },3000);
                });
            </script>