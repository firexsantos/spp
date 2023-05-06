@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet"/>
    {{-- <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" /> --}}
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            {{-- <li class="breadcrumb-item"><a href="#">Master Data</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title d-inline">{{$title}}</h6>
                </div>
                <div class="card-body">
                    <form class="forms-sample" method="post" action="/{{ $level }}/pembayaran">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nisn" class="form-label">Nama Siswa</label>
                                <select class="js-example-basic-single form-select" data-placeholder="Pilih siswa"
                                        data-width="100%" name="nisn">
                                    <option value=""></option>
                                    @foreach ($siswa as $sw)
                                        <option value="{{ $sw->nisn }}">{{ $sw->nama }}
                                            - {{ $sw->spp->nominal }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tgl_bayar" class="form-label">Tanggal</label>
                                    <div class="input-group date datepicker" id="datePickerExample">
                                        <input type="text" class="form-control @error('tgl_bayar') is-invalid @enderror" name="tgl_bayar">
                                        <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
                                        @error('tgl_bayar')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="bulan_dibayar" class="form-label">Bulan Dibayar</label>
                                    <select class="js-example-basic-single form-select" data-placeholder="Pilih bulan"
                                            data-width="100%" name="bulan_dibayar">
                                        <option value=""></option>
                                        @foreach ($bulan as $bl)
                                            <option value="{{ $bl }}">{{ $bl }}</option>
                                        @endforeach
                                    </select>
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tahun_dibayar" class="form-label">Tahun Dibayar</label>
                                    <input type="number"
                                           class="form-control @error('tahun_dibayar') is-invalid @enderror"
                                           name="tahun_dibayar" placeholder="Tahun dibayar ..."
                                           value="{{old('tahun_dibayar')}}">
                                    @error('tahun_dibayar')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="jumlah_bayar" class="form-label">Jumalh Dibayar</label>
                                    <input type="number"
                                           class="form-control @error('jumlah_bayar') is-invalid @enderror"
                                           name="jumlah_bayar" placeholder="Jumlah dibayar ..."
                                           value="{{old('jumlah_bayar')}}">
                                    @error('jumlah_bayar')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary me-2 mt-3">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script> --}}
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/datepicker.js') }}"></script> --}}
@endpush

