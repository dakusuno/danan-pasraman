<!doctype html>
<html lang="en">

<head>
    <title>Dashboard | Pasraman Pinandita BVS</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/chartist/css/chartist-custom.css')}}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('admin/assets/img/favicon.png')}}">
    <!-- TOASTR -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <!-- SELECT2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.css" rel="stylesheet" />
    <!-- TOOGLE -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
   


    <style>
        .ck-editor__editable_inline {
            min-height: 250px;
        }
    </style>
    <style>
.profile-main {
  position: relative;
  width: auto;
  height: auto;
  overflow: hidden;
}
.profile-main img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
</style>

    @yield('header')
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href="/">
                    <img src="{{asset('admin/assets/img/logo-dark.png')}}" 
                    alt="Pasraman Logo"
                    class="img-responsive logo"
                    style="width: auto;"></a>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i
                            class="lnr lnr-arrow-left-circle"></i></button>
                </div>
               
                <div class="navbar-btn navbar-btn-right">
                    <a class="btn btn-success update-pro" href="/logout" title="LOGOUT"><i class="fa fa-rocket"></i>
                        <span>LOGOUT</span></a>
                </div>
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="lnr lnr-alarm"></i>
                                <span class="badge bg-danger">5</span>
                            </a>
                            
                            <ul class="dropdown-menu notifications">
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System
                                        space is almost full</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9
                                        unfinished tasks</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly
                                        report is available</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly
                                        meeting in 1 hour</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your
                                        request has been approved</a></li>
                                <li><a href="#" class="more">See all notifications</a></li>
                            </ul> -->
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           
                                <span>{{auth()->user()->name}}</span> </a>
                            <!-- <ul class="dropdown-menu">
                                @if (auth()->user()->role == 'pengunjung')
                                <li><a href="/profilenabe"><i class="lnr lnr-user"></i> <span>Profile Nabe</span></a>
                                </li>
                                @endif

                                @if (auth()->user()->role == 'sisya')
                                <li><a href="/profilesaya"><i class="lnr lnr-user"></i> <span>Profile Sisya</span></a>
                                </li>
                                @endif
                                <li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                            </ul> -->
                        </li>


                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        
        <div id="sidebar-nav" class="sidebar" style="overflow-y:scroll;"    >
            <div class="sidebar-scroll" >
                <nav>
                <br> <br>
                    <ul class="nav">
                        <!-- <li>
                            <a href="/" class="{{Request::is('/')? 'active':''}}">
                                <i class="lnr lnr-home"></i>
                                <span>Home</span>
                            </a>
                        </li> -->
                        <li>
                            <a href="/dashboard" class="{{Request::is('/dashboard')?'active':''}}">
                                <i class="lnr lnr-pie-chart"></i> 
                                <span>Dashboard</span>
                            </a>
                        </li>
                        @if(auth()->user()->role == 'admin' || auth()->user()->role =='pengunjung' )
                        <li>
                            <a href="#subMaster" class="{{Request::is('/forum')?'active':''}}" data-toggle="collapse" class="collapsed">
                                <i class="lnr lnr-database"></i> 
                                <span>Master Data</span>
                                <i class="icon-submenu lnr lnr-chevron-left"></i>
                            </a>
                            <li>
                                <div id="subMaster" class="collapse ">
                                    <ul class="nav">
                                        <li><a href="/nabe" class="">Nabe</a></li>
                                        <li><a href="/sisya" class="">Sisya</a></li>
                                        <li><a href="/tingkat" class="">Tingkat</a></li>
                                        <li><a href="/kelas" class="">Kelas</a></li>
                                    </ul>
                                </div>
                            </li>
                        </li>
                        @endif
                        @if(auth()->user()->role == 'admin')
                        <li>
                            <a href="#subAktif" class="{{Request::is('/forum')?'active':''}}" data-toggle="collapse" class="collapsed">
                                <i class="lnr lnr-cog"></i> 
                                <span>Aktivasi Akun</span>
                                <i class="icon-submenu lnr lnr-chevron-left"></i>
                            </a>
                            <li>
                                <div id="subAktif" class="collapse ">
                                    <ul class="nav">
                                        <li><a href="/aktivsisya" class="">Sisya</a></li>
                                        <li><a href="/aktivnabe" class="">Nabe</a></li>
                                        <!-- <li><a href="/aktivadmin" class="">Admin</a></li> -->
                                    </ul>
                                </div>
                            </li>
                        </li>
                        <li>
                            <a href="/singkat" class="{{Request::is('/singkat')?'active':''}}">
                                <i class="lnr lnr-hourglass"></i> 
                                <span>Naik Tingkat</span>
                            </a>
                        </li>
                        @endif
                        @if(auth()->user()->role == 'admin' || auth()->user()->role =='pengunjung')
                        <li>
                            <a href="#subLearning" class="{{Request::is('/forum')?'active':''}}" data-toggle="collapse" class="collapsed">
                                <i class="lnr lnr-graduation-hat"></i> 
                                <span>E-Learning</span>
                                <i class="icon-submenu lnr lnr-chevron-left"></i>
                            </a>
                            <li>
                                <div id="subLearning" class="collapse ">
                                    <ul class="nav">
                                     <li><a href="/mapel" class="">Mata Pelajaran</a></li>
                                        <li><a href="/materi" class="">Materi</a></li>
                                        
                                    </ul>
                                </div>
                            </li>
                        </li>
                        <li>
                            <a href="#subSoal" class="{{Request::is('/forum')?'active':''}}" data-toggle="collapse" class="collapsed">
                                <i class="lnr lnr-star"></i> 
                                <span>Latihan Soal</span>
                                <i class="icon-submenu lnr lnr-chevron-left"></i>
                            </a>
                            <li>
                                <div id="subSoal" class="collapse ">
                                    <ul class="nav">
                                    
                                        <li><a href="/soal" class="">Soal</a></li>
                                        <!-- <li><a href="/Laporan" class="">Laporan</a></li> -->
                                        <li><a href="/banksoal" class="">Bank Soal</a></li>
                                    </ul>
                                </div>
                            </li>
                        </li>
                        <li>
                            <a href="/laporan" class="{{Request::is('/laporan')?'active':''}}">
                                <i class="lnr lnr-chart-bars"></i> 
                                <span>Laporan Hasil Belajar</span>
                            </a>
                        </li>
                        <li>
                            <a href="/posts" class="{{Request::is('/')? 'active':''}}">
                                <i class="lnr lnr-paperclip"></i>
                                <span>Posts</span>
                            </a>
                        </li>
                        <li>
                            <a href="/index" class="{{Request::is('/')? 'active':''}}">
                                <i class="lnr lnr-bullhorn"></i>
                                <span>Kegiatan</span>
                            </a>
                        </li>
                        <li>
                            <a href="#subForum" class="{{Request::is('/forum')?'active':''}}" data-toggle="collapse" class="collapsed">
                                <i class="lnr lnr-bubble"></i>
                                <span>Forum</span>
                                <i class="icon-submenu lnr lnr-chevron-left"></i>
                            </a>
                            <li>
                                <div id="subForum" class="collapse ">
                                    <ul class="nav">
                                        <li><a href="/forum" class="">Forum</a></li>
                                        <li><a href="/tag/create" class="">Tags</a></li>
                                    </ul>
                                </div>
                            </li>
                        </li>
                        @endif
                        @if(auth()->user()->role == 'sisya')
                        <li>
                            <a href="/profilesaya" class="{{Request::is('/singkat')?'active':''}}">
                                <i class="lnr lnr-user"></i> 
                                <span>Profile Sisya</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="#subMateri" data-toggle="collapse" class="collapsed" >
                                <i class="lnr lnr-book"></i> 
                                <span>Mata Pelajaran</span> 
                                <i class="icon-submenu lnr lnr-chevron-left" ></i> 
                            </a>
                            <li>
                                <div id="subMateri" class="collapse " >
                                    <ul class="nav">
                                    <?php $detailKelas = \App\DetailKelas::whereSisyaId(auth()->user()->sisya->id)->first() ?>
                                        @foreach( $mapels = \App\Mapel::whereTingkatId($detailKelas->kelas->tingkat_id)->get() as $mapel)
                                            <li><a href="{{route('showMateri',['id' => $mapel->id])}}" class="">{{$mapel->nama}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        </li>

                        <li>
                            <a href="/forum" class="{{Request::is('/forum')?'active':''}}">
                                <i class="lnr lnr-bubble"></i> 
                                <span>Forum</span>
                            </a>
                        </li>
                        <li>
                            <a href="/sisya" class="{{Request::is('/singkat')?'active':''}}">
                                <i class="lnr lnr-layers"></i> 
                                <span>Daftar Sisya</span>
                            </a>
                        </li>
                        <li>
                            <a href="/nabe" class="{{Request::is('/singkat')?'active':''}}">
                                <i class="lnr lnr-users"></i> 
                                <span>Daftar Nabe</span>
                            </a>
                        </li>
                        <li>
                            <a href="/posts" class="{{Request::is('/')? 'active':''}}">
                                <i class="lnr lnr-paperclip"></i>
                                <span>Posts</span>
                            </a>
                        </li>
                        <li>
                            <a href="/index" class="{{Request::is('/')? 'active':''}}">
                                <i class="lnr lnr-bullhorn"></i>
                                <span>Kegiatan</span>
                            </a>
                        </li>
                        @endif
                       
                        
                        <!-- <li>
                            <a href="#subPerpus" class="{{Request::is('/forum')?'active':''}}" data-toggle="collapse" class="collapsed" >
                                <i class="lnr lnr-layers"></i> 
                                <span>Sumber Buku</span>
                                <i class="icon-submenu lnr lnr-chevron-left" ></i> 
                            </a>
                            <li>
                                <div id="subPerpus" class="collapse " >
                                    <ul class="nav">
                                        <li><a href="{{url('peminjaman')}}" class="">Peminjaman</a></li>
                                        <li><a href="{{url('pengembalian')}}" class="">Pengembalian</a></li>
                                    </ul>
                                </div>
                            </li>
                        </li> -->
                        
                        <!-- <li class="panel">
							<a href="#" data-toggle="collapse" data-target="#submenuDemo" data-parent="#sidebar-nav-menu" class="" ><i class="ti-menu"></i> <span class="title">Multilevel Menu</span><i class="icon-submenu ti-angle-left"></i></a>
							<div id="submenuDemo" class="collapse in" style="">
								<ul class="submenu">
									<li class="panel">
										<a href="#" data-toggle="collapse" data-target="#submenuDemoLv2" class="collapsed" aria-expanded="false">Submenu 1 <i class="icon-submenu ti-angle-left"></i></a>
										<div id="submenuDemoLv2" class="collapse" aria-expanded="false" >
											<ul class="submenu">
												<li><a href="#">Another menu level</a></li>
												<li><a href="#" class="active">Another menu level</a></li>
												<li><a href="#">Another menu level</a></li>
											</ul>
										</div>
									</li>
									<li><a href="#">Submenu 2</a></li>
									<li><a href="#">Submenu 3</a></li>
								</ul>
							</div>
						</li> -->
                        <!-- <li>
                            <a href="/chat" class="{{Request::is('/chat')? 'active':''}}" >
                                <i class="lnr lnr-bubble" ></i> 
                                <span>Live Chat</span>
                            </a>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
<br>
        <!-- MAIN CONTENT -->
        @yield('dashboard')
        @yield('content')
        @yield('edit') 
    </div>



    <div class="clearfix"></div>
    <footer>
        <div class="container-fluid">
            <p class="small">
                Copyright 
                    &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> 
                | Website ini dibangun dengan 
                    <i class="fa fa-heart-o" aria-hidden="true"></i> 
                oleh <a href="#">Pasraman Pinandita Brahma Vidya Samgraha Buleleng</a>
            </p>
        </div>
    </footer>
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="{{asset('admin/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/chartist/js/chartist.min.js')}}"></script>
    <script src="{{asset('admin/assets/scripts/klorofil-common.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{asset('frontend/js/ckeditor.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>


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

    @yield('footer')
</body>

</html>