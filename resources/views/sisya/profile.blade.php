@extends('layouts.master')

@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop
@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
				@if(session('sukses'))
					
				@endif
				@if(session('error'))
					
				@endif
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{$sisya->getAvatar()}}" class="img-circle" 
										alt="Avatar">
										<h3 class="name">{{$sisya->nama_bapak}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
									<div class="row">
											<div class="col-md-6 stat-item">
												{{$sisya->mapel->count()}} <span>Mata Pelajaran</span>
											</div>
											<div class="col-md-6 stat-item">
												{{$sisya->totalNilai()}} <span>Total Nilai</span>
											</div>
											
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Basic info</h4>
										<ul class="list-unstyled list-justify">
											<li>Alamat <span>{{$sisya->alamat}}</span></li>
											<li>No. HP <span>{{$sisya->nohp_bapak}}</span></li>
											<li>Username <span>{{$sisya->user->username}}</span></li>
											<li>Tingkat <span>{{$sisya->tingkat}}</span></li>
										
										</ul>
									</div>
									@if(auth()->user()->role == 'admin')
									<div class="text-center"><a href="/sisya/{{$sisya->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
									@endif
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right"> 
								<h4 class="heading">Report Sisya</h4>
								<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Mata Pelajaran</h3>
									@if(auth()->user()->role == 'admin'|| auth()->user()->role =='pengunjung') 
									<div class="text-right">
										<div class="btn-group" role="group">
										@if($tingkat_selanjutnya != null)
											<a class="btn btn-success" href="#" 
											title="Naik Tingkat" data-toggle="modal" data-target="#naiktingkat"
											><span>Naik Tingkat</span></a>
											@endif
											<a class="btn btn-primary" href="#" 
											title="Tambah Nilai" data-toggle="modal" data-target="#exampleModal"
											><span>Tambah Nilai</span></a>

										</div>
									</div>
									@endif
								</div>
								<div class="panel-body" style="overflow:auto;">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>KODE</th>
												<th>NAMA</th>
												<th>NILAI</th>
												<th>NABE</th>
												@if(auth()->user()->role == 'admin') 
												<th>AKSI</th>
												@endif
											</tr>
										</thead>
										<tbody>
										@foreach($sisya->mapel as $mapel)
										<tr>
											<td>{{$mapel->kode}}</td>
											<td>{{$mapel->nama}}</td>
											
											<td>
												<a href="#" class="nilai" data-type="text" data-pk="{{$mapel->id}}" 
												data-url="/sisya/{{$sisya->id}}/editnilai"
												data-title="Masukan Nilai">{{$mapel->pivot->nilai}}</a>
											</td>
											<td>{{$mapel->nabe->nama}}</td>
											@if(auth()->user()->role == 'admin')
											<td>
												<a href="#" class="btn btn-danger btn-sm delete" 
												delete-nilai="{{$sisya->id}}/{{$mapel->id}}"
											>Delete</a>
											</td>
											
											@endif
										</tr>
										@endforeach
										</tbody>
									</table>
								</div>
							</div>
							<div class="pannel">
								<div id="chartNilai">
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>

		<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<form action="/sisya/{{$sisya->id}}/addnilai" method="POST">
                    {{csrf_field()}}
					<div class="form-group">
						<label for="mapel">Mata Pelajaran</label>
						<select class="form-control" id="mapel" name="mapel">
						@foreach ($matapelajaran as $mp)
							<option value="{{$mp->id}}">{{$mp->nama}}</option>
						@endforeach 
						</select>
					</div>
					<div>
                        <label for="nilai">Nilai</label>
                        <input name="nilai" type="text" class="form-control" id="nilai" placeholder="Nilai"
                        value="{{old('nilai')}}" required>
					</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
		</form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="naiktingkat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Naik Tingkat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  @if($tingkat_selanjutnya != null)
	  	<form action="/sisya/naiktingkat" method="POST">
		  {{csrf_field()}}
		  <input type="hidden" value="{{$sisya->id}}" name="id"/>
		  <input type="hidden" value="{{$tingkat_selanjutnya->id}}" name="tingkat_id"/>
            <div class="form-group">
				<small>Isikan form pengajuan naik tingkat jika anda ingin melakukan proses naik tingkat.</small>
				<table class="table table-condensed">
                    <tbody>
                        <tr>
                            <td>NAMA</td>
                            <td>:</td>
                            <td>{{$sisya->nama_bapak}}</td>
                        </tr>
                        <tr>
                            <td>TINGKAT</td>
                            <td>:</td>
                            <td>{{$tingkat->tingkat}}</td>
                        </tr>
                        <tr>
                            <td>ALAMAT</td>
                            <td>:</td>
                            <td>{{$sisya->alamat}}</td>
						</tr>
						<tr>
							<td>NAIK Ke</td>
							<td>:</td>
							<td>
							{{$tingkat_selanjutnya->tingkat}}
							</td>
						</tr>
                    </tbody>
                </table>
				
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		@if(auth()->user()->role == 'admin')
        <button type="submit" class="btn btn-primary">Submit</button>
		@endif
		</form>
		@endif
      </div>
    </div>
  </div>
</div>
@stop

@section('footer')

<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chartNilai', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Nilai Sisya'
    },
    
    xAxis: {
        categories: {!!json_encode($categories)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Nilai'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Nilai',
        data: {!!json_encode($data)!!}
    }]
});
</script>
<script>
//x-editable
$(document).ready(function() {
    $('.nilai').editable();
});
</script>
<script>
    $('.delete').click(function(){
        var sisya_id= $(this).attr('delte');
        swal({
            title: "Yakin?",
            text: "Mau dihapus data nilai ini!?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/";
                }
            });
    });
</script>
@stop