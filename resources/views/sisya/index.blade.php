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
                            @if(auth()->user()->role == 'admin')
                                <div class="pull-right">
                                    <!-- <a type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#exportimport">
                                        Export & Import Data
                                    </a> -->
                                    <a type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#tambahsisya">
                                        Tambah Sisya
                                    </a>
                                </div>
                            @endif
                            <br>
                            <p class="text-muted font-13 m-b-30">
                                Data dibawah merupakan tampilan data sisya yang terdaftar pada Pasraman Pinandita Vidya
                                Samgraha Buleleng
                            </p>
                        </div>
                        <div class="panel-body" style="overflow:auto;">
                        @php $no = 1; @endphp
                            <table class="table table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA BAPAK</th>
                                        <!-- <th>NAMA IBU</th> -->
                                        <th>ALAMAT</th>
                                        <th>TINGKAT</th>
                                        <th>TOTAL NILAI</th>
                                        <!-- <th>STATUS</th> -->
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_sisya as $sisya)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$sisya->nama_bapak}}</td>
                                        <!-- <td>{{$sisya->nama_ibu}}</td> -->
                                        <td>{{$sisya->alamat}}</td>
                                        <td>{{$sisya->tingkat}}</td>
                                        <td>{{$sisya->totalNilai()}}</td>
                                        <!-- <td>Aktif</td> -->
                                        <td>
                                        <div class="btn-group-vertical" role="group">
                                        @if(auth()->user()->role == 'admin')
                                        <a href="/sisya/{{$sisya->id}}/edit"
                                                class="btn btn-warning btn-sm "><i class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm delete "
                                                sisya-id="{{$sisya->id}}"><i class="lnr lnr-trash"></i></a> 
                                                @endif
                                            <a href="/sisya/{{$sisya->id}}/profile"
                                                class="btn btn-info btn-sm "><i class="fa fa-info-circle"></i></a>
                                        </div>
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Modal Export Import -->
                   
                    <!-- Modal Tambah Manual -->
                    <div class="modal fade bd-example-modal-lg" id="tambahsisya" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <label class="modal-title" id="tambahsisya" >Tambah Data Sisya</label>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div  class="modal-body">
                                    <form action="/sisya/create" method="POST">
                                        {{csrf_field()}}
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <label> Biodata Lanang</label>
                                                <div
                                                    class="form-group {{$errors->has('nama_bapak') ? ' has-error' : ''}}">
                                                    <input name="nama_bapak" type="text" class="form-control"
                                                        id="nama_bapak" placeholder="Nama Lengkap"
                                                        value="{{old('nama_bapak')}}">
                                                    @if($errors->has('nama_bapak'))
                                                    <span class="help-block">{{$errors->first('nama_bapak')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div
                                                class=" form-group col-md-6 {{$errors->has('nik_bapak') ? ' has-error' : ''}}">
                                                <input name="nik_bapak" type="text" class="form-control" id="nik_bapak"
                                                    placeholder="Nomor Induk Kependudukan" value="{{old('nik_bapak')}}">
                                                @if($errors->has('nik_bapak'))
                                                <span class="help-block">{{$errors->first('nik_bapak')}}</span>
                                                @endif
                                            </div>
                                            <div
                                                class=" form-group col-md-6 {{$errors->has('pekerjaan_bapak') ? ' has-error' : ''}}">
                                                <input name="pekerjaan_bapak" type="text" class="form-control"
                                                    id="pekerjaan_bapak" placeholder="Pekerjaan"
                                                    value="{{old('pekerjaan_bapak')}}">
                                                @if($errors->has('pekerjaan_bapak'))
                                                <span class="help-block">{{$errors->first('pekerjaan_bapak')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <label> Biodata Istri</label>
                                                <div
                                                    class="form-group {{$errors->has('nama_ibu') ? ' has-error' : ''}}">
                                                    <input name="nama_ibu" type="text" class="form-control"
                                                        id="nama_ibu" placeholder="Nama Lengkap"
                                                        value="{{old('nama_ibu')}}">
                                                    @if($errors->has('nama_ibu'))
                                                    <span class="help-block">{{$errors->first('nama_ibu')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div
                                                class="form-group col-md-6{{$errors->has('nik_ibu') ? ' has-error' : ''}}">
                                                <input name="nik_ibu" type="text" class="form-control" id="nik_ibu"
                                                    placeholder="NIK" value="{{old('nik_ibu')}}">
                                                @if($errors->has('nik_ibu'))
                                                <span class="help-block">{{$errors->first('nik_ibu')}}</span>
                                                @endif
                                            </div>
                                            <div
                                                class="form-group col-md-6 {{$errors->has('pekerjaan_ibu') ? ' has-error' : ''}}">
                                                <input name="pekerjaan_ibu" type="text" class="form-control"
                                                    id="pekerjaan_ibu" placeholder="Pekerjaan"
                                                    value="{{old('nik_bapak')}}">
                                                @if($errors->has('pekerjaan_ibu'))
                                                <span class="help-block">{{$errors->first('pekerjaan_ibu')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <div class="form-row {{$errors->has('alamat') ? ' has-error' : ''}}">
                                                    <br>

                                                    <label for="alamat">Alamat Tinggal</label>
                                                    <input name="alamat" type="textara" class="form-control"
                                                        id="inputAddress" placeholder="Alamat Tinggal"
                                                       value="{{old('alamat')}}"> <br>
                                                    @if($errors->has('alamat'))
                                                    <span class="help-block">{{$errors->first('alamat')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div
                                                class="form-group col-md-6 {{$errors->has('kabupaten') ? ' has-error' : ''}}">
                                                <label for="kabupaten">Kabupaten</label>
                                                <input name="kabupaten" type="text" class="form-control" id="kabupaten"
                                                    placeholder="Kabupaten" value="{{old('kabupaten')}}">
                                                @if($errors->has('kabupaten'))
                                                <span class="help-block">{{$errors->first('kabupaten')}}</span>
                                                @endif
                                            </div>
                                            <div
                                                class="form-group col-md-6 {{$errors->has('provinsi') ? ' has-error' : ''}}">
                                                <label for="provinsi">Provinsi</label>
                                                <input name="provinsi" type="text" class="form-control" id="provinsi"
                                                    placeholder="Provinsi" value="{{old('provinsi')}}">
                                                @if($errors->has('provinsi'))
                                                <span class="help-block">{{$errors->first('provinsi')}}</span>
                                                @endif
                                            </div>
                                            <div
                                                class="form-group col-md-6 {{$errors->has('tingkat') ? ' has-error' : ''}}">
                                                <label for="tingkat">Tingkat Kepinanditaan</label>
                                                <select name="tingkat" id="tingkat" class="form-control">
                                                    <option selected disabled>Tingkat Kepinanditaan</option>
                                                    @foreach($data_tingkat as $tingkat)
                                                        <option value="{{$tingkat->tingkat}}" {{old($tingkat->tingkat) == $tingkat->tingkat ? 'selected' : '' }}>{{$tingkat->tingkat}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('tingkat'))
                                                <span class="help-block">{{$errors->first('tingkat')}}</span>
                                                @endif
                                            </div>
                                            <!-- <div
                                                class="form-group col-md-6 {{$errors->has('avatar') ? ' has-error' : ''}}">
                                                <label for="avatar">Avatar</label>
                                                <input name="avatar" type="file" class="form-control" id="inputAvatar"
                                                    placeholder="Masukan foto sebagai tanda pengenal"
                                                    value="{{old('avatar')}}">
                                                @if($errors->has('avatar'))
                                                <span class="help-block">{{$errors->first('avatar')}}</span>
                                                @endif
                                            </div> -->
                                        </div>
                                        <div class="col-md-6">
                                            <div
                                                class="form-group col-md-6{{$errors->has('username') ? ' has-error' : ''}}">
                                                <br>

                                                <label for="username">Username</label>
                                                <input name="username" type="text" class="form-control" id="inputUsername"
                                                    placeholder="Masukan username agar dapat melakukan login"
                                                    value="{{old('username')}}">
                                                @if($errors->has('username '))
                                                <span class="help-block">{{$errors->first('username')}}</span>
                                                @endif
                                            </div>
                                            <div
                                                class="form-group col-md-6 {{$errors->has('nohp_bapak') ? ' has-error' : ''}}">
                                                <br>
                                                <label for="nohp_bapak">Nomor Telpon</label>
                                                <input name="nohp_bapak" type="text" class="form-control"
                                                    id="nohp_bapak" placeholder="Nomor yang bisa dihubungi"
                                                    value="{{old('nohp_bapak')}}">
                                                @if($errors->has('nohp_bapak'))
                                                <span class="help-block">{{$errors->first('nohp_bapak')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                </div >
                                <div class="modal-footer">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-block">DAFTAR</button>
                                    </div>
                                </div>
                                </form>
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
        $('#datatable').DataTable();
    });
</script>
<script>
    $('.delete').click(function(){
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