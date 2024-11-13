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
                @foreach ($column as $key => $data)
                    <div class="col-xxl-12 cdx-xxl-50">
                        <div class="card overall-revenuetbl">
                            <div class="card-body">
                                <div id="chart-{{ $key }}"></div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script>
        Highcharts.chart('chart-container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Anggota Terdaftar'
            },
            xAxis: {
                categories: ['Atek Jawo', 'Atek Deah Tanoh', 'Atek Pahlawan', 'Atek Munjeng', 'Nesu Aceh',
                    'Kampong Baru', 'Nesu Jaya', 'Peuniti', 'SEUTUI', 'Suka Ramai', 'Lam Ara', 'Lampout',
                    'Mibo', 'Lhong Cut', 'Lhong Raya', 'Penyeurat', 'Lamlagang', 'Geuceu Komplek',
                    'Geuceu Inem', 'Geuceu Kaye Jato', 'Bitai', 'Emperom', 'Geuceu Menara', 'Lamjamee',
                    'Lampoh Daya', 'Lamtemen Barat', 'Lamtemen Timur', 'Punge Blang Cut', '	Ulee Peta',
                    'Penayong'
                ],
                crosshair: true,
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Anggota',
                data: [206, 160, 190, 134, 330, 341, 164, 1121, 211, 562, 508, 6, 158, 47, 217, 329, 392,
                    185, 185, 47, 143, 373, 325, 254, 200, 259, 356, 303, 160, 122
                ]
            }]
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @foreach ($column as $key => $data)
                Highcharts.chart('chart-{{ $key }}', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Jumlah Anggota dan Koordinator Setiap Gampong'
                    },
                    xAxis: {
                        categories: [
                            @foreach ($data as $village)
                                '{{ $village->name }}',
                            @endforeach
                        ],
                        title: {
                            text: null
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Jumlah',
                            align: 'high'
                        },
                        labels: {
                            overflow: 'justify'
                        }
                    },
                    plotOptions: {
                        bar: {
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },
                    legend: {
                        reversed: true
                    },
                    credits: {
                        enabled: false
                    },
                    series: [{
                        name: 'Anggota',
                        data: [
                            @foreach ($data as $village)
                                {{ $village->members_count }},
                            @endforeach
                        ]
                    }, {
                        name: 'Koordinator',
                        data: [
                            @foreach ($data as $village)
                                {{ $village->coordinators_count }},
                            @endforeach
                        ]
                    }]
                });
            @endforeach
        });
    </script>
@endpush
