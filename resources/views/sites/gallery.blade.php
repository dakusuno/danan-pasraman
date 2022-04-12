@extends ('layouts.frontend')

@section ('content')
<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home" style="background: url('{{config('pasraman.image_banner_url')}}');">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Gallery				
							</h1>	
							<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  
							<a href="/gallery"> Gallery</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
				
			<!-- Start gallery Area -->
			<section class="gallery-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-7">
							<a href="{{asset('/frontend/img/gallery/g1.jpg')}}" class="img-gal">
								<div class="single-imgs relative">		
									<div class="overlay overlay-bg"></div>
									<div class="relative">				
										<img class="img-fluid" src="{{asset('/frontend/img/gallery/g1.jpg')}}" alt="">		
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-5">
							<a href="{{asset('/frontend/img/gallery/g2.jpg')}}" class="img-gal">
								<div class="single-imgs relative">		
									<div class="overlay overlay-bg"></div>
									<div class="relative">				
										<img class="img-fluid" src="{{asset('/frontend/img/gallery/g2.jpg')}}" alt="">				
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4">
							<a href="{{asset('/frontend/img/gallery/g3.jpg')}}" class="img-gal">
								<div class="single-imgs relative">		
									<div class="overlay overlay-bg"></div>
									<div class="relative">				
										<img class="img-fluid" src="{{asset('/frontend/img/gallery/g3.jpg')}}" alt="">				
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4">
							<a href="{{asset('/frontend/img/gallery/g8.jpg')}}" class="img-gal">
								<div class="single-imgs relative">		
									<div class="overlay overlay-bg"></div>
									<div class="relative">					
										<img class="img-fluid" src="{{asset('/frontend/img/gallery/g8.jpg')}}" alt="">				
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4">
							<a href="{{asset('/frontend/img/gallery/g9.jpg')}}"  class="img-gal">
								<div class="single-imgs relative">		
									<div class="overlay overlay-bg"></div>
									<div class="relative">					
										<img class="img-fluid" src="{{asset('/frontend/img/gallery/g9.jpg')}}" alt="">				
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-5">
							<a href="{{asset('/frontend/img/gallery/g6.jpg')}}" class="img-gal">
								<div class="single-imgs relative">		
									<div class="overlay overlay-bg"></div>
									<div class="relative">				
										<img class="img-fluid" src="{{asset('/frontend/img/gallery/g6.jpg')}}" alt="">				
									</div>
								</div>
							 </a>
						</div>
						<div class="col-lg-7">
							<a href="{{asset('/frontend/img/gallery/g7.jpg')}}" class="img-gal">
								<div class="single-imgs relative">		
									<div class="overlay overlay-bg"></div>
									<div  class="relative">					
										<img class="img-fluid" src="{{asset('/frontend/img/gallery/g7.jpg')}}" alt="">				
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4">
							<a href="{{asset('/frontend/img/gallery/g5.jpg')}}" class="img-gal">
								<div class="single-imgs relative">		
									<div class="overlay overlay-bg"></div>
									<div class="relative">				
										<img class="img-fluid" src="{{asset('/frontend/img/gallery/g5.jpg')}}" alt="">				
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4">
							<a href="{{asset('/frontend/img/gallery/g4.jpg')}}" class="img-gal">
								<div class="single-imgs relative">		
									<div class="overlay overlay-bg"></div>
									<div class="relative">					
										<img class="img-fluid" src="{{asset('/frontend/img/gallery/g4.jpg')}}" alt="">				
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4">
							<a href="{{asset('/frontend/img/gallery/g10.jpg')}}"  class="img-gal">
								<div class="single-imgs relative">		
									<div class="overlay overlay-bg"></div>
									<div class="relative">					
										<img class="img-fluid" src="{{asset('/frontend/img/gallery/g10.jpg')}}" alt="">				
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>	
			</section>
            <!-- End gallery Area -->
           		
@stop