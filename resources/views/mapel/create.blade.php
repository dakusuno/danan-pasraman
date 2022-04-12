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
                            <h2 class="panel-title">Daftar Mata Pelajaran</h2>
                           
                            <div class="pull-right">
                                <a href="{{route('mapel.add')}}" class="btn btn-sm  btn-primary">
                                    <span>Tambah Mata Pelajaran</span>
                                </a>
                            </div>
                            
                            <!-- <div href="#subNabe" class="pull-right" data-toggle="collapse" class="collapsed">
                                <br>
                                <input type="button" class="btn btn-primary" value="Buat Mata Pelajaran">
                            </div> -->
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="subNabe" class="collapse ">
                                        <form action="{{route('mapel.create')}}" method="POST" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <br>
                                            <div class="form-group {{$errors->has('kode') ? ' has-error' : ''}}">
                                                <label for="kode">Kode</label>
                                                <input name="kode" type="text" class="form-control" id="kode"
                                                    placeholder="Kode Mata Pelajaran" value="{{old('kode')}}" required>
                                               
                                            </div>
                                            <div class="form-group {{$errors->has('nama') ? ' has-error' : ''}}">
                                                <label for="nama">Nama</label>
                                                <input name="nama" type="text" class="form-control" id="nama"
                                                    placeholder="Nama Mata Pelajaran" value="{{old('nama')}}" required>
                                                
                                            </div>
                                            <div class="form-group {{$errors->has('deskripsi') ? ' has-error' : ''}}">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea name="deskripsi" id="deskripsi" class="form-control"
                                                    placeholder="Tuliskan Materi" rows="5"
                                                    required>{{old('deskripsi')}}</textarea>
                                              
                                            </div>
                                            <div class="form-group {{$errors->has('tingkat_id') ? ' has-error' : ''}}">
                                                <label for="tingkat`">Tingkat</label>
                                                <select name="tingkat_id" class="form-control">
                                                    <option selected disabled>Pilih Tingkat</option>
                                                    @foreach($tingkat as $tk)
                                                    <option required value="{{$tk->id}}"
                                                        {{old($tk->id) == $tk->tk_id ? 'selected' : '' }}>
                                                        {{$tk->tingkat}}</option>
                                                    @endforeach
                                                </select>
                                                
                                            </div>
                                            <div class="form-group {{$errors->has('nabe_id') ? ' has-error' : ''}}">
                                                <label for="nabe">Nabe</label>
                                                <select name="nabe_id" class="form-control">
                                                    <option selected disabled>Pilih Nabe</option>
                                                    @foreach($data_nabe as $nabe)
                                                    <option required value="{{$nabe->id}}"
                                                        {{old($nabe->id) == $nabe->nabe_id ? 'selected' : '' }}>
                                                        {{$nabe->nama}}</option>
                                                    @endforeach
                                                </select>
                                                
                                            </div>
                                            <div>
                                                <input type="submit" class="btn btn-sm btn-primary" value="Submit">
                                            </div>
                                        </form>
                                    </div> <br> <br>
                                    <div style="overflow:auto;">
                                    @php $no = 1; @endphp
                                        <table class="table table-hover" id="tabelMateri">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>KODE</th>
                                                    <th>TINGKAT</th>
                                                    <th>NAMA</th>
                                                    <th>NABE</th>
                                                    <th>AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($mapel as $mp)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td>{{$mp->kode}}</td>
                                                    <td>{{$mp->tingkat->tingkat }}</td>
                                                    <td>{{$mp->nama}}</td>
                                                    <td>{{$mp->nabe->nama}}</td>
                                                    <td>
                                                        <div class="btn-group-vertical" role="group">
                                                            <a href="/mapel/{{$mp->id}}/edit" type="button"
                                                                class="btn btn-warning btn-xs"><i
                                                                    class="fa fa-pencil"></i></a>
                                                            @if(auth()->user()->role == 'admin')
                                                            <a href="#" type="button"
                                                                class="btn btn-danger btn-xs delete" mapel-id="{{$mp->id}}"><i
                                                                    class="lnr lnr-trash"></i></a>
                                                            @endif
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
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h2 class="panel-title">Informasi</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>
                                        Tulis Mata Pelajaran sesuai dengan pedoman pasraman untuk dapat diakses oleh
                                        sisya.
                                        Semakin banyak pelajaran yang dipublish akan memperkaya konten
                                        pembelajaran dari apilkasi ini dan bermanfaat untuk para sisya.
                                    </p>
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
        $('#tabelMateri').DataTable();
    }); 
</script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi'))
        .catch(error => {
            console.error(error);
        });

    $(document).ready(function () {
        $('#lfm').filemanager('image');
    });
</script>

<script>
    $('.delete').click(function(){
        var mapel_id = $(this).attr('mapel-id');
        swal({
            title: "Yakin ?",
            text: "Mau dihapus data mapel dengan id "+mapel_id+" ??",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            console.log(willDelete);
            if (willDelete) {
                window.location = "/mapel/"+mapel_id+"/delete";
            }
        });
    });
</script>
@stop