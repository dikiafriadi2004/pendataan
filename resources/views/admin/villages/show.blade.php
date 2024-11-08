@extends('layouts.app')

@section('title')
    Admin | Detail Gampong
@endsection

@push('css')
    <!--Datatable-->
    <link href="{{ asset('assets/css/vendor/datatable/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/vendor/datatable/buttons.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/vendor/datatable/custom-datatable.css') }}" rel="stylesheet">
@endpush

@section('breadcrumb')
    <div class="codex-breadcrumb">
        <div class="row">
            <div class="col-md-6">
                <h1 class="fs-5">Data Gampong</h1>
            </div>
            <div class="col-md-6">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><a class="text-light" href="#!">Detail Gampong</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="theme-body">
        <div class="custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3>Koordinator</h3>
                            <table class="display dataTable cell-border" id="basicdata-tbl" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th>Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($village->coordinators as $coordinator)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $coordinator->name }}</td>
                                        @empty
                                            Belum ada data terbaru
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.villages.show', $village) . '?output=pdf' }}"
                            class="btn btn-md btn-outline-secondary mb-2" type="button">Export PDF</a>
                            <h3>Anggota</h3>
                            <table class="display dataTable cell-border" id="basicdata-tbl1" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>No Handphone</th>
                                        <th>Koordinator</th>
                                        <th>Gampong</th>
                                        <th>TPS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($village->members as $member)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $member->name }}</td>
                                            <td>{{ $member->nik }}</td>
                                            <td>{{ $member->no_hp }}</td>
                                            <td>{{ $member->coordinator->name }}</td>
                                            <td>{{ $member->village->name }}</td>
                                            <td>{{ $member->tps }}</td>
                                        @empty
                                            Belum ada data terbaru
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <!-- Datatable-->
    <script src="{{ asset('assets/js/vendors/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/datatable/custom-datatable.js') }}"></script>
@endpush
