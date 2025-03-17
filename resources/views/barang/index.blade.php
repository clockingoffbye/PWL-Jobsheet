@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('barang/create') }}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped table-hover table-sm" id="table_barang">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            var dataBarang = $('#table_barang').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('barang/list') }}",
                    "dataType": "json",
                    "type": "POST"
                },
                columns: [
                    {
                        data: "barang_id", // Menggunakan barang_id sebagai primary key
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "barang_kode", // Menampilkan kode barang
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "barang_nama", // Menampilkan nama barang
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "harga_beli", // Menampilkan harga beli
                        className: "text-right",
                        orderable: true,
                        searchable: false
                    },
                    {
                        data: "harga_jual", // Menampilkan harga jual
                        className: "text-right",
                        orderable: true,
                        searchable: false
                    },
                    {
                        data: "kategori", // Menampilkan kategori barang
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "aksi",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endpush
