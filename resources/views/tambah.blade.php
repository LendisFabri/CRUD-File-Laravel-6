@extends('layout')
@section('nama_fitur')
	Tambah Data Buku
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

<form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <label>Judul Buku</label>
    <input type="text" name="judul_buku" class="form-control"  placeholder="Masukkan judul buku...." required>
  </div>
    <div class="form-group">
    <label>Penulis Buku</label>
    <input type="text" name="penulis_buku" class="form-control" id="" placeholder="Masukkan nama pe penulis buku...." required>
  </div>
    <div class="form-group">
    <label>Tanggal Terbit Buku</label>
    <input type="date" name="tanggal_terbit_buku" class="form-control" required>
  </div>
  <div class="form-group">
    <label>Sampul Buku</label>
    <input type="file" class="form-control-file" name="sampul_buku" required>
  </div>
  <div class="form-group">
    <label>Sampel Buku</label>
    <input type="file" class="form-control-file" name="sampel_buku" required>
  </div>
  <button type="submit" class="btn btn-dark float-left">Simpan</button>
</form>
<a href="{{route('buku.index')}}" class="text-white"><button class="btn btn-dark float-right">Kembali</button></a>

@endsection