@extends('layouts.app')

@section('title')
    Admin | Detail Kategori
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
            <h1 class="fs-5">Data Kategori</h1>
        </div>
        <div class="col-md-6">
            <ul class="breadcrumb justify-content-end mb-0">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item"><a class="text-light" href="#!">Detail Kategori</a></li>
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
                        <a href="{{ route('admin.categories.show', $category). '?output=pdf' }}" class="btn btn-md btn-outline-secondary mb-2" type="button">Export PDF</a>
                            <table class="display dataTable cell-border" id="basicdata-tbl" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($category->coordinators as $coordinator)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $coordinator->nik }}</td>
                                        <td>{{ $coordinator->name }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td><a href="{{ route('admin.coordinators.show', $coordinator) }}" class="btn btn-outline-info">Detail</a></td>
                                        {{-- <td>
                                            <form action="{{ route('admin.member.destroy', [$coordinator->slug, $member]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Hapus</button>

                                            </form>
                                        </td> --}}
                                    </tr>
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