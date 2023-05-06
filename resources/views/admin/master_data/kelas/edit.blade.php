@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet"/>
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Master Data</a></li>
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
                    <form class="forms-sample" method="post" action="/admin/master-data/kelas/{{$data->id_kelas}}">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="nama_kelas" class="form-label">Nama Kelas</label>
                            <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror"
                                   name="nama_kelas" placeholder="Nama kelas ..."
                                   value="{{(old('nama_kelas')) ? old('nama_kelas') : $data->nama_kelas}}">
                            @error('nama_kelas')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kompetensi_keahlian" class="form-label">Kompetensi Keahlian</label>
                            <input type="text" class="form-control @error('kompetensi_keahlian') is-invalid @enderror"
                                   name="kompetensi_keahlian" placeholder="Kompetensi keahlian ..."
                                   value="{{(old('kompetensi_keahlian')) ? old('kompetensi_keahlian') : $data->kompetensi_keahlian}}">
                            @error('kompetensi_keahlian')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/dropify.js') }}"></script>
@endpush

