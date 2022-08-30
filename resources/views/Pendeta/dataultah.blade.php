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

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Ulang Tahun Perminggu')
@section('page_name', 'Data Ulang Tahun')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">


<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="col-12 mt-5 p-3">
    <div class="col-12">
        <div class="row">
            @foreach ($datajemaats as $datajemaat)
                <div class="col-12 col-md-4 d-flex mt-md-0 mb-4">
                    <div class="col-12 bg-white shadow-sm p-4 rounded">
                        <div class="col-12 d-flex">
                            <div class="col-7">
                                <span>{{ $datajemaat['name'] }}</span>
                            </div>
                            <div class="col-5 rounded  d-flex justify-content-end">
                                <div class="rounded-circle {{ $datajemaat['color'] }} d-flex align-items-center justify-content-center"
                                    style="width: 60px;height:60px;">
                                    <i class="fa fa-user text-white fs-3"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="fs-3 fw-bold">{{ $datajemaat['jumlah'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
        <div class="col-12 mt-3">
            <div class="table-responsive-sm">
                <table id="table-datatables" class="table table-bordered">
                <thead>
                    <th style="min-width: 140px;">Nama</th>
                    <th class="col-3">Tanggal Lahir</th>
                    <th class="col-3">Ultah Ke</th>
                    <th class="col-3">Sektor</th>
                    </thead>
                    <tbody>
                        @foreach ($jemaats as $jemaat)
                            <tr>
                                <td>
                                    {{ $jemaat->name }}</a>
                                </td>
                                <td>
                                    {{ Carbon\Carbon::parse($jemaat->tanggal_lahir)->format('d F Y') }}
                                </td>
                                <td>
                                <?php 
                                $tanggal_lahir = $jemaat->tanggal_lahir;
                                $lahir    =new DateTime($tanggal_lahir);
                                $today        =new DateTime('today');
                                $usia = $today->diff($lahir);
                                echo $usia->y; echo " Tahun";
                                ?>
                                </td>
                                <td>
                                    {{$jemaat['sektor']->nama}}
                                </td>
                            </tr>
                        @endforeach
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript"> 
    $(document).ready(function () {
        $('#table-datatables').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
</script>
    @endsection
