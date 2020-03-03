<footer class="section-footer bg-secondary">
	<div class="container">
		<section class="footer-top padding-top">
			<div class="row">
				<aside class="col-sm-3 col-md-3 white">
					<h5 class="title">Customer Services</h5>
					<ul class="list-unstyled">
						<li> <a href="{{url('page/'.(5))}}/help-center">Help center</a></li>
						<li> <a href="{{url('page/'.(2))}}/money-refund">Money refund</a></li>
						<li> <a href="{{url('page/'.(1))}}/terms-and-policy">Terms and Policy</a></li>
						
					</ul>
				</aside>
				<aside class="col-sm-3  col-md-3 white">
					<h5 class="title">My Account</h5>
					<ul class="list-unstyled">
						<li> <a href="{{url('customer/login')}}"> User Login </a></li>
						<li> <a href="{{url('customer/signup')}}"> User register </a></li>
						<li> <a href="#"> My Orders </a></li>
						
					</ul>
				</aside>
				<aside class="col-sm-3  col-md-3 white">
					<h5 class="title">About</h5>
					<ul class="list-unstyled">
						<li> <a href="{{url('page/'.(4))}}/our-history"> Our history </a></li>
						<li> <a href="{{url('page/'.(6))}}/how-to-buy"> How to buy </a></li>
						<li> <a href="{{url('page/'.(7))}}/advertise"> Advertice </a></li>
					</ul>
				</aside>
				<aside class="col-sm-3">
					<article class="white">
						<h5 class="title">Contacts</h5>
						<p>
							<strong>Phone: {{$siteobject->mobile}}</strong>  <br>
							<strong>Fax:</strong>
						</p>
						<div class="btn-group white">
							<a class="btn btn-facebook" title="Facebook" target="_blank" href="{{$siteobject->facebooklink}}"><i class="fab fa-facebook-f  fa-fw"></i></a>
							<a class="btn btn-instagram" title="Instagram" target="_blank" href="https://{{$siteobject->instagramlink}}"><i class="fab fa-instagram  fa-fw"></i></a>
							<a class="btn btn-youtube" title="Youtube" target="_blank" href="https://{{$siteobject->youtubelink}}"><i class="fab fa-youtube  fa-fw"></i></a>
							<a class="btn btn-twitter" title="Twitter" target="_blank" href="https://{{$siteobject->twitterlink}}"><i class="fab fa-twitter  fa-fw"></i></a>
						</div>
					</article>
				</aside>
				</div> <!-- row.// -->
				<br>
			</section>
			<section class="footer-bottom row border-top-white">
				<div class="col-sm-6">
					<img src="{{asset('asset/front/images/icons/cash.png')}}"><img src="{{asset('asset/front/images/icons/bkash.png')}}">
				</div>
				<div class="col-sm-6">
					<p class="text-md-right text-white-50">
						Copyright &copy {{date('Y')}}, {{$siteobject->site_name}} <br>
						<a href="http://exploreit.com.bd" class="text-white-50">Technical Assitance: explore iT</a>
					</p>
				</div>
				</section> <!-- //footer-top -->
				</div><!-- //container -->
			</footer>
			<!-- ========================= FOOTER END // ========================= -->
			<script>
				$(document).ready(function() {
					setTimeout(function(){
						$('#message').slideUp(600);
					},5000);
				});	
			</script>
		</body>
	</html>