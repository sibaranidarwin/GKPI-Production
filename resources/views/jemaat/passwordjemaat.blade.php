<?php
$navbars = StaticVariable::$navbarJemaat;
?>


@extends('layouts.home4')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Ubah Password')
@section('page_name', "Ubah Password")
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<h2>Ubah Kata Sandi</h2>
 
<div class="card-body">
@if (session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif
@if (session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif
<form class="form-horizontal" method="POST" action="/jemaat/passwordjemaat/{{$jemaat->nik}}/edit">
{{ csrf_field() }}
 
<div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
<label for="new_password" class="col-md-4 control-label">Kata Sandi Lama</label>
 
<div class="col-md-6">
<input id="current_password" type="password" class="form-control" name="current_password" required>
 
@if ($errors->has('current_password'))
<span class="help-block">
<strong>{{ $errors->first('current_password') }}</strong>
</span>
@endif
</div>
</div>
 
<div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
<label for="new_password" class="col-md-4 control-label">Kata Sandi Baru</label>
 
<div class="col-md-6">
<input id="new_password" type="password" class="form-control" name="new_password" required>
 
@if ($errors->has('new_password'))
<span class="help-block">
<strong>{{ $errors->first('new_password') }}</strong>
</span>
@endif
</div>
</div>
 
<div class="form-group">
<label for="new_password_confirm" class="col-md-4 control-label">Konfirmasi Kata Sandi Baru</label>
 
<div class="col-md-6">
<input id="new_password_confirm" type="password" class="form-control" name="new_password_confirmation" required>
</div>
</div>
 
<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
Ubah Kata Sandi
</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

@endsection