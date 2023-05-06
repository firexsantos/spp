@extends('layout.master')

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
                    <form class="forms-sample" method="post" action="/admin/master-data/spp">
                        @csrf
                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun Ajaran</label>
                            <input type="number" class="form-control @error('tahun') is-invalid @enderror" name="tahun"
                                   placeholder="Tahun Ajaran ..." value="{{old('tahun')}}">
                            @error('tahun')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="number" class="form-control @error('nominal') is-invalid @enderror"
                                   name="nominal" placeholder="Nominal ..." value="{{old('nominal')}}">
                            @error('nominal')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

