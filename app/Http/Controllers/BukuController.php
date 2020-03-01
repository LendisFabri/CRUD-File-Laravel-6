<?php

namespace App\Http\Controllers;

use App\Buku;
use Illuminate\Http\Request;
use File;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Buku::all();
        return view('beranda',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Buku;
        
        $data->judul_buku = $request->judul_buku;
        $data->penulis_buku = $request->penulis_buku;
        $data->tanggal_terbit_buku = $request->input('tanggal_terbit_buku');
        
        $sampel_buku = $request->file('sampel_buku');
        $ekstensi_sampel = $sampel_buku->getClientOriginalExtension();
        $nama_sampel = "sampel_" . $request->input('judul_buku').".".$ekstensi_sampel;
        $sampel_buku->move('uploads/dokumen/',$nama_sampel);
        $data->sampel_buku = $nama_sampel;

        $sampul_buku = $request->file('sampul_buku');
        $ekstensi_sampul = $sampul_buku->getClientOriginalExtension();
        $nama_sampul = "sampul_" . $request->input('judul_buku').".".$ekstensi_sampul;
        $sampul_buku->move('uploads/gambar/',$nama_sampul);
        $data->sampul_buku = $nama_sampul;


        $data->save();

        return redirect()->route('buku.index')->with('success','Selamat! Data buku ' . $data->judul_buku . ' berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id_buku)
    {
        $data = Buku::findOrFail($id_buku);
        return view('ubah',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_buku)
    {

        $data = Buku::findOrFail($id_buku);
        $data->judul_buku = $request->judul_buku;
        $data->penulis_buku = $request->penulis_buku;
        $data->tanggal_terbit_buku = $request->input('tanggal_terbit_buku');

        if (empty($request->file('sampul_buku'))){
            $data->sampul_buku = $data->sampul_buku;
        }
        else{
            unlink('uploads/gambar/'.$data->sampul_buku);
            $sampul_buku = $request->file('sampul_buku');
            $ekstensi_sampul = $sampul_buku->getClientOriginalExtension();
            $nama_sampul = "sampul_" . $request->judul_buku.".".$ekstensi_sampul;
            $sampul_buku->move('uploads/gambar/',$nama_sampul);
            $data->sampul_buku = $nama_sampul;
            
        }

        if (empty($request->file('sampel_buku'))){
            $data->sampel_buku = $data->sampel_buku;
        }
        else{            
            unlink('uploads/dokumen/'.$data->sampel_buku); 
            $sampel_buku = $request->file('sampel_buku');
            $ekstensi_sampel = $sampel_buku->getClientOriginalExtension();
            $nama_sampel = "sampel_" . $request->judul_buku.".".$ekstensi_sampel;
            $sampel_buku->move('uploads/dokumen/',$nama_sampel);
            $data->sampel_buku = $nama_sampel;
        }

        $data->save();
        return redirect()->route('buku.index')->with('success','Selamat! Data buku ' . $data->judul_buku . ' berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_buku)
    {
        $data = Buku::findOrFail($id_buku);
        File::delete('uploads/gambar/'.$data->sampul_buku, 'uploads/dokumen/'.$data->sampel_buku);
        $data->delete();
        return redirect()->route('buku.index')->with('success','Data berhasil dihapus!');
    }
}
