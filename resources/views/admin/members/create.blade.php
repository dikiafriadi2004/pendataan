@extends('layouts.app')

@section('title')
    Admin | Anggota
@endsection

@push('css')
    <!-- select 2 css-->
    <link href="{{ asset('assets/css/vendor/select2/select2.min.css') }}" rel="stylesheet">
@endpush

@section('breadcrumb')
    <div class="codex-breadcrumb">
        <div class="row">
            <div class="col-md-6">
                <h1 class="fs-5">Tambah Anggota</h1>
            </div>
            <div class="col-md-6">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><a class="text-light" href="#!">Tambah Anggota</a></li>
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
                        <div class="card-header">
                            <h4>Anggota</h4>
                        </div>
                        <div class="card-body">
                            @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {!! Session::get('success') !!}
                            </div>
                                {{-- <div class="alert alert-success">
                                    <ul>
                                        <li></li>
                                    </ul>
                                </div> --}}
                            @endif
                            <form action="{{ route('admin.member.store', $coordinator->slug) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Nama</label>
                                    <input class="form-control" type="text" id="name" name="name"
                                        placeholder="Isi Nama Anggota" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label">NIK</label>
                                    <input class="form-control" type="text" id="nik" name="nik"
                                        placeholder="Isi NIK" value="{{ old('nik') }}" maxlength="16">
                                    @if ($errors->has('nik'))
                                        <div class="text-danger">{{ $errors->first('nik') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label">No Handphone</label>
                                    <input class="form-control" type="text" id="no_hp" name="no_hp"
                                        placeholder="Isi No Handphone" value="{{ old('no_hp') }}" maxlength="13">
                                    @if ($errors->has('no_hp'))
                                        <div class="text-danger">{{ $errors->first('no_hp') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Gampong</label>
                                    <select class="form-control hidesearch" id="village_id" name="village_id">
                                        <option disabled selected>--- Pilih Gampong ---</option>
                                        @foreach ($villages as $village)
                                            <option value="{{ $village->id }}">{{ $village->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <!-- select 2 js-->
    <script src="{{ asset('assets/js/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/select2/custom-select2.js') }}"></script>
@endpush
