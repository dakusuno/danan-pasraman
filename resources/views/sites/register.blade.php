@extends ('layouts.frontend') 
@section ('content')
<section class="banner-area relative about-banner" id="home" style="background: url('{{config('pasraman.image_banner_url')}}');">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Registrasi Online
                </h1>
                <p class="text-white link-nav">
                    <a href="/ ">Home </a>
                    <span class="lnr lnr-arrow-right"></span>
                    <a href="/register">Registrasi Online</a>
                </p>
            </div>
        </div>
    </div>
</section>
<section class="search-course-area relative" style="background:unset;">
    <div class="container">
    @if(session('sukses'))

    @endif
    @if(session('error'))

    @endif
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-4 col-md-6 search-course-left">
                <h1>Registrasi Online <br /></h1>
                <p>
                    Registrasi online dapat dilakukan oleh calon sisya pasraman,
                    setelah melakukan tahap ini calon sisya tetap harus ke
                    Pasraman untuk menunjukan kesiapan dan memenuhi administrasi
                    yang tak bisa dilengkapi via online, Suksma.
                </p>
            </div>
            <div class="col-lg-6 col-md-6 search-course-right section-gap">
                {!! Form::open(['url' => '/postregister','class' => 'form-wrap']) !!}
                <h4 class="pb-20 text-center mb-30">
                    Formulir Pendaftaran
                </h4>
                {!!Form::text('nama_bapak','',['class' => 'form-control','placeholder'=> 'Nama Lengkap','required'])!!}
                {!!Form::text('nik_bapak','',['class' => 'form-control','placeholder'=> 'NIK'])!!}
                {!!Form::text('nohp_bapak','',['class' => 'form-control','placeholder'=> 'No HP'])!!}
                {!!Form::text('pekerjaan_bapak','',['class' => 'form-control','placeholder'=> 'Pekerjaan','required'])!!}
                {!!Form::textarea('alamat','',['class' => 'form-control','placeholder'=> 'Alamat','required'])!!}
                <div class="form-select" id="service-select">
                    {!!Form::select('tingkat',['' => 'Pilih tingkat', 'Jro Mangku' => 'Jro Mangku',
                    'Jro Mangku Gede' => 'Jro Mangku Gede',
                    'Ida Bhawati' => 'Ida Bhawati'
                    ],['style' => 'display:none;']);!!}
                </div>
                {!!Form::text('username','',['class' => 'form-control','placeholder'=> 'Username','required'])!!}
                {!!Form::password('password',['class' => 'form-control','placeholder'=> 'Password','required'])!!}
                <input type="submit" class="primary-btn text-uppercase" value="Kirim" style="text-align:center">
                {!! Form::close() !!}
            </div>

            
        </div>
    </div>
</section>
@stop