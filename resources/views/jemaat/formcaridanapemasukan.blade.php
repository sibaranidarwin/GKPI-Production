<?php
$navbars = StaticVariable::$navbarJemaat;
?>
@extends('layouts.home2')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Login')
@section('page_name', 'Cari Dana Pemasukan')
@section('navbar_content')

@endsection
@section('content')
@include('components.formcaridanapemasukan')
@endsection