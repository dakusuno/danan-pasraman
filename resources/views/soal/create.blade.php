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
                            <h2 class="panel-title">Paket Soal</h2> <br>
                            <div href="#subNabe" class="pull-left" data-toggle="collapse" class="collapsed">
                                <input type="button" class="btn btn-primary" value="Tulis Soal">
                            </div>

                            <br>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="subNabe" class="collapse ">
                                        <form action="/soal/create" method="post">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="jenis">Jenis</label>
                                                <select name="jenis" class="form-control" placeholder="Pilih Jenis Soal"
                                                    required>
                                                    <option value="0">Soal Ulangan</option>
                                                    <option value="1">Soal Ujian</option>

                                                </select>


                                            </div>
                                            <div class="form-group" id="materi">
                                                <label for="materi">Materi</label>
                                                <select name="materi_id" class="form-control"
                                                    placeholder="Pilih Jenis Materi" required>
                                                    @foreach($materis as $materi)
                                                    <option value="{{$materi->id}}">{{$materi->judul}}</option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            <div class="form-group" id="mapel" hidden>
                                                <label for="mapel">Mapel</label>
                                                <select name="mapel_id" class="form-control"
                                                    placeholder="Pilih Jenis Mapel" required>
                                                    @foreach($mapels as $mapel)
                                                    <option value="{{$mapel->id}}">{{$mapel->nama}}</option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            <!-- <div class="form-group">
                                                <label for="paket">Paket</label>
                                                <input name="paket" class="form-control" placeholder="Nama Paket" id="paket">
                                            </div> -->
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea name="deskripsi" class="form-control" placeholder="Deskripsi"
                                                    rows="3" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="kkm">KKM</label>
                                                <input name="kkm" class="form-control" placeholder="KKM" id="kkm"
                                                    required>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label for="waktu">Waktu</label> <small>dalam satuan menit</small>
                                                <input name="waktu" class="form-control" placeholder="Waktu pekerjaan dalam satuan menit" id="waktu">
                                            </div> -->
                                            <!-- <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" class="form-control" placeholder="Pilih Jenis Status">
                                                    <option value="Tidak Tampil">Tidak Tampil</option>
                                                    <option value="Tampil">Tampil</option>
                                                </select>
                                            </div>
                                             -->
                                            <div>
                                                <input type="button" class="btn btn-sm btn-danger" value="Cancel">
                                                <input type="submit" class="btn btn-sm btn-primary" value="Submit">
                                            </div>
                                        </form>
                                    </div>


                                    <br> <br>
                                    <div style="overflow:auto;"> @php $no = 1; @endphp
                                        <table class="table table-hover" id="tabelSoal">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>JENIS</th>
                                                    <th>DESKRIPSI</th>
                                                    <th>KKM</th>
                                                    <th>AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($soals as $soal)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td>
                                                        @if($soal->jenis == 0)
                                                        Soal Ulangan

                                                        @else
                                                        Soal Ujian
                                                        @endif

                                                    </td>
                                                    <td>{{$soal->deskripsi}}</td>
                                                    <td>{{$soal->kkm}}</td>

                                                    <td>
                                                        <div class="btn-group-vertical" role="group">
                                                            <a href="/soal/{{$soal->id}}/edit" type="button"
                                                                class="btn btn-warning btn-xs"><i
                                                                    class="fa fa-pencil"></i></a>
                                                            @if(auth()->user()->role == 'admin')
                                                            <a href="#" type="button"
                                                                class="btn btn-danger btn-xs delete"
                                                                soal-id="{{$soal->id}}"><i
                                                                    class="lnr lnr-trash"></i></a>
                                                            @endif
                                                            <a href="/soal/{{$soal->id}}" type="button"
                                                                class="btn btn-info btn-xs"><i
                                                                    class="fa fa-info-circle"></i></a>
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
        </div>
    </div>
</div>
@stop
@section('footer')
<script>
    $('select[name="jenis"]').change(function () {
        if ($(this).val() == '1') {
            $('#materi').slideUp();
            $('#mapel').show();
        } else {
            $('#materi').show();
            $('#mapel').slideUp();
        }

    });

    $(document).ready(function () {
        $('#tabelSoal').DataTable();
    }); 
    $(document).ready(function () {
        $('#tabelSoal2').DataTable();
    }); 
</script>
<script>
    $('.delete').click(function () {
        var soal_id = $(this).attr('soal-id');
        swal({
            title: "Yakin ?",
            text: "Mau dihapus data soal dengan id " + soal_id + " ??",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/soal/" + soal_id + "/delete";
                }
            });
    });
</script>s
@stop