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
                    <!-- PANEL DEFAULT -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Bank Soal</h3>
                            <div class="pull-right">
                                <a type="button" class="btn btn-primary" id="modalButton" data-toggle="modal"
                                    data-target="#exampleModalCenter">
                                    Masukan Soal
                                </a>
                            </div>
                        </div>
                        <div class="panel-body" style="display: block;">
                            <table class="table table-hover" id="tabelSoal">
                                <thead>
                                    <tr>
                                        
                                       
                                        <th>MATERI</th>
                                        <th>JUMLAH</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($banksoal as $bgsoal)
                                    <?php
                                        $banksoalCount = DB::table('banksoal')
                                            ->select(DB::raw('count(*) as total'))
                                            ->where('materi_id', '=', $bgsoal->materi_id)
                                            ->groupBy('materi_id')
                                            ->first();
                                    ?>
                                    <tr>
                                        
                                       
                                        <td>{{$bgsoal->materi->judul}}</td>
                                        <td>{{$banksoalCount->total}} Soal</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END PANEL DEFAULT -->
                </div>
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h2 class="panel-title"><i class="fa fa-info-circle"></i> Informasi</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>
                                        Tulis materi sesuai yang Anda kuasai untuk dapat diakses oleh siswa Anda.
                                        Semakin banyak materi yang di publish akan memperkaya konten dari aplikasi ini
                                        dan bermanfaat untuk siswa Anda.
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

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Masukan Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form action="/banksoal/show" method="get">
                        <label for="mapel">Mata Pelajaran</label>
                        <select name="mapel_id" id="mapel" class="form-control" placeholder="Pilih Mata Pelajarani" required>
                            <option value="" disabled>Pilih Mapel</option>
                            @foreach($mapels as $mapel)
                            <option value="{{$mapel->id}}">{{$mapel->nama}}</option>
                            @endforeach
                        </select>
                        <label for="materi">Materi</label>
                        <select name="materi_id" id="materi" class="form-control" placeholder="Pilih Jenis Materi" required>
                            <option value="" disabled>Pilih Materi</option>
                        
                        </select>
                        <small> <i class="fa fa-info-circle"></i> Materi dan Mata Pelajaran ditentukan terlebih dahulu sebelum banksoal
                            dibuat.</small>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Lanjut Membuat . . .</button>
            </form>
            </div>
        </div>
    </div>
</div>

@stop
@section('footer')
<script>
  $(document).ready( function () {
    var id = $(this).val();

$('#materi').find('option').not(':first').remove();

 
 
$.ajax({
  url: 'banksoal/' + id + '/requestMateri/',
  type: 'GET',
  dataType: 'json',
  success: function(response){
    var len = 0;
    if(response['data'] != null){
      len = response['data'].length;
    }

    if(len > 0){
      // Read data and create <option >
      for(var i=0; i<len; i++){

        var id = response['data'][i].id;
        var judul = response['data'][i].judul;

        var option = "<option value='"+id+"'>"+judul+"</option>"; 

        $("#materi").append(option); 
      }
    }

  }
});
    }); 

    
  $('#modalButton').click(function(){
    $('#mapel').val($('#mapel option:first').val());
    $('#materi').val($('#materi option:first').val());
  });

  $('#mapel').change(function(){
     var id = $(this).val();

     $('#materi').find('option').not(':first').remove();

      
      
$.ajax({
       url: 'banksoal/' + id + '/requestMateri/',
       type: 'GET',
       dataType: 'json',
       success: function(response){
         var len = 0;
         if(response['data'] != null){
           len = response['data'].length;
         }

         if(len > 0){
           // Read data and create <option >
           for(var i=0; i<len; i++){

             var id = response['data'][i].id;
             var judul = response['data'][i].judul;

             var option = "<option value='"+id+"'>"+judul+"</option>"; 

             $("#materi").append(option); 
           }
         }

       }
    });
    
  });


</script>
<script>
    $('.delete').click(function(){
        var banksoal_id = $(this).attr('banksoal-id');
        swal({
            title: "Yakin ?",
            text: "Mau dihapus data bank soal dengan id "+banksoal_id+" ??",
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
