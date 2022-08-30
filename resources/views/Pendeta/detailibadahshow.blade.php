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
@section('title', 'Ibadah Mingu')
@section('page_name', 'Ibadah Minggu')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">


<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="col-12 bg-white p-3">
    <div class="row">
    <div class="col-md-7 col-12">
            <h3 class="fs-3 fw-bold">Acara Ibadah</h3>
            <div class="table-responsive col-md-11 col-12">
                <table id="table-datatables" class="mt-4 table-center">
                <thead>
                    <tr>                                            
                    <th class="col-1">No</th>
                    <th class="col">Tertib Acara</th>
                    <th class="col">No.KJ/BE/PKJ/Ayat</th>  
                    </tr>                  
                </thead>
                <tbody>

                @php
                        $no = 1;
                    @endphp
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Nyanyian *)</td>
                        <td>{{ $ibadas['nyanyi'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>VOTUM INTROITUS</td>
                        <td>{{ $ibadas['votum'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Nyanyian</td>
                        <td>{{ $ibadas['nyanyi_2'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>EPISTEL :</td>
                        <td>{{ $ibadas['epistel'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Nyanyian *)</td>
                        <td>{{ $ibadas['nyanyi_3'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Pengakuan Dosa / Janji Pengampunan </td>
                        <td>{{ $ibadas['dosa'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Nyanyian</td>
                        <td>{{ $ibadas['nyanyi_4'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>PETUNJUK HIDUP BARU </td>
                        <td>{{ $ibadas['petunjuk'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>KOOR </td>
                        <td>{{ $ibadas['koor'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Nyanyian* </td>
                        <td>{{ $ibadas['nyanyi_5'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Pengakuan Iman Rasuli</td>
                        <td>{{ $ibadas['pengakuan'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Warta Jemaat/Doa Syafaat </td>
                        <td>{{ $ibadas['warta'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Nyanyian</td>
                        <td>{{ $ibadas['nyanyi_6'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>KHOTBAH</td>
                        <td>{{ $ibadas['khotbah'] }}</td>
                    </tr>
                  
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Nyanyian</td>
                        <td>{{ $ibadas['nyanyi_7'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Nats Pesembahan</td>
                        <td>{{ $ibadas['nats'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Persembahan - Doa Persembahan</td>
                        <td>{{ $ibadas['persembahan'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Nyanyian Persembahan</td>
                        <td>{{ $ibadas['nyanyi_8'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Doa Penutup/Doxologi/Berkat</td>
                        <td>{{ $ibadas['penutup'] }}</td>
                    </tr>
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>Amin</td>
                        <td>{{ $ibadas['amin'] }}</td>
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
