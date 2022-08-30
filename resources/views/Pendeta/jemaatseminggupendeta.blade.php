<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Tinting Parmingguon/Kategorial')
@section('page_name', 'Statistik Jemaat Perminggu')
@section('navbar_content')
    <div class="col-4 ms-auto">
        <input type="text" class="form-control" name="" id="">
    </div>
@endsection
@section('content')
    @include('components.jemaatseminggupendeta')
    @include('sweetalert::alert')
@endsection