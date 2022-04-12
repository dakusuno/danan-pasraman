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
                <div class="col-md-8">
                    <div class="panel">
                        <div class="panel-heading">
                            <h2 class="panel-title">Detail Kelas</h2>
                           
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <br>
                                    <div style="overflow:auto;">
                                        <form action="{!! route('kelas.storedetailkelas', $data_kelas->id) !!}" method="post">
                                            @csrf
                                            <table class="table table-hover" id="tabelKelas">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>NAMA</th>
                                                        <th>ALAMAT</th>
                                                        <th>TINGKAT</th>
                                                        <th>AKSI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($data_sisya as $sisya)
                                                    <tr>
                                                        <td>{{$sisya->id}}</td>
                                                        <td>{{$sisya->nama_bapak}}</td>
                                                        <td>{{$sisya->alamat}}</td>
                                                        <td>{{$sisya->tingkat}}</td>
                                                        <td>
                                                            <input data-id="{{$sisya->id}}" type="checkbox"
                                                            name="sisya[{{$sisya->id}}]" data-toggle="toggle"
                                                            data-size="small"
                                                            value="{{$sisya->id}}"
                                                            data-on="Tampil" data-onstyle="success"
                                                            data-off="Tidak Tampil" data-offstyle="danger">
                                                          </td>
                                                    </tr>
                                                    @endforeach
                                                    </tr>
                                                </tbody>
                                            </table>
                                       
                                    </div>
                                    @if(auth()->user()->role == 'admin')
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    @endif
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h2 class="panel-title">Informasi</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                <p>
                                        Daftarkan seluruh kelas malalui halaman ini.
                                        Data kelas diperlukan untuk mengelompokan sisya dan untuk melakukan pembelajaran
                                        hingga mendistribusian paket soal.
                                    </p>
                                    <p>
                                        Jika terdapat data kelas yang belum valid atau kelas yang belum terdaftar,
                                        hubungi admin untuk merubah atau mendaftarkan kelas tersebut.
                                    </p>
                                    <table class="table table-hover" id="tabelKelas">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>NAMA</th>
                                                        @if(auth()->user()->role == 'admin')
                                                        <th>AKSI</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($detailkelas as $dl)
                                                    <tr>
                                                        <td>{{$dl->id}}</td>
                                                        <td>{{$dl->sisya->nama_bapak}}</td>
                                                        @if(auth()->user()->role == 'admin')
                                                        <td>
                                                        <a  href="#" type="button" class="btn btn-danger btn-xs delete" 
                                                            detailkelas-id="{{$dl->id}}"><i class="lnr lnr-trash"></i></a>
                                                        </td>
                                                        @endif
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

@stop

@section('footer')
<script>
    $(document).ready(function () {
        $('#tabelKelas').DataTable();
    }); 
</script>
<script>
    $('.delete').click(function(){
        var detailkelas_id = $(this).attr('detailkelas-id');
        swal({
            title: "Yakin ?",
            text: "Mau dihapus data kelas dengan id "+detailkelas_id+" ??",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            console.log(willDelete);
            if (willDelete) {
                window.location = "/kelas/"+detailkelas_id+"/deletesisya";
            }
        });
    });
</script>
@stop