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
                    <form class="forms-sample" method="post" enctype="multipart/form-data"
                          action="/admin/master-data/spp/{{$data->id_spp}}">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="tahun" class="form-label">Nama</label>
                            <input type="number" class="form-control @error('tahun') is-invalid @enderror" name="tahun"
                                   placeholder="Nama Guru ..." value="{{(old('tahun')) ? old('tahun') : $data->tahun}}">
                            @error('tahun')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nominal" class="form-label">Email</label>
                            <input type="number" class="form-control @error('nominal') is-invalid @enderror"
                                   name="nominal" placeholder="Email ..."
                                   value="{{(old('nominal')) ? old('nominal') : $data->nominal}}">
                            @error('nominal')
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

