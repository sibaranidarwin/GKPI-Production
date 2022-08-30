
@extends('layouts.home7')

@section('style', asset('css/style/pendeta.css'))

@section('content')
    @include('components.cetakmasukbulanan')
    <script type="text/javascript">
        window.print();
    </script>
@endsection