@extends('layouts.app')

@section('title')
    Admin | Dashboard
@endsection

@section('breadcrumb')
    <div class="codex-breadcrumb">
        <div class="row">
            <div class="col-4">
                <h1 class="fs-5">Dashboard</h1>
            </div>
            <div class="col-8">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="theme-body" data-simplebar>
        <div class="custom-container common-dash">
            <div class="row">
                <div class="col-xxl-3 col-sm-6 cdx-xxl-50">
                    <div class="card sale-revenue">
                        <div class="card-header">
                            <h4>Total Gampong</h4>
                        </div>
                        <div class="card-body progressCounter">
                            <h2><span class="count">{{ $villages }}</span></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-sm-6 cdx-xxl-50">
                    <div class="card sale-revenue">
                        <div class="card-header">
                            <h4>Total Kategori</h4>
                        </div>
                        <div class="card-body progressCounter">
                            <h2><span class="count">{{ $categories }}</span></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-sm-6 cdx-xxl-50">
                    <div class="card sale-revenue">
                        <div class="card-header">
                            <h4>Total Koordinator</h4>
                        </div>
                        <div class="card-body progressCounter">
                            <h2><span class="count">{{ $coordinators }}</span></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-sm-6 cdx-xxl-50">
                    <div class="card sale-revenue">
                        <div class="card-header">
                            <h4>Total Anggota</h4>
                        </div>
                        <div class="card-body progressCounter">
                            <h2><span class="count">{{ $members }}</span></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12 cdx-xxl-50">
                    <div class="card overall-revenuetbl">
                        <div class="card-header">
                            <h4>Grafik Gampong</h4>
                            <div class="setting-card action-menu">
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="apex-columnchart"></div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
          <!-- apex chart-->
          <script src="{{ asset('assets/js/vendors/chart/apexcharts.js') }}"></script>
          <!-- custom apex chart-->
          <script src="{{ asset('assets/js/vendors/chart/custom-apexchart.js') }}"></script>
@endpush
