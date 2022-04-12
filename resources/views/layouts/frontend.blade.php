<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
	<!-- TOASTR -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="{{asset('/frontend')}}/img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>{{config('pasraman.title')}}</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="{{asset('/frontend')}}/css/linearicons.css">
			<link rel="stylesheet" href="{{asset('/frontend')}}/css/font-awesome.min.css">
			<link rel="stylesheet" href="{{asset('/frontend')}}/css/bootstrap.css">
			<link rel="stylesheet" href="{{asset('/frontend')}}/css/magnific-popup.css">
			<link rel="stylesheet" href="{{asset('/frontend')}}/css/nice-select.css">							
			<link rel="stylesheet" href="{{asset('/frontend')}}/css/animate.min.css">
			<link rel="stylesheet" href="{{asset('/frontend')}}/css/owl.carousel.css">			
			<link rel="stylesheet" href="{{asset('/frontend')}}/css/jquery-ui.css">			
			<link rel="stylesheet" href="{{asset('/frontend')}}/css/main.css">
		</head>
		<body>	
		  <header id="header" id="home">
	  		<div class="header-top">
	  			<div class="container">
			  		<div class="row">
			  			<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
			  				<ul>
								<li><a href="{{config('pasraman.facebook_url')}}"><i class="fa fa-facebook"></i></a></li>
								<li><a href="{{config('pasraman.twitter_url')}}"><i class="fa fa-twitter"></i></a></li>
								<li><a href="{{config('pasraman.instagram_url')}}"><i class="fa fa-instagram"></i></a></li>
			  				</ul>			
			  			</div>
			  			<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
							  <a href="tel:0812-4673-5469"><span class="lnr lnr-phone-handset"></span> 
							  <span class="text">{{config('pasraman.telpon')}}</span></a>
							  <a href="mailto:PasramanBVS@gmail.com"><span class="lnr lnr-envelope"></span> 
							  <span class="text">{{config('pasraman.email')}}</span></a>			
			  			</div>
			  		</div>			  					
	  			</div>
			</div>
		    <div class="container main-menu">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="/"><img src="{{asset('/frontend/img/logo.png')}}" alt="" title="" /></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
					  <li><a href="/">Home</a></li>
					  <li><a href="/gallery">Gallery</a></li>
					  <li><a href="/tentang">Tentang</a></li>
					  <!-- <li><a href="/kontak">Kontak</a></li> -->
					  <!-- <li><a href="/indexKegiatan">Kegiatan</a></li> -->
			          <!-- <li><a href="/register">Registrasi Online</a></li>    					          		           -->
					  <!-- <li><a href="/login">Login</a></li> -->

			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		  </header><!-- #header -->
        @yield('content')
 <!-- Start cta-two Area -->
 <section class="cta-two-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 cta-left">
							<h1>Belum Puas Mengetahui Pasraman Kami?</h1>
						</div>
						<div class="col-lg-4 cta-right">
							<a class="primary-btn wh" href="/">jelajahi lebih banyak</a>
						</div>
					</div>
				</div>	
			</section>
			<!-- End cta-two Area -->	
			
						
			<!-- start footer Area -->		
			<footer class="footer-area">
				<div class="container">
					<div class="footer-bottom row align-items-center justify-content-between">
						<p class="footer-text m-0 col-lg-6 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> | Website ini dibangun dengan <i class="fa fa-heart-o" aria-hidden="true"></i> oleh <a href="#">Pasraman Pinandita Brahma Vidya Samgraha Buleleng</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
						<div class="col-lg-6 col-sm-12 footer-social">
							<a href="https://www.facebook.com/pages/Pasraman-Pandita-Brahma-Vidya-Samgraha/806115286126255"><i class="fa fa-facebook"></i></a>
							<a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
							<a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
							
						</div>
					</div>						
				</div> <br> <br>
			</footer>	
			<!-- End footer Area -->	


			<script src="{{asset('/frontend')}}/js/vendor/jquery-2.2.4.min.js"></script>
			<script src="{{asset('/frontend')}}/https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="{{asset('/frontend')}}/js/vendor/bootstrap.min.js"></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="{{asset('/frontend')}}/js/easing.min.js"></script>			
			<script src="{{asset('/frontend')}}/js/hoverIntent.js"></script>
			<script src="{{asset('/frontend')}}/js/superfish.min.js"></script>	
			<script src="{{asset('/frontend')}}/js/jquery.ajaxchimp.min.js"></script>
			<script src="{{asset('/frontend')}}/js/jquery.magnific-popup.min.js"></script>	
    		<script src="{{asset('/frontend')}}/js/jquery.tabs.min.js"></script>						
			<script src="{{asset('/frontend')}}/js/jquery.nice-select.min.js"></script>	
			<script src="{{asset('/frontend')}}/js/owl.carousel.min.js"></script>									
			<script src="{{asset('/frontend')}}/js/mail-script.js"></script>	
			<script src="{{asset('/frontend')}}/js/main.js"></script>	
			<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
			<script>
        @if (Session::has('sukses'))
        toastr.success("{{Session::get('sukses')}}", "Sukses")
        @endif
    </script>
    <script>
        @if (Session:: has('error'))
        toastr.error("{{Session::get('error')}}", "Error")
        @endif
    </script>
		</body>
	</html>