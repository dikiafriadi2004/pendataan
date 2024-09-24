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
                        <div class="card-body">
                            <div id="chart-container"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-12 cdx-xxl-50">
                    <div class="card overall-revenuetbl">
                        <div class="card-body">
                            <div id="chart-container-2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12 cdx-xxl-50">
                    <div class="card overall-revenuetbl">
                        <div class="card-body">
                            <div id="chart-container-3"></div>
                        </div>
                    </div>
                </div>
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
                categories: ['Atek Jawo', 'Atek Deah Tanoh', 'Atek Pahlawan', 'Atek Munjeng', 'Nesu Aceh', 'Kampong Baru', 'Nesu Jaya', 'Peuniti', 'SEUTUI', 'Suka Ramai', 'Lam Ara', 'Lampout', 'Mibo', 'Lhong Cut', 'Lhong Raya', 'Penyeurat', 'Lamlagang', 'Geuceu Komplek', 'Geuceu Inem', 'Geuceu Kaye Jato', 'Bitai', 'Emperom', 'Geuceu Menara', 'Lamjamee', 'Lampoh Daya', 'Lamtemen Barat', 'Lamtemen Timur', 'Punge Blang Cut', '	Ulee Peta', 'Penayong'],
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
                    data: [206,160,190,134,330,341,164,1121,211,562,508,6,158,47,217,329,392,185,185,47,143,373,325,254,200,259,356,303,160,122]
                }
            ]
        });
    </script>

<script>
    Highcharts.chart('chart-container-2', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Anggota Terdaftar'
        },
        xAxis: {
            categories: ['Laksana', 'Keuramat', 'KUTA ALAM', 'Beurawe', 'Kota Baru', 'Bandar Baru', 'Mulia', 'Lampulo', 'Lamdingin', 'Lambaro Skep', 'Lampaseh Kota', 'Merdu Wati', 'Keudah', 'Pelanggahan', 'Gampong Jawa', 'Gampong Pande', 'Batoh', 'Blang Cut', 'Cot Mesjid', 'Lampaloh', 'Lamdom', 'Lamseupeung', 'Lueng Bata', 'Panterik', 'Suka Damai', 'Alue Deah Tengoh', 'Asoe Nanggro', 'Gampong Blang', 'Blang Oi', 'GAMPONG BARO'],
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
                data: [228,378,384,184,9,9,362,639,344,522,73,86,140,314,432,96,206,357,311,28,482,386,377,294,297,149,98,50,248,61]
            }
        ]

    });
</script>

<script>
    Highcharts.chart('chart-container-3', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Anggota Terdaftar'
        },
        xAxis: {
            categories: ['Cot Lamkueweuh', 'Deah Baro', 'Deah Glumpang', 'Lambung', 'LAMJABAT', 'LAMPASEH ACEH', 'Gampong Pie', 'Punge Jurong', 'Punge Ujong', 'Surien', 'Ulee Lheue', 'ALUE NAGA', 'Deah Raya', 'Ie Masen Kaye Adang', 'Jeulingke', 'Kopelma Darusalam', 'Lamgugob', 'Perada', 'PINEUNG', 'RUKOH', 'Tibang', 'Pango Raya', 'Pango Deah', 'Ilie', 'Lamglumpang', 'Curih', 'Ie Masen Ulee Kareng', 'Doi', 'Lamteh', 'Lambhuk',],
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
                data: [99,151,108,163,187,565,85,431,251,174,46,522,110,283,190,31,202,60,125,127,127,50,117,121,128,214,152,16,29,70]
            }
        ]

    });
</script>
@endpush
