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
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">Update Password</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <br>
                                    <form method="POST" action="{{ route('sisya.password.update', ['sisya' => $sisya->id]) }}">
                                        @method('patch')
                                        @csrf

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">Password
                                                Lama</label>

                                            <div class="col-md-6">
                                                <input id="old_password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="old_password" required autocomplete="new-password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm"
                                                class="col-md-4 col-form-label text-md-right">Password Baru</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password" required autocomplete="new-password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="current_password"
                                                class="col-md-4 col-form-label text-md-right">Konfirmasi Password</label>

                                            <div class="col-md-6">
                                                <input id="current_password" type="password"
                                                    class="form-control @error('current_password') is-invalid @enderror"
                                                    name="current_password" required autocomplete="current_password">

                                                @error('current_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0 ">
                                            <div class="col-md-6 offset-md-4 ">
                                                <button type="submit" class="btn btn-primary center">
                                                    Update Password
                                                </button>
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
</div>
@stop