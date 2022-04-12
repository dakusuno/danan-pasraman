@extends ('layouts.frontend')

@section ('content')

<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Kontak Kami				
							</h1>	
							<p class="text-white link-nav"><a href="/">Home </a>  
							<span class="lnr lnr-arrow-right"></span>  <a href="/kontak"> Kontak Kami</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->				  

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
						<div class="map-wrap" style="width:100%; height: 445px;" id="map"></div>
						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>Buleleng, Bali</h5>
									<p>
                                        Jl. Setia Budi No.104, Penarukan, Kec. Buleleng, Kabupaten Buleleng, Bali 81119
									</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>0812-4673-5469</h5>
									<p>Minggu, 08.00 s/d 13.00 Wita</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>PasramanBVS@gmail.com</h5>
									<p>Kontak kami kapanpun via email!</p>
								</div>
							</div>														
						</div>
					</div>
				</div>	
			</section>
			<!-- End contact-page Area -->
@stop