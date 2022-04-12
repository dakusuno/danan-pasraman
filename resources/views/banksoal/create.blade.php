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
                <div class="col-md-7">
                    <div class="panel">
                        <div class="panel-heading">
                            <h2 class="panel-title">Bank Soal</h2> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="subNabe" >
                                        <form action="/banksoal/create" method="post">
                                            {{csrf_field()}}
                                           
                                            <input type="hidden" value="{{ app('request')->input('materi_id') }}" name="materi_id">
                                            <input type="hidden" value="{{ app('request')->input('mapel_id') }}" name="mapel_id">
                                            
                                            <div class="form-group">
                                                <label for="soal">Soal</label>
                                                <textarea name="pertanyaan" id="isi" class="form-control"
                                                    placeholder="Tuliskan Soal" rows="3" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi">Pilihan A</label>
                                                <textarea name="pila" id="pilihanA" class="form-control"
                                                    placeholder="Pilihan A" rows="3" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="pilihanB">Pilihan B</label>
                                                <textarea name="pilb" id="isi" class="form-control"
                                                    placeholder="pilihan B" rows="3" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="pilihanC">Pilihan C</label>
                                                <textarea name="pilc" id="isi" class="form-control"
                                                    placeholder="pilihan C" rows="3" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="pilihanD">Pilihan D</label>
                                                <textarea name="pild" id="isi" class="form-control"
                                                    placeholder="pilihan D" rows="3" required></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label name="" for="kunci" required>Kunci</label>

                                                <div class="radio">
                                                    <label><input type="radio" name="kunci" id="a" value="A" required>
                                                        Jawaban <b>A</b></label> &nbsp;&nbsp;&nbsp;
                                                    <label><input type="radio" name="kunci" id="b" value="B" required>
                                                        Jawaban <b>B</b></label> &nbsp;&nbsp;&nbsp;
                                                    <label><input type="radio" name="kunci" id="c" value="C" required>
                                                        Jawaban <b>C</b></label> &nbsp;&nbsp;&nbsp;
                                                    <label><input type="radio" name="kunci" id="d" value="D" required>
                                                        Jawaban <b>D</b></label> &nbsp;&nbsp;&nbsp;
                                                </div>
                                            </div>
                                            <div>
                                                <input type="button" class="btn btn-sm btn-danger" value="Cancel">
                                                <input type="submit" class="btn btn-sm btn-primary" value="Submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="panel">
                        <div class="panel-heading">
                            <h2 class="panel-title"><i class="fa fa-info-circle"></i> Informasi</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12" style="overflow:auto;">
                                    <p>
                                        Tulis materi sesuai yang Anda kuasai untuk dapat diakses oleh siswa Anda.
                                        Semakin banyak materi yang di publish akan memperkaya konten dari aplikasi ini
                                        dan bermanfaat untuk siswa Anda.
                                    </p> <br>
                                    <table class="table table-hover" id="tabelsoal">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>MATERI</th>
                                                <th>SOAL</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;?>
                                            @foreach($banksoal as $bg)
                                            <?php $no++ ;?>
                                            <tr>
                                                <td>{{ $no}}</td>
                                                <td>{{$bg->materi->judul}}</td>
                                                <td>{{$bg->pertanyaan}}</td>
                                                <td>
                                                <div class="btn-group-vertical" role="group">
                                                @if(auth()->user()->role == 'admin')
                                                    <a href="#" 
                                                    soal-id="{{$bg->id}}"
                                                    type="button" 
                                                    class="btn btn-danger btn-xs delete">
                                                    <i class="fa fa-trash"></i></a>
                                                            
                                                @endif
                                                    <a href="/banksoal/{{$bg->id}}/edit" type="button" class="btn btn-warning btn-xs"><i
                                                            class="fa fa-edit"></i></a>
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
@stop

@section('footer')
<script>
    $(document).ready(function () {
        $('#tabelsoal').DataTable();
    }); 
</script>

<script>
    $('.delete').click(function(){
        var banksoal_id = $(this).attr('soal-id');
        swal({
            title: "Yakin ?",
            text: "Mau dihapus data mapel dengan id "+banksoal_id+" ??",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            console.log(willDelete);
            if (willDelete) {
                window.location = "/banksoal/"+banksoal_id+"/delete";
            }
        });
    });
</script>
@stop