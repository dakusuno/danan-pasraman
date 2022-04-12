@extends('layouts.master')
@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            @if(session('sukses'))

            @endif
            @if(session('error'))

            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h2 class="panel-title">Sistem Naik Tingkat</h2>
                            <br>
                            <p class="text-muted font-13 m-b-30">
                                Halaman ini merupakan halaman diperuntukan para sisya yang ingin meningkatkan tingkat
                                kepinanditaannya.
                            </p>
                            <!-- <div class="right">
                                <div class="navbar-btn navbar-btn-right">
                                    <a href="#" class="btn btn-sm  btn-primary"><span>Add New Post</span></a>
                                </div>
                            </div> -->
                        </div>
                        <div class="panel-body" style="overflow-x:auto;">
                        @php $no = 1; @endphp
                            <table class="table table-hover" id="tabelPosts">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>TINGKAT</th>
                                        <th>NILAI</th>
                                        <th>TANGGAL</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($listNaikTingkats as $listNaikTingkat)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$listNaikTingkat->sisya->nama_bapak}}</td>
                                        <td>{{$listNaikTingkat->tingkat->tingkat}}</td>
                                        <td>{{$listNaikTingkat->sisya->totalNilai()}}</td>
                                        <td>{{$listNaikTingkat->created_at->format('d M Y')}} <small>{{$listNaikTingkat->created_at->format('H:i:s')}}</small></td>
                                        <td>
                                            <div class="btn-group-vertical" role="group">
                                                <a href="#" type="button" class="btn btn-info btn-xs"
                                                    data-toggle="modal" data-target="#modal-naik-tingkat">
                                                    <i class="fa fa-info-circle"></i>
                                                </a>
                                            </div>

                                            <div class="modal fade" id="modal-naik-tingkat" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Laporan Sisya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="/singkat/{{$listNaikTingkat->id }}/accept" method="POST">
            @CSRF
@method('patch')	
                <small>Berikut merupakan laporan hasil belajar sisya di Pasraman Pinandita Brahma Vidya Samgraha
                    Buleleng</small>
                <br>
                <table class="table table-condensed">
                    <tbody>
                        <tr>
                            <td>NAMA</td>
                            <td>:</td>
                             <td>{{$listNaikTingkat->sisya->nama_bapak}}</td>
                        </tr>
                        <tr>
                            <td>TINGKAT</td>
                            <td>:</td>
                            <td>{{$listNaikTingkat->tingkat->tingkat}}</td>
                        </tr>
                        <tr>
                            <td>ALAMAT</td>
                            <td>:</td>
                            <td>{{$listNaikTingkat->sisya->alamat}}</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <table class="table table-hover" id="tabelReport">
                    <thead>
                        <tr>
                            <th>MATA PELAJARAN</th>
                            <th>NILAI</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($listNaikTingkat->sisya->mapel as $mapel)
                        <tr>
                            <td>{{$mapel->nama}}</td>
                            <td>{{$mapel->pivot->nilai}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <small>Catatan : Sisya ini sudah memenuhi kriteria untuk naik ketingkat selanjutnya.</small>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" name="action" value="0">Tidak Setujui Naik Tingkat</button>
                <button type="submit" class="btn btn-primary" name="action" value="1">Setujui Naik Tingkat</button>
            </div>
        </div>
    </div>
    </div>
</div>
                                        </td>
                                    </tr>
                                @endforeach

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->

@stop
@section('footer')
<script>
    $(document).ready(function () {
        $('#tabelPosts').DataTable();
    }); 
</script>
<script>
    $('.delete').click(function () {
        var post_id = $(this).attr('post-id');
        swal({
            title: "Yakin?",
            text: "Mau dihapus data Post dengan ID " + post_id + " ini!?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/post/" + post_id + "/delete";

                }
            });
    });
</script>

@stop