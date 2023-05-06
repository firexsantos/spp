@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" /> --}}
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            {{-- <li class="breadcrumb-item"><a href="#">Master Data</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title d-inline">{{ $title }}</h6>
                </div>
                <div class="card-body">
                    <form class="forms-sample" method="post" action="/{{ $level }}/laporan">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="bulan_dibayar" class="form-label">Bulan</label>
                                    <select class="js-example-basic-single form-select" data-placeholder="Pilih bulan"
                                        data-width="100%" name="bulan_dibayar">
                                        <option value=""></option>
                                        @foreach ($bulan as $bl)
                                            <option value="{{ $bl->bulan_dibayar }}"
                                                @if (old('bulan_dibayar') == $bl->bulan_dibayar) selected @endif>{{ $bl->bulan_dibayar }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('bulan_dibayar')
                                        <div class="text-danger text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="tahun_dibayar" class="form-label">Tahun</label>
                                    <select class="js-example-basic-single form-select" data-placeholder="Pilih tahun"
                                        data-width="100%" name="tahun_dibayar">
                                        <option value=""></option>
                                        @foreach ($tahun as $th)
                                            <option value="{{ $th->tahun_dibayar }}"
                                                @if (old('tahun_dibayar') == $th->tahun_dibayar) selected @endif>{{ $th->tahun_dibayar }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tahun_dibayar')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb3">
                                    <label class="form-label text-light">.</label>
                                    <input type="submit" class="form-control btn btn-primary" value="Lihat Laporan"
                                        id="">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/select2.js') }}"></script>
@endpush
