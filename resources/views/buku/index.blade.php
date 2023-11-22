@extends('layout.master')

@section('title', 'Buku')

@section('breadcrumb')
    <li class="breadcrumb-item active">Buku</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-10">
                    <h4 class="card-title">Data Buku</h4>
                </div>
                <div class="col-2">
                    <a class="btn btn-sm btn-primary float-end" href="{{ url('/buku/create') }}">Tambah</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Kode Buku</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Nama Pengarang</th>
                        <th scope="col">Jenis Buku</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($databuku as $db)
                        <tr>
                            <td>{{ $db->kodebk }}</td>
                            <td>{{ $db->nama }}</td>
                            <td>{{ $db->namapengarang }}</td>
                            <td>{{ $db->jenisbuku_nama }}</td>
                            <td class="float-end">
                                <a class="btn btn-sm btn-warning"
                                    href="{{ url('/buku/' . $db->id . '/edit') }}">Ubah</a>
                                    <a class="btn btn-sm btn-info"
                                    href="{{ url('/buku/' . $db->id) }}">View</a>
                                <form style="display: inline;" action="{{ url('/buku/' . $db->id) }}" method ="POST">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
