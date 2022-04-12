@extends('layouts.frontend')

@section('content')
<!-- start banner Area -->
<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Detail Artikel				
							</h1>	
							<p class="text-white link-nav">Home <span class="lnr lnr-arrow-right"></span> Detail Artikel</p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->
<section class="post-content-area single-post-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 posts-list">
							<div class="single-post row">
								<div class="col-lg-12">
									<div class="feature-img">
										<img class="img-fluid" src="{{$post->thumbnail}}" alt="#">
									</div>									
								</div>
								<div class="col-lg-3  col-md-3 meta-details">
									
									<div class="user-details row">
										<!-- <p class="user-name col-lg-12 col-md-12 col-6"><a href="#">{{$post->user->name}}</a> <span class="lnr lnr-user"></span></p> -->
										<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">Pasraman Pindandita Brahma Vidya Samgraha</a> <span class="lnr lnr-user"></span></p>
										<p class="date col-lg-12 col-md-12 col-6"><a href="#">{{$post->created_at->diffforHumans()}}</a> <span class="lnr lnr-calendar-full"></span></p>
																													
									</div>
								</div>
								<div class="col-lg-9 col-md-9">
									<h3 class="mt-20 mb-20">{{$post->title}}</h3>
									{!!$post->content!!}
								</div>
								
							</div>
							
							<!-- <div class="navigation-area">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
										<div class="thumb">
											<a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
										</div>
										<div class="arrow">
											<a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
										</div>
										@if($prev)
										<div class="detials">
											<p>Prev Post</p>
											<a href="{{route('site.single.post',['slug' =>$prev->slug])}}"><h4>{{$prev->title}}</h4></a>
										</div>
										@endif
									</div>
									<div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
										@if($next)
										<div class="detials">
											<p>Next Post</p>
											<a href="{{route('site.single.post',['slug' =>$next->slug])}}"><h4>{{$next->title}}</h4></a>
										</div>
										@endif
										<div class="arrow">
											<a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>
										</div>
										<div class="thumb">
											<a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
										</div>										
									</div>									
								</div>
							</div> -->
							
							
						</div>
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
								<div class="single-sidebar-widget search-widget">
									<form class="search-form" action="#">
			                            <input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'" >
			                            <button type="submit"><i class="fa fa-search"></i></button>
			                        </form>
								</div>
								<div class="single-sidebar-widget user-info-widget">
									<img src="{{asset('/frontend/img/blog/user-info.png')}}" alt="">
                                <!-- <a href="#"><h4>{{$post->user->name}}</h4></a> -->
								<a href="#"><h4>Pasraman Pinandita Brahma Vidya Samgraha</h4></a>
									<p>
										<!-- {{$post->user->role}} -->
										Administrator
									</p>
									<ul class="social-links">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-github"></i></a></li>
										<li><a href="#"><i class="fa fa-behance"></i></a></li>
									</ul>
									<p>
									Jangan berhenti berupaya ketika menemui kegagalan. Bersyukurlah karena kegagalan adalah cara Tuhan mengajari kita arti kesungguhan.
									</p>
								</div>
										
							</div>
						</div>
					</div>
				</div>	
			</section>
@stop