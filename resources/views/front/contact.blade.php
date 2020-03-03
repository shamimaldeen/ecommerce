@extends('layouts.frontlayout.front_design')
@section('title','Contact')

<!-- ========================= SECTION CONTENT ========================= -->
@section('content')
<section class="section-content bg padding-y-sm">
  <div class="container">
    <nav class="mb-3">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Contact</a></li>
      </ol>
    </nav>
    <div class="row">

      <div class="col-xl-8 col-md-8 col-sm-12"> 
        
        <!-- PRODUCT DETAIL -->
        <article class="card mt-3">
          <div class="card-body">
            <h4>Contact</h4> 
            <hr>
            <dl class="row">
              <dt class="col-sm-2"> 
                <span class="mb-2 border icon-xs round"> <i class="fa fa-phone"></i> </span> </dt>
                <dd class="col-sm-10">{{$siteobject->mobile}}</dd>
                <dt class="col-sm-2">
                  <span class="mb-2 border icon-xs round"> <i class="fa fa-envelope"></i></span> </dt>
                  <dd class="col-sm-10">{{$userobject->email}}</dd>
                  <dt class="col-sm-2">
                    <span class="mb-2 border icon-xs round"> <i class="fa fa-map"></i></span> </dt>
                    <dd class="col-sm-10">{{$siteobject->address}}</dd>
                  </dl>
                  
                  <hr>
                  <p> </p>
                  
                </div>
                <!-- card-body.// --> 
              </article>
              <!-- card.// --> 
              
              <!-- PRODUCT DETAIL .// --> 
              
            </div>

            <!-- col // -->
            <aside class="col-xl-4 col-md-4 col-sm-12">

              <div class="card card-body">
                <h5 class="title py-4">Contact Form</h5>
                <form>
                  <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="" type="text">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="" type="text">
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input class="form-control" name="" type="text">
                  </div>
                  <div class="form-group">
                   <label>Message</label>
                   <textarea class="form-control"></textarea>
                 </div>
                 <a href="#" class="btn btn-primary"> Submit Query</a>
               </div>
               
               
             </form>
           </div>
           <!-- card.// -->

         </div>
         <!-- row.// -->

       </div>
       <!-- container // -->
     </section>
     <!-- ========================= SECTION CONTENT .END// ========================= -->


     @endsection