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
										<img src="{{$data_sisya->getAvatar()}}" class="img-circle" 
										alt="Avatar">
										<h3 class="name">{{$data_sisya->nama_bapak}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												{{$data_sisya->mapel->count()}} <span>Mata Pelajaran</span>
											</div>
											<div class="col-md-4 stat-item">
												{{$data_sisya->totalNilai()}} <span>Total Nilai</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Points</span>
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
											<li>Alamat <span>{{$data_sisya->alamat}}</span></li>
											<li>No. HP <span>{{$data_sisya->nohp_bapak}}</span></li>
											<li>Username <span>{{$data_sisya->user->username}}</span></li>
											<li>Tingkat <span>{{$data_sisya->tingkat}}</span></li>
										
										</ul>
									</div>
									
									
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
								</div>
								<div class="panel-body" style="overflow:auto;">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>KODE</th>
												<th>NAMA</th>
												<th>NILAI</th>
												<th>NABE</th>
												
											</tr>
										</thead>
										<tbody>
										@foreach($data_sisya->mapel as $mapel)
										<tr>
											<td>{{$mapel->kode}}</td>
											<td>{{$mapel->nama}}</td>
											
											<td>
											{{$mapel->pivot->nilai}}
											</td>
											<td>{{$mapel->nabe->nama}}</td>
											<td>
												
											</td>
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
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
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

//x-editable
$(document).ready(function() {
    $('.nilai').editable();
});
</script>
@stop