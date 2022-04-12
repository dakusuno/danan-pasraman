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
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <div href="#subBuku" class="pull-left" data-toggle="collapse" class="collapsed">
                                <input type="button" class="btn btn-primary" value="Tambah Buku">
                            </div> 
                            <div href="#subImport" class="pull-right" data-toggle="collapse" class="collapsed">
                                    <input type="button" class="btn btn-sm btn-success" value="Import">
                                </div> <br>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="subBuku" class="collapse ">
                                        <form action="/buku/create" method="post">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="kode">Kode Buku</label>
                                                <input name="kode" type="text" class="form-control" id="kode"
                                                    placeholder="Kode Buku">
                                            </div>
                                            <div class="form-group">
                                                <label for="judul">Judul Buku</label>
                                                <textarea name="judul" id="judul" class="form-control" placeholder="Judul Buku" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="pengarang">Pengarang</label>
                                                <input name="pengarang" type="text" class="form-control" id="pengarang"
                                                    placeholder="Pengarang Buku">
                                            </div>
                                            <div class="form-group">
                                                <label for="penerbit">Penerbit</label>
                                                <input name="penerbit" type="text" class="form-control" id="penerbit"
                                                    placeholder="Penerbit Buku">
                                            </div>
                                            <div class="form-group">
                                                <label for="tahun">Tahun</label>
                                                <input name="tahun" type="text" class="form-control" id="tahun"
                                                    placeholder="Tahun Buku">
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlah">Jumlah</label>
                                                <input name="jumlah" type="text" class="form-control" id="jumlah"
                                                    placeholder="Jumlah Buku">
                                            </div>
                                            <div>
                                                <input type="submit" class="btn btn-sm btn-success" value="Submit">
                                            </div>
                                        </form>
                                    </div> <br> <br>
                                    <div class="form-group">
                                            <h2 class="panel-title"><i class="fa fa-info-circle"></i> Informasi</h2>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>
                                                        Daftarkan seluruh kelas malalui halaman ini.
                                                        Data kelas diperlukan untuk mengelompokan siswa dan untuk mendistribusian paket
                                                        soal.
                                                    </p>
                                                    <p>
                                                        Jika terdapat data kelas yang belum valid atau kelas yang belum terdaftar,
                                                        hubungi operator sekolah untuk merubah atau mendaftarkan kelas tersebut.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    <div id="subImport" class="collapse ">
                                        IMPORT
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="panel">
                        <div class="panel-heading">
                            <h2 class="panel-title">Data Buku</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div>
                                        <table class="table table-hover" id="tabelBuku">
                                            <thead>
                                                <tr>
                                                    <th>JUDUL</th>
                                                    <th>PENERBIT</th>
                                                    <th>TAHUN</th>
                                                    <th>JUMLAH</th>
                                                    <th>AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($bukus as $buku)
                                                <tr>
                                                    <td>{{$buku->judul}}</td>
                                                    <td>{{$buku->penerbit}}</td>
                                                    <td>{{$buku->tahun}}</td>
                                                    <td>{{$buku->jumlah}}</td>
                                                    <td>
                                                        <a href="/buku/{{$buku->id}}/edit" type="button" class="btn btn-warning btn-xs"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <a href="/buku/{{$buku->id}}/delete" type="button" class="btn btn-danger btn-xs"
                                                            onclick="return confirm('Yakin mau dihapus?')"><i
                                                                class="lnr lnr-trash"></i></a>
                                                        
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
    $(document).ready( function () {
        $('#tabelBuku').DataTable();
    }); 
</script>
@stop