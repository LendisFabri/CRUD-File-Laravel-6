@extends('layout')
@section('nama_fitur')
	Daftar Buku
@endsection
@section('fitur')
	@if ($message = Session::get('success'))
	<div class="alert alert-success alert-block">
	    <button type="button" class="close" data-dismiss="alert">×</button>    
	    <strong>{{ $message }}</strong>
	</div>
	@endif
	<a href="{{route('buku.create')}}" class="text-white"><button class="btn btn-dark border-0 mb-2">
	Tambah</button></a>
	<table class="table table-bordered">
	  <thead>
	    <tr>
	      <th>No</th>
	      <th>Judul Buku</th>
	      <th>Penulis Buku</th>
	      <th>Tanggal Terbit Buku</th>
	      <th>Sampul Buku</th>
	      <th>Sampel Buku</th>
	      <th>Kelola Data</th>
	    </tr>
	  </thead>
	  <tbody>
		@foreach($datas as $data)
		    <tr>
				<td>BK{{ $data->id_buku }}P</td>
				<td>{{ $data->judul_buku }}</td>
				<td>{{ $data->penulis_buku }}</td>
				<td>{{ $data->tanggal_terbit_buku }}</td>
				<td><img src="{{ url('uploads/gambar/'.$data->lokasi_sampul_buku) }}" style="width: 125px; height: 175px;"></td>
				<td>{{$data->lokasi_sampel_buku}}</td>
				<td>
					<a href="{{ route('buku.edit',$data->id_buku) }}" class="text-white"><button class=" btn btn-sm btn-warning border-0">Ubah</a></button>
					<form action="{{ route('buku.destroy', $data->id_buku) }}" method="post">
		                {{ csrf_field() }}
		                {{ method_field('DELETE') }}
		                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
		            </form>
				</td>
			</tr>
		@endforeach
	   </tbody>
	</table>
@endsection