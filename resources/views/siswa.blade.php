@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            {{-- <li class="breadcrumb-item"><a href="#">Admin</a></li> --}}
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
                    <div class="table-rekelasnsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Bulan Dibayar</th>
                                    <th>Tahun Dibayar</th>
                                    <th>SPP</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Petugas</th>
                                </tr>
                            </thead>
                            @php
                                $num = 1;
                            @endphp
                            @if (count($data) > 0)
                                @foreach ($data as $item)
                                    <tbody>
                                        <tr>
                                            <td>{{ $num++ }}</td>
                                            <td>{{ $item->siswa->nama }}</td>
                                            <td>{{ $item->siswa->kelas->nama_kelas }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->tgl_bayar)) }}</td>
                                            <td>{{ $item->bulan_dibayar }}</td>
                                            <td>{{ $item->tahun_dibayar }}</td>
                                            <td>{{ $item->siswa->spp->nominal }}</td>
                                            <td>{{ $item->jumlah_bayar }}</td>
                                            <td>{{ $item->petugas->nama_petugas }}</td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9" class="text-center text-secondary">Belum ada data pembayaran yang
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

@if (session()->has('success'))
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
                "{{ session('success') }}",
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
