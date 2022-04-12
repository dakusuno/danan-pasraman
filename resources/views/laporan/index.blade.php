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
                            <h2 class="panel-title">Laporan Hasil Belajar Seluruh Sisya</h2>
                            <br>
                            <p class="text-muted font-13 m-b-30">
                                Halaman ini merupakan halaman yang menampilkan hasil belajar seluruh sisya Pasraman Pinandita Brahama Vidya Samgraha.
                            </p>
                        </div>
                        <div class="panel-body" style="overflow-x:auto;">
                            <table class="table table-hover" id="tabelPosts">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NAMA</th>
                                        <th>TINGKAT</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data_sisya as $sisya)
                                    <tr>
                                   
                                        <td>{{$sisya->id}}</td>
                                        <td>{{$sisya->nama_bapak}}</td>
                                        <td>{{$sisya->tingkat}}</td>
                                        
                                        <td>
                                            <!-- <div class="btn-group-vertical" role="group">
                                                <a id="detail" type="button" class="btn btn-info btn-xs"
                                                data-toggle="modal" data-target=".detailsisya"
                                                data-namabapak="<?=$sisya->nama_bapak?>"
                                                data-nikbapak="<?=$sisya->nik_bapak?>"
                                                data-pekerjaanbapak="<?=$sisya->pekerjaan_bapak?>"
                                                data-nohpbapak="<?=$sisya->nohp_bapak?>"
                                                data-alamat="<?=$sisya->alamat?>"
                                                data-tingkat="<?=$sisya->tingkat?>"

                                                >
                                                    <i class="fa fa-info-circle"></i>
                                                </a>
                                            </div> -->
                                            <div class="btn-group-vertical">
                                                <a href="/laporan/{{$sisya->id}}/hasil" type="button" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-info-circle"></i>
                                                </a>
                                               
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                    
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
<div class="modal fade detailsisya" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Laporan Sisya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <small>  <i class="fa fa-info-circle"></i> Informasi singkat sisya.</small>
                <br>
                <table class="table table-condensed">
                    <tbody>
                    
                        <tr>
                            <td>NAMA</td>
                            <td>:</td>
                            <td><span id="nama_bapak"></span></td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td><span id="nik_bapak"></span></td>
                        </tr>
                        <tr>
                            <td>PEKERJAAN</td>
                            <td>:</td>
                            <td><span id="pekerjaan_bapak"></span></td>
                        </tr>
                        <tr>
                            <td>NO TLP</td>
                            <td>:</td>
                            <td><span id="nohp_bapak"></span></td>
                        </tr>
                        <tr>
                            <td>ALAMAT</td>
                            <td>:</td>
                            <td><span id="alamat"></span></td>
                        </tr>
                        <tr>
                            <td>TINGKAT</td>
                            <td>:</td>
                            <td><span id="tingkat"></span></td>
                        </tr>
                    </tbody>
                </table>
                
                <small> <i class="fa fa-info-circle"></i> Berikut merupakan laporan hasil belajar sisya di Pasraman Pinandita Brahma Vidya Samgraha
                    Buleleng.</small>
                <table class="table table-hover" id="tabelReport">
                    <thead>
                        <tr>
                            <th>TINGKAT</th>
                            <th>MATA PELAJARAN</th>
                            <th>MATERI</th>
                            <th>NILAI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Jro Mangku</td>
                            <td>Kramaning Sembah</td>
                            <td>Puyung lan Sembah ring Sang Hyang Aditya</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td>Jro Mangku</td>
                            <td>Kramaning Sembah</td>
                            <td>Sembah ring Ista Dewata</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td>Jro Mangku</td>
                            <td>Kramaning Sembah</td>
                            <td>Nunas Panugrahan lang Sembah Suksma</td>
                            <td>100</td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
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
<script>
$(document).ready(function(){
    $(document).on('click', '#detail', function(){
        var namabapak = $(this).data('namabapak');
        var nikbapak = $(this).data('nikbapak');
        var pekerjaanbapak = $(this).data('pekerjaanbapak');
        var nohpbapak = $(this).data('nohpbapak');
        var alamat = $(this).data('alamat');
        var tingkat = $(this).data('tingkat');
        $('#nama_bapak').text(namabapak);
        $('#nik_bapak').text(nikbapak);
        $('#pekerjaan_bapak').text(pekerjaanbapak);
        $('#nohp_bapak').text(nohpbapak);
        $('#alamat').text(alamat);
        $('#tingkat').text(tingkat);
        $('#detail').text(detail);
        
        

    })
})
</script>

@stop