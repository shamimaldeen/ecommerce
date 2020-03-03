@extends('layouts.frontlayout.front_design')
@section('title',$page->page_title)
@section('content')
<section class="section-content bg padding-y-sm">
<div class="container">
<nav class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="#">{{$page->page_title}}</a></li>
  </ol>
</nav>
<div class="row">
<div class="col-xl-10 col-md-9 col-sm-12"> 
  
  <!-- PRODUCT DETAIL -->
  <article class="card mt-3">
    <div class="card-body">
      <h4>{{$page->page_title}}</h4>
      {{htmlspecialchars_decode($page->page_description)}}
      
    </div>
    <!-- card-body.// --> 
  </article>
  <!-- card.// --> 
  
  <!-- PRODUCT DETAIL .// --> 
  
</div>
<!-- col // -->
<aside class="col-xl-2 col-md-3 col-sm-12">
<div class="card">
  <div class="card-header"> Menu </div>
  <div class="card-body small">
    <ul class="menu-category">
      <li> <a href="{{url('/')}}">Home</a></li>
      <li> <a href="{{url('page/1/terms-and-policy')}}">Terms & Policy </a></li>
      <li> <a href="{{url('page/2/money-refund')}}">Money Refund </a></li>
      <li> <a href="{{url('page/3/payment')}}"> Payment </a></li>
      <li> <a href="{{url('contact')}}"> Contact </a></li>
    </ul>
  </div>
  <!-- card-body.// --> 
</div>
<!-- card.// -->

</div>
<!-- row.// -->

</div>
<!-- container // -->
</section>
<!-- ========================= SECTION CONTENT .END// ========================= -->
@endsection