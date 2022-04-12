@extends ('layouts.frontend')

@section ('content')
<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home" style="background: url('{{config('pasraman.image_banner_url')}}');">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Detail Kegiatan			
							</h1>	
							<p class="text-white link-nav">Home <span class="lnr lnr-arrow-right"></span> Detail Kegiatan</p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
				
			<!-- Start event-details Area -->
			<section class="event-details-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 event-details-left">
							<div class="main-img">
								<img class="img-fluid" src="{{$kegiatan->thumbnail}}" alt="">
							</div>
							<div class="details-content">
								<a href="#">
									<h4>{{$kegiatan->judul}}</h4>
								</a>
								<p>
									{!! $kegiatan->deskripsi !!}							
								</p>
								
							</div>
							<div class="social-nav row no-gutters">
								<div class="col-lg-6 col-md-6 ">
									<ul class="focials">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
										<li><a href="#"><i class="fa fa-behance"></i></a></li>
									</ul>
								</div>
								<!-- <div class="col-lg-6 col-md-6 navs">
							

									<a href="#" class="nav-prev"><span class="lnr lnr-arrow-left"></span>Prev Event</a>
									<a href="#" class="nav-next">Next Event<span class="lnr lnr-arrow-right"></span></a>									
								</div> -->
							</div>
						</div>
						<div class="col-lg-4 event-details-right">
							<div class="single-event-details">
								<h4>Details</h4>
								<ul class="mt-10">
									<li class="justify-content-between d-flex">
										<span>Tanggal Mulai</span>
										<span>{{$kegiatan->tanggal_mulai->format('D, d M Y')}}</span>
									</li>
									<li class="justify-content-between d-flex">
										<span>Tanggal Akhir</span>
										<span>{{$kegiatan->tanggal_akhir->format('D, d M Y')}}</span>
									</li>
																						
								</ul>
							</div>
							<div class="single-event-details">
								<h4>Lokasi</h4>
								<ul class="mt-10">
									<li class="justify-content-between d-flex">
										<span>Tempat</span>
										<span>{{$kegiatan->tempat}}</span>
									</li>
									<li class="justify-content-between d-flex">
										<span>Jalan</span>
										<span>{{$kegiatan->jalan}}</span>
									</li>
									<li class="justify-content-between d-flex">
										<span>Kota</span>
										<span>{{$kegiatan->kota}}</span>
									</li>														
								</ul>
							</div>														
						</div>
					</div>
				</div>	
			</section>
			<!-- End event-details Area -->
@stop