@extends('layout.master')

@section('title', 'Tambah Buku')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/buku') }}">Buku</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h4 class="card-title">Tambah Buku</h4>
            </div>
        </div>
        <form action="{{ url('/buku') }}" method="POST">
            <div class="card-body">
                @csrf
                <div>
                    <label class="form-label">Kode Buku</label>
                    <input class="form-control" type="text" name="kodebk">
                </div>
                <div>
                    <label class="form-label">Judul</label>
                    <input class="form-control" type="text" name="nama">
                </div>
                <div>
                    <label class="form-label">Nama Pengarang</label>
                    <input class="form-control" type="text" name="namapengarang">
                </div>
                <div>
                    <label class="form-label">Jenis Buku</label>
                    <select class="form-select" name="jenisbuku">
                        @foreach ($jenisbuku as $j)
                            <option value="{{ $j->id }}">{{ $j->nama }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
