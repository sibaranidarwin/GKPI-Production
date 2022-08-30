<?php
$navbars = StaticVariable::$navbarPendeta;
?>
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Jemaat Perminggu')
@section('page_name', "Data Jemaat Perminggu")
@section('content')
    @include("components.formdataperminggupendeta")
    @include('sweetalert::alert')
@endsection