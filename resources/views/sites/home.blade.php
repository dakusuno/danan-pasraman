@extends ('layouts.frontend')

@section ('content')

<!-- start banner Area -->
<section class="banner-area relative" id="home" style="background: url('{{config('pasraman.image_banner_url')}}');">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row fullscreen d-flex align-items-center justify-content-between">
			<div class="banner-content col-lg-9 col-md-12">
				<h1 class="text-uppercase">
					{{config('pasraman.welcome_message')}}
				</h1>
				<p class="pt-10 pb-10">
					{{config('pasraman.sub_welcome_message')}}
				</p>
				<a href="{{config('pasraman.welcome_message_button_url')}}"
					class="primary-btn text-uppercase">{{config('pasraman.welcome_message_button_text')}}</a>
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
</section>
<!-- End feature Area -->

<!-- Start blog Area -->
<section class="popular-course-area section-gap">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10">Artikel Terbaru</h1>
					<p>Artikel terkait perjalanan Pasraman Brahma Vidya Samgraha.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="active-popular-carusel">
				@foreach($posts as $post)
				<div class="single-blog">
					<div class="thumb">
						<img class="img-fluid" src="{{$post->thumbnail()}}" alt="#">
					</div>
					<!-- <p class="meta">{{$post->created_at->format('d M Y')}} | oleh <a href="#">{{$post->user->name}}</a> -->
					<p class="meta">{{$post->created_at->format('d M Y')}} | oleh <a href="#">Pasraman Pinandita Brahma Vidya Samgraha</a>
					</p>
					<a href="{{route('site.single.post',$post->slug)}}">
						<h5>{{str_limit($post->title,30)}}</h5>
					</a>
					{!! str_limit($post->content,150)!!}
					<a href="{{route('site.single.post',$post->slug)}}"
						class="details-btn d-flex justify-content-center align-items-center"><span
							class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>
				</div>
				@endforeach
			</div>

		</div>
	</div>
</section>
<!-- End blog Area -->


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


			<div>
				<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
				<br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
			</div>
		</div>
	</div>
</section>
<!-- End search-course Area -->


<!-- Start upcoming-event Area -->
<section class="upcoming-event-area section-gap">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10">Kegiatan Pasraman</h1>
					<p>Untuk kamu yang tertarik dengan kegiatan kami!</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="active-upcoming-event-carusel">
			@foreach($kegiatan as $keg)
				<div class="single-carusel row align-items-center">
					<div class="col-12 col-md-6 thumb">
						<img class="img-fluid" src="{{$keg->thumbnail()}}" alt="">
					</div>
					<div class="detials col-12 col-md-6">
						<p>{{$keg->tanggal_mulai->format('d M Y')}} | di {{$keg->tempat}}</p>
						<a href="{{route('show.kegiatan',$keg->slug)}}">
							<h4>{{$keg->judul}}</h4>
						</a>

							{!! str_limit($keg->deskripsi,150) !!}

					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
<!-- End upcoming-event Area -->

<!-- Start review Area -->
<!-- <section class="review-area section-gap relative">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row">
			<div class="active-review-carusel">
				<div class="single-review item">
					<div class="title justify-content-start d-flex">
						<a href="#">
							<h4>Fannie Rowe</h4>
						</a>
						<div class="star">
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
						</div>
					</div>
					<p>
						Accessories Here you can find the best computer accessory for your laptop, monitor, printer,
						scanner, speaker. Here you can find the best computer accessory for your laptop, monitor,
						printer, scanner, speaker.
					</p>
				</div>
				<div class="single-review item">
					<div class="title justify-content-start d-flex">
						<a href="#">
							<h4>Hulda Sutton</h4>
						</a>
						<div class="star">
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
						</div>
					</div>
					<p>
						Accessories Here you can find the best computer accessory for your laptop, monitor, printer,
						scanner, speaker. Here you can find the best computer accessory for your laptop, monitor,
						printer, scanner, speaker.
					</p>
				</div>
				<div class="single-review item">
					<div class="title justify-content-start d-flex">
						<a href="#">
							<h4>Fannie Rowe</h4>
						</a>
						<div class="star">
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
						</div>
					</div>
					<p>
						Accessories Here you can find the best computer accessory for your laptop, monitor, printer,
						scanner, speaker. Here you can find the best computer accessory for your laptop, monitor,
						printer, scanner, speaker.
					</p>
				</div>
				<div class="single-review item">
					<div class="title justify-content-start d-flex">
						<a href="#">
							<h4>Hulda Sutton</h4>
						</a>
						<div class="star">
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
						</div>
					</div>
					<p>
						Accessories Here you can find the best computer accessory for your laptop, monitor, printer,
						scanner, speaker. Here you can find the best computer accessory for your laptop, monitor,
						printer, scanner, speaker.
					</p>
				</div>
				<div class="single-review item">
					<div class="title justify-content-start d-flex">
						<a href="#">
							<h4>Fannie Rowe</h4>
						</a>
						<div class="star">
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
						</div>
					</div>
					<p>
						Accessories Here you can find the best computer accessory for your laptop, monitor, printer,
						scanner, speaker. Here you can find the best computer accessory for your laptop, monitor,
						printer, scanner, speaker.
					</p>
				</div>
				<div class="single-review item">
					<div class="title justify-content-start d-flex">
						<a href="#">
							<h4>Hulda Sutton</h4>
						</a>
						<div class="star">
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
						</div>
					</div>
					<p>
						Accessories Here you can find the best computer accessory for your laptop, monitor, printer,
						scanner, speaker. Here you can find the best computer accessory for your laptop, monitor,
						printer, scanner, speaker.
					</p>
				</div>
				<div class="single-review item">
					<img src="{{asset('/frontend')}}/img/r1.png" alt="">
					<div class="title justify-content-start d-flex">
						<a href="#">
							<h4>Fannie Rowe</h4>
						</a>
						<div class="star">
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
						</div>
					</div>
					<p>
						Accessories Here you can find the best computer accessory for your laptop, monitor, printer,
						scanner, speaker. Here you can find the best computer accessory for your laptop, monitor,
						printer, scanner, speaker.
					</p>
				</div>
				<div class="single-review item">
					<div class="title justify-content-start d-flex">
						<a href="#">
							<h4>Hulda Sutton</h4>
						</a>
						<div class="star">
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
						</div>
					</div>
					<p>
						Accessories Here you can find the best computer accessory for your laptop, monitor, printer,
						scanner, speaker. Here you can find the best computer accessory for your laptop, monitor,
						printer, scanner, speaker.
					</p>
				</div>
			</div>
		</div>
	</div>
</section> -->
<!-- End review Area -->

<!-- Start cta-one Area -->
<section class="cta-one-area relative section-gap" style="background: url('{{config('pasraman.cta_one_area_url')}}');">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="wrap">
				<h1 class="text-white">Berpartisipasi dengan Kami</h1>
				<p>
				Proses pembelajaran bersandar pada konsep Tri Hita Karana dan sistem pendidikan
nonformal pada pasraman memiliki komponen penentu pendidikan nonformal, yaitu
tenaga pendidik, peserta didik fasilitas pembelajaran, metoda yang digunakan dan
waktu pelaksanaan pendidikan.
				</p>
				<a class="primary-btn wh" href="/register">Bergabung</a>
			</div>
		</div>
	</div>
</section>
<!-- End cta-one Area -->

<!-- Start popular-course Area -->
<section class="popular-course-area section-gap">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10">Berita Terbaru</h1>
					<p>Berita sepanjang perjalanan Pasraman Brahma Vidya Samgraha.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="active-popular-carusel">
				@foreach($posts as $post)
				<div class="single-blog">
					<div class="thumb">
						<img class="img-fluid" src="{{$post->thumbnail()}}" alt="#">
					</div>
					<!-- <p class="meta">{{$post->created_at->format('d M Y')}} | oleh <a href="#">{{$post->user->name}}</a> -->
					<p class="meta">{{$post->created_at->format('d M Y')}} | oleh <a href="#">Pasraman Pinandita Brahma Vidya Samgraha</a>
					</p>
					<a href="{{route('site.single.post',$post->slug)}}">
						<h5>{{str_limit($post->title,30)}}</h5>
					</a>
					{!! str_limit($post->content,150)!!}
					<a href="{{route('site.single.post',$post->slug)}}"
						class="details-btn d-flex justify-content-center align-items-center"><span
							class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>
				</div>
				@endforeach
			</div>

		</div>
	</div>
</section>
<!-- End popular-course Area -->


@stop
