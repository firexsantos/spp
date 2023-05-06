@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet"/>
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
                    <form class="forms-sample" method="post" action="/admin/master-data/siswa">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nisn" class="form-label">NISN</label>
                                    <input type="text" class="form-control @error('nisn') is-invalid @enderror"
                                           name="nisn" placeholder="NISN ..." value="{{old('nisn')}}">
                                    @error('nisn')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="text" class="form-control @error('nis') is-invalid @enderror"
                                           name="nis" placeholder="NIS ..." value="{{old('nis')}}">
                                    @error('nis')
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
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                           name="nama" placeholder="Nama siswa ..." value="{{old('nama')}}">
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="id_kelas" class="form-label">Kelas</label>
                                <select class="js-example-basic-single form-select" data-placeholder="Pilih kelas"
                                        data-width="100%" name="id_kelas">
                                    <option value=""></option>
                                    @foreach ($kelas as $kl)
                                        <option value="{{ $kl->id_kelas }}">{{ $kl->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="no_telp" class="form-label">No. Telepon</label>
                                    <input type="text" class="form-control @error('no_telp') is-invalid @enderror"
                                           name="no_telp" placeholder="No. telepon ..." value="{{old('no_telp')}}">
                                    @error('no_telp')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <label for="id_spp" class="form-label">SPP</label>
                                <select class="js-example-basic-single form-select @error('spp') is-invalid @enderror"
                                        data-placeholder="Pilih SPP" data-width="100%" name="id_spp">
                                    <option value=""></option>
                                    @foreach ($spp as $sp)
                                        <option value="{{ $sp->id_spp }}">{{ $sp->nominal }}</option>
                                    @endforeach
                                </select>
                                @error('spp')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                              rows="4" placeholder="Alamat ...">{{old('alamat')}}</textarea>
                                    @error('alamat')
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
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/select2.js') }}"></script>
@endpush

