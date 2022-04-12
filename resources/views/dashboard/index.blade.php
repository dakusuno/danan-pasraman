@extends('layouts.master')
@section('dashboard')


@section('content')
@if(session('sukses'))
<div class="alert alert-success" role="alert">
    {{session('sukses')}}
</div>
@endif

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">DASHBOARD</h3>
            <div class="col-md-12">
                @if(auth()->user()->role == 'admin' || auth()->user()->role =='sisya')
                <!-- PANEL HEADLINE -->
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <h3 class="panel-title">Om Swastiastu, {{auth()->user()->name}}</h3>
                        <p class="panel-subtitle">Anda login sebagai <strong>{{auth()->user()->role}}</strong> dalam
                            Website Pasraman Pinandita Brahma
                            Vidya Samgraha Buleleng</p>
                    </div>
                </div>
                <!-- END PANEL HEADLINE -->
                @endif
                @if(auth()->user()->role == 'pengunjung')
                <!-- PANEL HEADLINE -->
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <h3 class="panel-title">Om Swastiastu, {{auth()->user()->name}}</h3>
                        <p class="panel-subtitle">Anda login sebagai <strong> Nabe </strong> dalam
                            Website Pasraman Pinandita Brahma
                            Vidya Samgraha Buleleng</p>
                    </div>
                </div>
                <!-- END PANEL HEADLINE -->
                @endif
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon">
                    </span>
                    <p>
                        <span class="number">{{totalSisya()}}</span>
                        <span class="title">Total Sisya</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"></span>
                    <p>
                        <span class="number">{{totalNabe()}}</span>
                        <span class="title">Total Nabe</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"></span>
                    <p>
                        <span class="number">{{totalMapel()}}</span>
                        <span class="title">Total Mapel</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"></span>
                    <p>
                        <span class="number">{{totalMateri()}}</span>
                        <span class="title">Total Materi</span>
                    </p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ranking 5 Besar</h3>
                    </div>
                    <div class="panel-body" div style="overflow-x:auto;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">RANKING</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">TINGKAT</th>
                                    <th scope="col">TOTAL NILAI</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $ranking = 1;
                                @endphp
                                @foreach(ranking5Besar() as $s)
                                <tr>
                                    <td scope="row" data-label="ranking">{{$ranking}}</td>
                                    <td data-label="nama">{{$s->nama_bapak}}</td>
                                    <td data-label="tingkat">{{$s->tingkat}}</td>
                                    <td data-label="total Nilai">{{$s->totalNilai}}</td>
                                </tr>
                                @php
                                $ranking++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--  -->

            <div class="col-md-4">
                <!-- PANEL DEFAULT -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-info-circle"></i> Informasi</h3>
                        <div class="right">
                            <button type="button" class="btn-toggle-collapse"><i
                                    class="lnr lnr-chevron-up"></i></button>
                            <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                        </div>
                    </div>
                    <div class="panel-body" style="display: block;">
                        <p>
                            Terimakasih telah menggunakan aplikasi Website Pasraman Pinandita BVS.

                            Semangat!
                        </p> <br>
                      
                       @if($naikTingkat != null)
                       @if(!$naikTingkat->status)
                        <p>
                            <strong>NAIK TINGKAT</strong> <br>

                            Permintaan Naik Tingkat tanggal <strong>{{\Carbon\Carbon::parse($naikTingkat->created_at)->format('d M Y')}}</strong> <br>
                            dari Tingkat <Strong>{{$naikTingkat->tingkat->tingkat}}</Strong> menjadi <strong>{{$naikTingkat->naikTingkat->tingkat}}</strong> <br>
                            <strong>Belum</strong> disetujui pihak Pasraman. <br>
                            untuk informasi lebih lanjut silahkan hubungi Pihak Pasraman, Suksma.
                        </p>
                        @endif
                       @endif
                     
                    </div>
                </div>
                <!-- END PANEL DEFAULT -->
            </div>
            <div class="col-md-4">
                <!-- PANEL HEADLINE -->
                <!-- <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-info-circle"></i> Kegiatan Pasraman</h3> <br>
                        <div class="w3-content w3-display-container">
                            @foreach($kegiatan as $keg)
                                <img class="mySlides" src="{{$keg->thumbnail}}" style="width:100%">
                            @endforeach

                        </div>
                    </div>
                </div> -->
                <!-- END PANEL HEADLINE -->
            </div>

            <!-- @foreach($kegiatan as $keg)
            <div class="col-12 col-md-3">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-info-circle"></i> Informasi</h3>
                        <div class="right">
                            <button type="button" class="btn-toggle-collapse"><i
                                    class="lnr lnr-chevron-up"></i></button>
                            <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                        </div>
                    </div>
                    <div class="panel-body" style="display: block;">


                            <div class="col-12 ">
                                <p>{{$keg->tanggal_mulai->format('d M Y')}} | di {{$keg->tempat}}</p>
                                <a href="{{route('show.kegiatan',$keg->slug)}}">
                                    <h4>{{$keg->judul}}</h4>
                                </a>
                                {!! str_limit($keg->deskripsi,150) !!}
                            </div>


                    </div>
                </div>
            </div>
             @endforeach -->
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


@stop


<style type="text/css">
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;

}

th,
td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #f2f2f2
}
</style>

@section('footer')
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {
        myIndex = 1
    }
    x[myIndex - 1].style.display = "block";
    setTimeout(carousel, 3000); // Change image every 2 seconds
}
</script>
<script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 1, 2020 00:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
        minutes + "m " + seconds + "s ";

    // If the count down is over, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script>
@stop
