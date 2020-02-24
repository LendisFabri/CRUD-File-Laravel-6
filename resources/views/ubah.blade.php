@extends('layout')
@section('nama_fitur')
    Edit Data Buku
@endsection
@section('fitur')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('buku.update', $data->id_buku) }}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }} {{ method_field('PUT') }}
  <div class="form-group">
    <label>Judul Buku</label>
    <input type="text" name="judul_buku" class="form-control"  value="{{ $data->judul_buku }}" required>
  </div>
    <div class="form-group">
    <label>Penulis Buku</label>
    <input type="text" name="penulis_buku" class="form-control" value="{{ $data->penulis_buku }}" required>
  </div>
    <div class="form-group">
    <label>Tanggal Terbit Buku</label>
    <input type="date" name="tanggal_terbit_buku" class="form-control" value="{{ $data->tanggal_terbit_buku }}" required>
  </div>
    <img src="{{ url('uploads/gambar/'.$data->lokasi_sampul_buku) }}" style="width: 150px; height: 200px;">
    <div class="form-group">
    <label for="lokasi_sampul_buku">File Gambar Sebelumnya</label>
    <input type="file" class="form-control-file" name="lokasi_sampul_buku" required>
  </div>

  <div class="form-group">
    <label for="lokasi_sampel_buku">File Dokumen Sebelumnya : {{ $data->lokasi_sampel_buku }}</label>
    <input type="file" class="form-control-file" name="lokasi_sampel_buku" required>
  </div>
  <button type="submit" class="btn btn-dark float-left">Simpan</button>
</form>
  <a href="{{route('buku.index')}}" class="text-white"><button class="btn btn-dark float-right">Kembali</button></a>
@endsection