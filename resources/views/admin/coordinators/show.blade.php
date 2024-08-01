@extends('layouts.app')

@section('title')
    Admin | Detail Koordinator
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
                <h1 class="fs-5">Data Koordinator</h1>
            </div>
            <div class="col-md-6">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><a class="text-light" href="#!">Detail Koordinator</a></li>
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
                        {{-- @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {!! Session::get('success') !!}
                            </div>
                        @endif --}}
                        <div class="swal-notif" data-swal="{!! Session::get('success') !!}"></div>
                        <div class="card-body">
                            <div class="user-detail mb-4">
                                <h5 class="text-primary mb-2"> <i class="fa fa-info-circle me-2"></i>Informasi</h5>
                                <ul class="info-list">
                                    <li><span>Name : </span>#K{{ $coordinator->id }} {{ $coordinator->name }}
                                    </li>
                                    <li><span>NIK : </span>{{ $coordinator->nik }}
                                    </li>
                                    <li><span>No Handphone : </span>{{ $coordinator->no_hp }}</li>
                                    <li><span>Kategori : </span>{{ $coordinator->category->name }}</li>
                                </ul>
                            </div>
                            <a href="{{ route('admin.member.create', $coordinator->slug) }}"
                                class="btn btn-md btn-primary float-end mb-2" type="button">Tambah Data</a>
                            <table class="display dataTable cell-border" id="basicdata-tbl" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>No Handphone</th>
                                        <th>Gampong</th>
                                        <th>TPS</th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($coordinator->members as $member)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $member->nik }}</td>
                                            <td>{{ $member->name }}</td>
                                            <td>{{ $member->no_hp }}</td>
                                            <td>{{ $member->village->name }}</td>
                                            <td>{{ $member->tps }}</td>
                                            <td>
                                                <a href="{{ route('admin.member.edit', [$coordinator->slug, $member]) }}"
                                                    class="btn btn-outline-primary mb-2">Ubah</a>
                                                <form
                                                    action="{{ route('admin.member.destroy', [$coordinator->slug, $member]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger confirm-delete"
                                                        type="submit">Hapus</button>
                                                </form>
                                            </td>
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

    <script type="text/javascript">
        $(".confirm-delete").click(function(event) {
            const form = $(this).closest("form")

            event.preventDefault()

            Swal.fire({
                title: "Anda Yakin?",
                text: "Data akan terhapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Hapus!",
                        text: "Data berhasil dihapus.",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 2000
                    })
                    form.submit()
                }
            });
        })

        const swal = $('.swal-notif').data('swal');
        if (swal) {
            Swal.fire({
                'title': 'Success',
                'text': swal,
                'icon': 'success',
                'showConfirmButton': false,
                'timer': 2000

            })
        }
    </script>
@endpush
