@extends('layouts.frontlayout.front_design') 
@section('title',$product[0]['product_name'])
<!-- ========================= SECTION MAIN ========================= -->
@section("content")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<section class="section-content bg padding-y-sm">
    <div class="container">
        <nav class="mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('product/category/'.$product[0]['category_id'].'/'.str_replace(" ", "-", $product[0]['category']['category_name']))}}">{{$product[0]['category']['category_name']}}</a></li>

                
                <li class="breadcrumb-item"><a href="#">{{str_replace('/','-',$product[0]['product_name'])}}</a></li>


            </ol>
        </nav>
        <div class="row">
            <div class="col-xl-10 col-md-9 col-sm-12">
                <main class="card">
                    <div class="row no-gutters">
                        <aside class="col-sm-6 border-right">
                            <article class="gallery-wrap">
                                <div class="img-big-wrap">
                                    <div>
                                        <a href="{{asset('uploads/product/feature_image/'.$product[0]['fea_image1'])}}" data-fancybox="">
                                            {{-- <img src="{{asset('uploads/product/feature_image/'.$product[0]['fea_image1'])}}"> --}}

                                            @if($product[0]['fea_image1'] == null || $product[0]['fea_image1'] == '')
                                            <img src="{{asset('uploads/product/feature-default.jpg')}}" class="img-sm">
                                            @else
                                            <img src="{{asset('uploads/product/feature_image/'.$product[0]['fea_image1'])}}" class="img-sm">
                                            @endif


                                        </a>


                                    </div>
                                </div>
                                <!-- slider-product.// -->
                                <div class="img-small-wrap gallery-wrap" id="">
                                    @if(!empty($product[0]['fea_image2']))
                                    <div class="item-gallery"> 

                                        <a href="{{asset('uploads/product/feature_image/'.$product[0]['fea_image2'])}}"><img  src="{{asset('uploads/product/feature_image/'.$product[0]['fea_image2'])}}">
                                        </a>

                                    </div>
                                    @endif

                                    @if(!empty($product[0]['fea_image3']))
                                    <div class="item-gallery"> 

                                        <a href="{{asset('uploads/product/feature_image/'.$product[0]['fea_image3'])}}"><img  src="{{asset('uploads/product/feature_image/'.$product[0]['fea_image3'])}}">
                                        </a>

                                    </div>
                                    @endif

                                    @if(!empty($product[0]['fea_image4']))
                                    <div class="item-gallery"> 

                                        <a href="{{asset('uploads/product/feature_image/'.$product[0]['fea_image4'])}}"><img  src="{{asset('uploads/product/feature_image/'.$product[0]['fea_image4'])}}">
                                        </a>

                                    </div>
                                    @endif

                                    @if(!empty($product[0]['fea_image5']))
                                    <div class="item-gallery"> 

                                        <a href="{{asset('uploads/product/feature_image/'.$product[0]['fea_image5'])}}"><img  src="{{asset('uploads/product/feature_image/'.$product[0]['fea_image5'])}}">
                                        </a>
                                    </div>
                                    @endif


                                </div>
                                <!-- slider-nav.// -->
                            </article>
                            <!-- gallery-wrap .end// -->
                        </aside>
                        <aside class="col-sm-6">
                            <article class="card-body">
                                <!-- short-info-wrap -->
                                <h3 class="title mb-3">{{$product[0]['product_name']}}</h3>
                                <div class="mb-3">
                                    <var class="price h3 text-warning">
                                        <span class="currency">&#x9f3;<span class="num">{{$product[0]['sale_price']}}</span>
                                    </var>
                                    <span>{{-- /per kg --}}</span>
                                </div>
                                <!-- price-detail-wrap .// -->
                                <dl>
                                    <dt>Description</dt> @if (strlen($product[0]['description'])
                                    < 100) <dd>
                                        <p>{{$product[0]['description']}}</p>
                                    </dd>
                                    @else
                                    <dd>
                                        <p>
                                            @if(strlen($product[0]['description']) > 100)

                                            {{substr($product[0]['description'], 0, strpos($product[0]['description'], ' ', 10))}}

                                            @else
                                            {{substr($product[0]['description'], 0, strpos($product[0]['description'], ' ', 0))}}


                                            @endif
                                        </p>
                                    </dd>
                                    @endif
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3">Model#</dt>
                                    <dd class="col-sm-9">{{$product[0]['model']}}</dd>
                                    <dt class="col-sm-3">Color</dt>
                                    <dd class="col-sm-9">{{$product[0]['color']['color_name']}}</dd>
                                    <dt class="col-sm-3">Brand</dt>
                                    <dd class="col-sm-9"><a href="{{ url('product/brand/'.$product[0]['brand']['id'].'/'.$product[0]['brand']['brand_name']) }}">{{$product[0]['brand']['brand_name']}}</a></dd>

                                    <dt class="col-sm-3">Product URL</dt>
                                    <dd class="col-sm-9">{{Request::url()}}</dd>

                                    
                                </dl>
                                <div class="rating-wrap">
                                    <ul class="rating-stars">
                                        <li style="width:80%" class="stars-active">
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <div class="label-rating">132 reviews</div>
                                    <div class="label-rating">154 orders </div>
                                </div>
                                <!-- rating-wrap.// -->
                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <form action="{{url('cart/add/product/'.$product[0]['id'])}}" method="post">
                                            @csrf
                                            <dl class="dlist-inline">
                                                <dt>Quantity: </dt>
                                                <dd>
                                                    <select name="quantity" class="form-control form-control-sm" style="width:70px;">
                                                        <option value="1"> 1 </option>
                                                        <option value="2"> 2 </option>
                                                        <option value="3"> 3 </option>
                                                        <option value="4"> 4 </option>
                                                        <option value="5"> 5 </option>
                                                        <option value="6"> 6 </option>
                                                    </select>
                                                </dd>
                                            </dl>
                                            <!-- item-property .// -->
                                        </div>
                                        <!-- col.// -->
                                        <div class="col-sm-7">
                                            <dl class="dlist-inline">
                                                <dt>Size: </dt>
                                                <dd>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" name="inlineRadioOptions" id="inlineRadio2" value="option2" type="radio">
                                                        <span class="form-check-label">SM</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" name="inlineRadioOptions" id="inlineRadio2" value="option2" type="radio">
                                                        <span class="form-check-label">MD</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" name="inlineRadioOptions" id="inlineRadio2" value="option2" type="radio">
                                                        <span class="form-check-label">XXL</span>
                                                    </label>
                                                </dd>
                                            </dl>
                                            <!-- item-property .// -->
                                        </div>
                                        <!-- col.// -->
                                    </div>
                                    <!-- row.// -->
                                    <hr>
                                    <a href="{{url('customer/wish/add/product/'.$product[0]['id'])}}" class="btn  btn-danger"> <i class="fa fa-heart"></i> Favorite </a>
                                    <i class="fa fa-shopping-cart" ></i> <input type="submit" class="btn  btn-primary" value="Add To Cart" width="50px">
                                </form>
                                <!-- short-info-wrap .// -->
                            </article>
                            <!-- card-body.// -->
                        </aside>
                        <!-- col.// -->
                    </div>
                    <!-- row.// -->
                </main>
                <!-- card.// -->
                <!-- PRODUCT DETAIL -->
                <article class="card mt-3">
                    <div class="card-body">
                        <h4>Detail overview</h4>
                        <p>
                            {{$product[0]['description']}}
                        </p>
                    </div>
                    <!-- card-body.// -->
                </article>
                <!-- card.// -->
                <!-- PRODUCT DETAIL .// -->
            </div>
            <!-- col // -->
            <aside class="col-xl-2 col-md-3 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        You May Like
                    </div>
                    <div class="card-body row">
                        @foreach($productsidebars as $productsidebar)
                        <div class="col-md-12 col-sm-3">
                            <figure class="item border-bottom mb-3">
                                <a href="#" class="img-wrap"> 
                                 {{--  <img src="{{asset('uploads/product/feature_image/'.$productsidebar['fea_image1'])}}" class="img-md"> --}}

                                 @if($productsidebar['fea_image1'] == null || $productsidebar['fea_image1'] == '')
                                 <img src="{{asset('uploads/product/feature-default.jpg')}}" class="img-sm">
                                 @else
                                 <img src="{{asset('uploads/product/feature_image/'.$productsidebar['fea_image1'])}}" class="img-sm">
                                 @endif


                             </a>
                             <figcaption class="info-wrap">
                                <a href="{{url('product/view/'.$productsidebar['id'].'/'.str_replace(' ', '-', str_replace('/', '-', $productsidebar['product_name'])))}}" class="title">{{$productsidebar['product_name']}}</a>
                                <div class="price-wrap mb-3">
                                    <span class="price-new">৳{{$productsidebar['sale_price']}}</span> <del class="price-old">৳{{$productsidebar['price']}}</del>
                                </div>
                                <!-- price-wrap.// -->
                            </figcaption>
                        </figure>
                        <!-- card-product // -->
                    </div>
                    @endforeach
                    <!-- col.// -->
                    
                    <!-- col.// -->
                </div>
                <!-- card-body.// -->
            </div>
            <!-- card.// -->
        </aside>
        <!-- col // -->
    </div>
    <!-- row.// -->
</div>
<!-- container // -->
</section>
<script type="text/javascript">
    $(document).ready(function() {
        // $('[data-fancybox="gallery"]').fancybox({

        // });

    });
</script>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection