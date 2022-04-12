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
                            <h2 class="panel-title">Daftar Materi</h2>
                            <div href="#subNabe" class="pull-right" data-toggle="collapse" class="collapsed">
                                <input type="button" class="btn btn-primary" value="Tulis Materi">
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="subNabe" class="collapse ">
                                        <form action="materi/create" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                            <div class="form-group {{$errors->has('mapel_id') ? ' has-error' : ''}}">
                                                <label for="mapel">Mata Pelajaran</label>
                                                <select name="mapel_id"class="form-control">
                                                    <option selected disabled>Pilih Mata Pelajaran</option>
                                                    @foreach($data_mapel as $mapel)
                                                        <option value="{{$mapel->id}}" {{old($mapel->id) == $mapel->mapel_id ? 'selected' : '' }}>{{$mapel->nama}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('mapel_id'))
                                                <span class="help-block">{{$errors->first('mapel_id')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group {{$errors->has('judul') ? ' has-error' : ''}}">
                                                <label for="judul">Nama Materi</label>
                                                <input name="judul" type="text" class="form-control" id="judul"
                                                    placeholder="Nama Materi" value="{{old('judul')}}">
                                                @if($errors->has('judul'))
                                                <span class="help-block">{{$errors->first('judul')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group {{$errors->has('isi') ? ' has-error' : ''}}">
                                                <label for="isi">Isi</label>
                                                <textarea name="isi" id="isi" class="form-control" placeholder="Tuliskan Materi" rows="5">{{old('isi')}}</textarea>
                                                @if($errors->has('isi'))
                                                <span class="help-block">{{$errors->first('isi')}}</span>
                                                @endif
                                            </div>
                                            <!-- <div class="form-group {{$errors->has('status') ? ' has-error' : ''}}">
                                                <label for="status">Status</label>
                                                    <select name="status" id="status" class="form-control">
                                                    <option selected disabled>Pilih Status</option>
                                                        <option value="Tidak Tampil" {{(old('status') == 'Tidak Tampil') ? ' selected' : ''}}>Tidak Tampil</option>
                                                        <option value="Tampil" {{(old('status') == 'Tampil') ? ' selected' : ''}}>Tampil</option>
                                                    </select>
                                                @if($errors->has('status'))
                                                <span class="help-block">{{$errors->first('status')}}</span>
                                                @endif
                                            </div> -->
                                            <!-- <div class="form-group">
                                            <label for="gambar">Gambar</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="lfm" data-input="gambar" data-preview="holder"
                                                            class="btn btn-primary">
                                                            <i class="fa fa-picture-o"></i> Choose
                                                        </a>
                                                    </span>
                                                    <input type="text" class="form-control" name="filepath" id="gambar">
                                                </div>
                                            </div> -->
                                            <div class="form-group {{$errors->has('file') ? ' has-error' : ''}}">
                                            <label for="upload">Upload Video</label>
                                                <input type="file" class="form-control" name="file" id="file"
                                                placeholder="file" style="background-color: #f5f8fa;">
                                                @if($errors->has('file'))
                                                <span class="help-block">{{$errors->first('file')}}</span>
                                                @endif
                                            </div>
                                            <div>
                                                <input type="button" class="btn btn-sm btn-danger" value="Cancel">
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
                                                    <th>MATAPELAJARAN</th>
                                                    <th>NAMA MATERI</th>
                                                    <th>STATUS</th>
                                                    <th>DIBACA</th>
                                                    <th>AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($materis as $materi)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td>{{$materi->mapel->nama}}</td>
                                                    <td>{{$materi->judul}}</td>
                                                    <td>{{$materi->status}}</td>
                                                    <td>{{views($materi)->count()}} Views</td>
                                                    <td>
                                                    <div class="btn-group-vertical" role="group">
                                                    <a href="/materi/{{$materi->id}}/edit" type="button" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                                    @if(auth()->user()->role == 'admin')
                                                        <a href="#" type="button" class="btn btn-danger btn-xs delete" materi-id="{{$materi->id}}"><i class="lnr lnr-trash"></i></a>
                                                        @endif
                                                        <a href="/materi/{{$materi->id}}/show" type="button" class="btn btn-info btn-xs"><i class="fa fa-info-circle"></i></a>
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
                                        Tulis materi sesuai yang Anda kuasai untuk dapat diakses oleh siswa Anda. 
                                        Semakin banyak materi yang di publish akan memperkaya konten dari aplikasi ini dan bermanfaat untuk siswa Anda.
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
        $(document).ready( function () {
            $('#tabelMateri').DataTable();
        }); 
    </script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector('#isi'))
            .catch( error => {
                console.error(error);
            });

            $(document).ready(function(){
                $('#lfm').filemanager('file');
            });
    </script>

    <script>
    $('.delete').click(function(){
        var mater_id = $(this).attr('materi-id');
        swal({
            title: "Yakin ?",
            text: "Mau dihapus data materi dengan id "+mater_id+" ??",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            console.log(willDelete);
            if (willDelete) {
                window.location = "/materi/"+mater_id+"/delete";
            }
        });
    });
</script>
@stop

