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
					<div class="alert alert-success" role="alert">
						{{session('sukses')}}
					</div>
				@endif
				@if(session('error'))
					<div class="alert alert-danger" role="alert">
						{{session('error')}}
					</div>
				@endif
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{$nabe->getAvatar()}}" class="img-circle" alt="Avatar">
										<h3 class="name">{{$nabe->nama}}</h3>
										<!-- <span class="online-status status-available">Available</span> -->
									</div>
									<!-- <div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												<span>Mata Pelajaran</span>
											</div>
											<div class="col-md-4 stat-item">
												15 <span>Awards</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Points</span>
											</div>
										</div>
									</div> -->
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Basic Info</h4>
										<ul class="list-unstyled list-justify">
											<li>Alamat <span>{{$nabe->alamat}}</span></li>
											<li>No. HP <span>{{$nabe->hp}}</span></li>
											<li>Username <span>{{$nabe->user->username}}</span></li>
										
										</ul>
									</div>
									
									<div class="text-center"><a href="/nabe/{{$nabe->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<div class="profile-right"> 
								
								<h4 class="heading">Nabe</h4>
								<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Pengampu Mata Pelajaran</h3>
									
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>KODE</th>
												<th>NAMA</th>
												<th>TINGKAT</th>
												
											</tr>
										</thead>
										<tbody>
										@foreach($nabe->mapel as $mapel)
											<tr>
												<td>{{$mapel->kode}}</td>
												<td>{{$mapel->nama}}</td>
												<td>{{$mapel->tingkat->tingkat}}</td>
												
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
								<!-- END AWARDS -->
								
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
