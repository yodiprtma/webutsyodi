@extends('layout.master')

@section('title', 'Ubah Buku')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/buku') }}">Buku</a></li>
    <li class="breadcrumb-item active">Tampilkan</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-header">Tampilkan</div>
            <div class="card-body">
             
           
                  <div class="card-body">
                  <p class="card-text">Kode Buku :{{ $databuku->kodebk }}</p>
                  <p class="card-text">Judul : {{ $databuku->nama }}</p>
                  <p class="card-text">Nama pengarang : {{ $databuku->namapengarang }}</p>
                  <p class="card-text">Jenis Buku: {{ $databuku->jenisbuku_nama }}</p>
                  <a class="btn btn-sm btn-warning" href="{{ url('/buku/') }}">Kembali</a>
              </hr>
            </div>
          </div>
@endsection