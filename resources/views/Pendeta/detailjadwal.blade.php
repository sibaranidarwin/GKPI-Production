<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')
@section('title', 'Petugas Ibadah Minggu')
@section('page_name', 'Petugas Ibadah Minggu')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">


<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="col-12 bg-white p-3">
    <div class="row">
    <div class="col-md-7 col-12">
            <h3 class="fs-3 fw-bold">Petugas Ibadah</h3>
            <div class="table-responsive col-md-11 col-12">
                <table id="table-datatables" class="mt-4 table-center">
                <thead>
                    <tr>                                            
                    <th class="col-2">No</th>
                    <th class="col-4">Pelayan</th>
                    <th class="col-4">{{ $jadwas['name'] }}</th>  
                    </tr>                  
                </thead>
                <tbody>
                     @php
                        $no = 1;
                    @endphp
                    <tr>
                    <td>{{ $no++ }}</td>
                    <td>Parjamita</td>
                        <td>{{ $jadwas['pengkhotbah'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                    <td>Paragenda</td>
                        <td>{{ $jadwas['liturgis'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                    <td>Tinting/Tangiang</td>
                        <td>{{ $jadwas['warta'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                    <td>Song Leader's</td>
                        <td>{{ $jadwas['song_lead'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                    <td>Organis</td>
                        <td>{{ $jadwas['organis'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                    <td>Papungu Pelean</td>
                        <td>{{ $jadwas['pengumpul'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                    <td>Petugas Protokol Kesehatan</td>
                        <td>{{ $jadwas['protokol'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                    <td>Operator LCD</td>
                        <td>{{ $jadwas['operator'] }}</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>
@include('sweetalert::alert')
<script type="text/javascript"> 
    $(document).ready(function () {
        $('#table-datatables').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
</script>
@endsection
