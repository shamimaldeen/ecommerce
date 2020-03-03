@extends('layouts.frontlayout.front_design') 
@section('title','Home')
<!-- header end -->
<?php //include( 'header.php'); ?>

<!-- slider start -->

<!-- slider end -->

<!-- ========================= SECTION MAIN ========================= -->
@section('content')

<!-- slider start -->
<section style="background: linear-gradient(#00BCD4, #15c2d8, #00BCD4)!important" class="section-main bg padding-y-sm">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row row-sm">
                    <aside class="col-md-3">
                        <h5 class="text-uppercase">My Shop</h5>
                        <ul class="menu-category">
                            <?php $i = 0; ?>
                            @foreach($categories as $category)
                            @if($i > 5)
                            <?php $i = 0;?>
                            @break;

                            @endif
                            <li> <a href="{{ url('product/category/'.$category->id.'/'.str_replace(' ', '-', $category->category_name)) }}">{{$category->category_name}}</a></li>
                            
                            @php $i++ @endphp 
                            @endforeach
                            

                            <li class="has-submenu"> <a href="#">More category  <i class="icon-arrow-right pull-right"></i></a>
                                <ul class="submenu">
                                    @foreach($categories as $category)

                                    @if($i >5)

                                    <li> <a href="{{ url('product/category/'.$category->id.'/'.$category->category_name) }}">{{$category->category_name}}</a></li> 

                                    @endif
                                    
                                    @php $i++; @endphp
                                    @endforeach
                                    
                                </ul>
                            </li>

                        </ul>

                    </aside>
                    <!-- col.// -->
                    <div class="col-md-6">

                        <!-- ================= main slide ================= -->
                        <div id="carousel1_indicator" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel1_indicator" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel1_indicator" data-slide-to="1" class=""></li>
                                <li data-target="#carousel1_indicator" data-slide-to="2" class=""></li>
                            </ol>
                            <div class="carousel-inner">
                                @foreach($sliders as $slider)
                                <div class="carousel-item @if($sliderincrem == 1) active @endif">
                                    <img class="d-block w-100" src="{{asset('uploads/slider/'.$slider->slider_image)}}" alt="Third slide">
                                </div>

                                <span style="display: none;">{{$sliderincrem++}}</span>

                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!-- ============== main slidesow .end // ============= -->

                    </div>
                    <!-- col.// -->
                    <aside class="col-md-3">

                        <div id="code_card_list">
                            <div class="card">
                                <img class="card-img-top" src="{{asset('asset/front/images/posts/2.jpg')}}" alt="Card image cap">

                                <ul class="list-group list-group-flush">
                                  <li class="list-group-item"><a href="{{ url('product/featured')}}">Featured Products</a></li>
                                  <li class="list-group-item"><a href="{{ url('product/new_arrival')}}">New Arrival</a></li>
                                  <li class="list-group-item"> <a href="{{ url('product/hot_deals')}}">Hot Deals</a></li>
                                  <li class="list-group-item"><a href="{{ url('product/offer')}}">Offer</a></li>
                              </ul>
                          </div>
                          <!-- card.// -->
                      </div>
                      <!-- code wrap.// -->
                  </aside>
              </div>
              <!-- row.// -->
          </div>
          <!-- card-body .// -->
      </div>
      <!-- card.// -->

  </div>
  <!-- container .//  -->
</section>
<!-- slider end -->

<!-- ========================= SECTION MAIN END// ========================= -->
<section class="section-content padding-y-sm bg">
    <div class="container">
        <div class="title-text">
            <span class="h4">FEATURED PRODUCTS</span>
            <div class="btn-group btn-group-sm float-right">
                <button type="button" class="custom-nav-first owl-custom-prev btn btn-secondary">
                    < </button>
                    <button type="button" class="custom-nav-first owl-custom-next btn btn-secondary"> > </button>
                </div>

            </div>
        </header>
        <!-- ============== owl slide items 2  ============= -->
        <div class="owl-carousel owl-init slide-items" id="slide_custom_nav" data-custom-nav="custom-nav-first" data-items="5" data-margin="20" data-dots="true" data-nav="false">

            @foreach($featureds  as $featured)

            <div class="item-slide">
                <figure class="card card-product">
                    <span class="badge-new"> NEW </span>
                    <div class="img-wrap"> 



                        @if($featured['fea_image1'] == null || $featured['fea_image1'] == '' )
                        <img src="{{asset('uploads/product/feature-default.jpg')}}">
                        @else
                        <img src="{{asset('uploads/product/feature_image/'.$featured['fea_image1'])}}">


                        @endif



                    </div>
                    <figcaption class="info-wrap text-center">
                        <h6 class="title text-truncate"><a href="{{ url('product/view/'.$featured->id.'/'.str_replace(' ', '-', str_replace('/', '-', $featured->product_name))) }}">{{$featured->product_name}}</a></h6>

                    </figcaption>
                </figure>
                <!-- card // -->
            </div>

            @endforeach
            
            
        </div>
        <!-- ============== owl slide items 2 .end // ============= -->

    </div>
    <!-- container .//  -->

    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content padding-y-sm bg">
        <div class="container">
            <header class="section-heading heading-line">
                <h4 class="title-section bg text-uppercase">New Arival</h4>
            </header>

            <div id="code_prod2">
                <div class="row">
                    @foreach($newarrivals as $newarrival)
                    <div class="col-md-3">
                        <figure class="card card-product">
                            <div class="img-wrap">
                              {{--   <img src="{{asset('uploads/product/feature_image/'.$newarrival->fea_image1)}}"> --}}

                              @if($newarrival['fea_image1'] == null || $newarrival['fea_image1'] == '' )
                              <img src="{{asset('uploads/product/feature-default.jpg')}}">
                              @else
                              <img src="{{asset('uploads/product/feature_image/'.$newarrival['fea_image1'])}}">


                              @endif





                              <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                          </div>
                          <figcaption class="info-wrap">
                            <a href="{{ url('product/view/'.$newarrival->id.'/'.str_replace(' ', '-', str_replace('/', '-', $newarrival->product_name))) }}" class="title">{{$newarrival->product_name}}</a>
                            <div class="action-wrap">
                                <a href="{{ url('cart/add/product/'.$newarrival['id']) }}" class="btn btn-warning btn-sm float-right"> <i class="fa fa-shopping-cart"></i> Add To Cart </a>
                                <div class="price-wrap h5">
                                    <span class="price-new">&#x9f3;{{$newarrival->sale_price}}</span>
                                    <del class="price-old">&#x9f3;{{$newarrival->price}}</del>
                                </div>
                                <!-- price-wrap.// -->
                            </div>
                            <!-- action-wrap -->
                        </figcaption>
                    </figure>
                    <!-- card // -->
                </div>
                @endforeach
                <!-- col // -->

                <!-- col // -->

                <!-- col // -->
            </div>
            <!-- row.// -->
        </div>

    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content padding-y-sm bg">
        <div class="container">

            <header class="section-heading heading-line">
                <h4 class="title-section bg">WE SERVED THIS BRANDS</h4>
            </header>

            <div class="card">
                <div class="row">

                    <div class="col-md-12">
                        <ul class="row no-gutters border-cols">

                            @foreach($brands as $brand)
                            <li class="col-6 col-md-2">
                                <a href="{{ url('product/brand/'.$brand->id.'/'.str_replace(" ", "-", str_replace(' ', '-', $brand->brand_name))) }}" class="itembox">
                                    <div style="text-align: center;
                                    border-top: 1px solid #eeee!important;" class="card-body">

                                    @if($brand->brand_image == 'default.png')

                                    <img class="img-sm" style="width: 100% !important; height: 120px !important; opacity: .4;" src="{{asset('uploads/brand/'.$brand->brand_image)}}">


                                    @else
                                    <img class="img-sm" style="width: 100% !important; height: 120px !important;" src="{{asset('uploads/brand/'.$brand->brand_image)}}">
                                    @endif
                                    <p class="word-limit">{{$brand->brand_name}} </p>

                                </div>
                            </a>
                        </li>

                        @endforeach
                    </ul>
                </div>
                <!-- col.// -->
            </div>
            <!-- row.// -->

        </div>
        <!-- card.// -->

    </div>
    <!-- container .//  -->
</section>
<!-- ========================= SECTION ITEMS ========================= -->
<section class="section-request bg padding-y-sm">
    <div class="container">

        <div class="row">
            <aside class="col-md-4">
                <header class="section-heading heading-line">
                    <h4 class="title-section bg text-uppercase">Hot Deals</h4>
                </header>

                <div id="code_itemside_img2">
                    <div class="box items-bAdd To Carted-wrap">
                        @foreach($hotdeals as $hotdeal)
                        <figure class="itemside">
                            <div class="aside">


                                @if($hotdeal['fea_image1'] == null || $hotdeal['fea_image1'] == '' )
                                <img src="{{ asset('uploads/product/feature-default.jpg') }}" alt="" class="img-sm" >
                                @else
                                <img src="{{asset('uploads/product/feature_image/'.$hotdeal->fea_image1)}}" class="img-sm">
                                @endif


                            </div>
                            <figcaption class="text-wrap align-self-center">
                                <h6 class="title"><a href="{{ url('product/view/'.$hotdeal->id.'/'.str_replace(' ', '-', str_replace('/', '-',  $hotdeal->product_name))) }}">{{$hotdeal->product_name}}</a></h6>
                                <div class="price-wrap">
                                    <span class="price-new">&#x9f3;{{$hotdeal->sale_price}}</span>
                                    <del class="price-old text-muted">&#x9f3;{{$hotdeal->price}}</del>
                                </div>
                                <!-- price-wrap.// -->
                            </figcaption>
                        </figure>

                        @endforeach


                        <hr><a href="{{ url('product/hot_deals')}}" class="btn btn-warning"> More Hot Deals</a>
                    </div>
                    <!-- box.// -->

                </div>
                <!-- code-wrap.// -->
            </aside>
            <!-- col.// -->

            <aside class="col-md-4">
                <header class="section-heading heading-line">
                    <h4 class="title-section bg text-uppercase">Offer</h4>
                </header>

                <div id="code_itemside_img2">
                    <div class="box items-bAdd To Carted-wrap">
                        @foreach($offers as $offer)
                        <figure class="itemside">
                            <div class="aside">
                                {{-- <img src="{{asset('uploads/product/feature_image/'.$offer->fea_image1)}}" class="img-sm"> --}}

                                @if($offer['fea_image1'] == null || $offer['fea_image1'] == '' )
                                <img src="{{ asset('uploads/product/feature-default.jpg') }}" alt="" class="img-sm" >
                                @else
                                <img src="{{asset('uploads/product/feature_image/'.$offer->fea_image1)}}" class="img-sm">
                                @endif


                            </div>
                            <figcaption class="text-wrap align-self-center">
                                <h6 class="title"><a href="{{ url('product/view/'.$offer->id.'/'.str_replace(' ', '-', str_replace('/', '-', $offer->product_name))) }}">{{$offer->product_name}}</a></h6>
                                <div class="price-wrap">
                                    <span class="price-new">&#x9f3;{{$offer->sale_price}}</span>
                                    <del class="price-old text-muted">&#x9f3;{{$offer->price}}</del>
                                </div>
                                <!-- price-wrap.// -->
                            </figcaption>
                        </figure>
                        @endforeach
                        <hr><a href="{{ url('product/offer')}}" class="btn btn-warning"> More Offer</a>
                    </div>
                    <!-- box.// -->

                </div>
                <!-- code-wrap.// -->
            </aside>
            <!-- col.// -->

            <aside class="col-md-4">
                <header class="section-heading heading-line">
                    <h4 class="title-section bg text-uppercase">Top Sale</h4>
                </header>

                <div id="code_itemside_img2">
                    <div class="box items-bAdd To Carted-wrap">
                        @foreach($top_sales as $top_sale)
                        <figure class="itemside">
                            <div class="aside">
                               {{--  <img src="{{asset('uploads/product/feature_image/'.$top_sale->fea_image1)}}" class="img-sm"> --}}

                               @if($top_sale->fea_image1 == null || $top_sale->fea_image1 == '')
                               <img src="{{asset('uploads/product/feature-default.jpg')}}" class="img-sm">
                               @else
                                <img src="{{asset('uploads/product/feature_image/'.$top_sale->fea_image1)}}" class="img-sm">
                               @endif


                           </div>
                           <figcaption class="text-wrap align-self-center">
                            <h6 class="title"><a href="{{ url('product/view/'.$offer->id.'/'.str_replace(' ', '-', str_replace('/', '-', $offer->product_name))) }}">{{$top_sale->product_name}}</a></h6>
                            <div class="price-wrap">
                                <span class="price-new">&#x9f3;{{$top_sale->sale_price}}</span>
                                <del class="price-old text-muted">&#x9f3;{{$top_sale->price}}</del>
                            </div>
                            <!-- price-wrap.// -->
                        </figcaption>
                    </figure>
                    @endforeach
                    <hr><a href="#" class="btn btn-warning"> More Top Sales Product</a>
                </div>
                <!-- box.// -->

            </div>
            <!-- code-wrap.// -->
        </aside>
        <!-- col.// -->

    </div>
    <!-- row.// -->

</div>
<!-- container // -->
</section>
<BR>
<BR>

<!-- ========================= SECTION SUBSCRIBE END.//========================= -->
<?php //include( 'footer.php'); ?>

{{-- footer start --}}
<!-- ========================= FOOTER ========================= -->
@endsection