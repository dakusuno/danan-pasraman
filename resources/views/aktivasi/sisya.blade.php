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
                            <h2 class="panel-title">Data Sisya</h2>

                            <br>
                            <p class="text-muted font-13 m-b-30">
                                Data dibawah merupakan tampilan data sisya yang terdaftar pada Pasraman Pinandita Vidya
                                Samgraha Buleleng akan tetapi akun <strong>Belum Aktif.</strong>
                            </p>
                        </div>
                        <div class="panel-body" style="overflow:auto;">
                        @php $no = 1; @endphp
                            <table class="table table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>ALAMAT</th>
                                        <th>AKSI</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_sisya as $sisya)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$sisya->nama_bapak}}</td>
                                        <td>{{$sisya->alamat}}</td>
                                        <td>
                                            <a href="/sisya/{{$sisya->id}}/edit" type="button" class="btn btn-primary btn-xs"><i
                                                class="fa fa-info-circle"></i>
                                            </a>
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

@stop
@section('footer')
<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>
<script>
    $('.delete').click(function () {
        var sisya_id = $(this).attr('sisya-id');
        swal({
            title: "Yakin?",
            text: "Mau dihapus data Sisya dengan ID " + sisya_id + " ini!?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/sisya/" + sisya_id + "/delete";
                }
            });
    });
</script>
@stop