@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet"/>
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
                    <a href="{{ route('kelas.create') }}" class="btn btn-primary btn-icon-text btn-sm float-end"><i
                            data-feather="plus-square"></i>Tambah
                        Kelas</a>
                </div>
                <div class="card-body">
                    <div class="table-rekelasnsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kelas</th>
                                <th>Kompetensi Keahlian</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @php
                                $num = 1;
                            @endphp
                            @if(count($data) > 0)
                                @foreach($data as $item)
                                    <tbody>
                                    <tr>
                                        <td>{{$num++}}</td>
                                        <td>{{$item->nama_kelas}}</td>
                                        <td>{{$item->kompetensi_keahlian}}</td>
                                        <td>
                                            <form action="{{ route('kelas.destroy', $item->id_kelas) }}" method="POST"
                                                  id="delete{{$item->id_kelas}}">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="kelas/{{$item->id_kelas}}/edit" type="button"
                                                       class="btn btn-warning btn-icon" data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title="Edit"><i data-feather="edit"></i></a>

                                                    <button type="button" onclick="delConf({{$item->id_kelas}})"
                                                            class="btn btn-danger btn-icon" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Hapus"><i
                                                            data-feather="trash"></i></button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center text-secondary">Belum ada data kelas yang
                                        ditambahkan!
                                    </td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('assets/js/sweet-alert.js') }}"></script>
@endpush

@if(session()->has('success'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger me-2'
                },
                buttonsStyling: false,
            })

            swalWithBootstrapButtons.fire(
                'Berhasil',
                "{{session('success')}}",
                'success'
            )
        })
    </script>
@endif

<script>
    function delConf(id) {
        const form = document.getElementById('delete' + id)
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger me-2'
            },
            buttonsStyling: false,
        })

        swalWithBootstrapButtons.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'me-2',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                form.submit()
            }
        })
    }
</script>
