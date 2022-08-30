<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Jumlah Kehadiran Jemaat')
@section('page_name', 'Data Jumlah Kehadiran Jemaat')
@section('navbar_content')
    <div class="col-4 ms-auto">
        <input type="text" class="form-control" name="" id="">
    </div>
@endsection
@section('content')
    @include('components.jemaatperminggupendeta')
    @include('sweetalert::alert')
@endsection