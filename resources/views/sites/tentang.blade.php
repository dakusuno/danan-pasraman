@extends ('layouts.frontend')

@section ('content')
<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home" style="background: url('{{config('pasraman.image_banner_url')}}');">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Tentang Pasraman			
							</h1>	
                            <p class="text-white link-nav"><a href="/">Home </a>  
                            <span class="lnr lnr-arrow-right"></span>  <a href="/tentang"> Tentang Pasraman</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start feature Area -->
<section class="feature-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="single-feature">
					<div class="title">
						<h4>{{config('pasraman.home_feature_column_1_title')}}</h4>
					</div>
					<div class="desc-wrap">
						<p>
							{{config('pasraman.home_feature_column_1_content')}}
						</p>
						<a
							href="{{config('pasraman.home_feature_column_1_link_url')}}">{{config('pasraman.home_feature_column_1_link_text')}}</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="single-feature">
					<div class="title">
						<h4>{{config('pasraman.home_feature_column_2_title')}}</h4>
					</div>
					<div class="desc-wrap">
						<p>
							{{config('pasraman.home_feature_column_2_content')}}
						</p>
						<a
							href="{{config('pasraman.home_feature_column_2_link_url')}}">{{config('pasraman.home_feature_column_2_link_text')}}</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="single-feature">
					<div class="title">
						<h4>{{config('pasraman.home_feature_column_3_title')}}</h4>
					</div>
					<div class="desc-wrap">
						<p>
							{{config('pasraman.home_feature_column_3_content')}}
						</p>
						<a
							href="{{config('pasraman.home_feature_column_3_link_url')}}">{{config('pasraman.home_feature_column_3_link_text')}}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> <br> <br> <br>
<!-- End feature Area -->

			<!-- Start info Area -->
			<section class="info-area pb-120">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-lg-6 no-padding info-area-left">
							<img class="img-fluid" src="{{asset('/frontend/img/about-img.jpg')}}" alt="">
						</div>
						<div class="col-lg-6 info-area-right">
							<h1>Pasraman Pinandita
                                Brahma Vidya Samgraha Buleleng
                            </h1>
							<p>
                                Pasraman Pinandita Brahma Vidya Samgraha pada saat proses pembelajaran berlangsung, 
                                yaitu di wantilan. Di dalam wantilan sisya sangat tenang dan nyaman saat mengikuti 
                                proses pembelajaran kepemangkuan. Pembelajaran kepemangkuan merupakan tata cara 
                                memimpin upacara keagamaan dengan alat genta, beras, dupa dan bunga.
                            </p>
							<br>
							<p>
                                Materi yang diberikan proses pembelajaran antara laki-laki dan perempuan adalah sama dan 
                                menggunakan sarana belajar yang sama, yang berbeda hanyalah posisi duduk dalam proses pembelajaran. 
							</p>
						</div>
					</div>
				</div>	
			</section>
			<!-- End info Area -->	
			
					

			<!-- Start search-course Area -->
<section class="search-course-area relative" style="background: url('{{config('pasraman.search_course_area_url')}}');">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-lg-12 col-md-12 search-course-left">
				<h1 class="text-white">
					Dapatkan Pembelajaran <br>
					dengan Mudah dan Murah!
				</h1>
				<p>
					Proses pembelajaran bersandar pada konsep Tri Hita Karana dan sistem pendidikan <br> 
					nonformal pada pasraman memiliki komponen penentu pendidikan nonformal, yaitu <br> 
					tenaga pendidik, peserta didik fasilitas pembelajaran, metoda yang digunakan dan <br> 
					waktu pelaksanaan pendidikan.
				</p>
					
				<div class="row details-content">
					<div class="col single-detials">
						<span class="lnr lnr-graduation-hat"></span>
						<a href="#">
							<h4>Pengajar Handal</h4>
						</a>
						<p>
							Para Nabe penggajar pasraman telah memiliki pemahaman yang memumpuni untuk melakukan proses
							belajar mengajar.
						</p>
					</div>
					<div class="col single-detials">
						<span class="lnr lnr-license"></span>
						<a href="#">
							<h4>Sertifikat</h4>
						</a>
						<p>
							Pasraman ini telah memiliki peraturan Pemerintah Nomor 55 Tahun 2007 tentang Pendidikan 
							Nonformal/Tentang Pasraman Hindu. 
						</p>
					</div>
					<div class="col single-detials">
						<span class="lnr lnr-hourglass"></span>
						<a href="#">
							<h4>Waktu Pembelajaran</h4>
						</a>
						<p>
							Pembelajaran pasraman dapat dilakukan dimanapun dan kapanpun dengan menggunakan fasilitas
							e-learning pada website ini.
						</p>
					</div>
					<div class="col single-detials">
						<span class="lnr lnr-thumbs-up"></span>
						<a href="#">
							<h4>Tanpa Syarat</h4>
						</a>
						<p>
							Seluruh umat Hindu dapat bergabung dalam keluarga besar Pasraman Pinandita Brahma Vidya 
							Samgraha Buleleng.
						</p>
					</div>
				</div>
			</div>
			
			
			<div >
			<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 
			<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 
			</div>
		</div>
	</div>
</section>

<!-- End search-course Area -->		
<section class="contact-page-area section-gap">
				<div class="container">
				<div class="menu-content pb-70 col-lg-12">
							<div class="title text-center">
								<h1 class="mb-3">Keyakinan untuk Pelayanan Umat</h1>
								<p>Bagi mereka yang sangat mencintai sistem ramah lingkungan.</p>
							</div>
						</div>
					<div class="row">
						<div class="col-lg-6 d-flex flex-column address-wrap">
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
									<p>Buka 24 Jam</p>
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
						<div class="col-md-6 video-right justify-content-center align-items-center d-flex relative">
                        	<div class="overlay overlay-bg"></div>
                            <a class="play-btn" href="https://www.youtube.com/watch?v=Vof0HL5i6Qs">
                            <img class="img-fluid mx-auto" src="{{asset('/frontend/img/play.png')}}" alt=""></a>
                        </div>
					</div>
				</div>	
			</section>
			
			<!-- Start review Area -->
			<!-- <section class="review-area section-gap relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row">
						<div class="active-review-carusel">
							<div class="single-review item">
								<div class="title justify-content-start d-flex">
									<a href="#"><h4>Fannie Rowe</h4></a>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
									</div>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>
							<div class="single-review item">
								<div class="title justify-content-start d-flex">
									<a href="#"><h4>Hulda Sutton</h4></a>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
									</div>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>
							<div class="single-review item">
								<div class="title justify-content-start d-flex">
									<a href="#"><h4>Fannie Rowe</h4></a>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
									</div>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>
							<div class="single-review item">
								<div class="title justify-content-start d-flex">
									<a href="#"><h4>Hulda Sutton</h4></a>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
									</div>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>	
							<div class="single-review item">
								<div class="title justify-content-start d-flex">
									<a href="#"><h4>Fannie Rowe</h4></a>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
									</div>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>
							<div class="single-review item">
								<div class="title justify-content-start d-flex">
									<a href="#"><h4>Hulda Sutton</h4></a>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
									</div>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>
							<div class="single-review item">
								<img src="img/r1.png" alt="">
								<div class="title justify-content-start d-flex">
									<a href="#"><h4>Fannie Rowe</h4></a>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
									</div>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>
							<div class="single-review item">
								<div class="title justify-content-start d-flex">
									<a href="#"><h4>Hulda Sutton</h4></a>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
									</div>
								</div>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
							</div>																												
						</div>
					</div>
				</div>	
			</section> -->
			<!-- End review Area -->		
@stop