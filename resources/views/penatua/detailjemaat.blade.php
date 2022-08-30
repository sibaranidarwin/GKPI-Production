<?php
    $navbars = StaticVariable::$navbarPenatua;
?>
@extends('layouts.home6')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Jemaat')
@section('page_name', "Detail Jemaat")
@section('content')
    @include('components.detailjemaat')
@endsection