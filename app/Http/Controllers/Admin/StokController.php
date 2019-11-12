<?php

namespace App\Http\Controllers\Admin;

use App\Stok;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StokController extends Controller
{
    public function index()
    {
    	$stok = Stok::all();
    	return view('adminDataStok', [
    		'stok' => $stok,
            'active' => 'stok',
            'title' => 'Data Stok',
            'keterangan' => 'Sistem Informasi Pemesanan Ikan Lele'
    	]);
    }
    public function tambah()
    {
    	return view('adminTambahStok', [
            'active' => 'stok',
            'title' => 'Tambah data Stok Ikan',
            'keterangan' => 'Sistem Informasi Pemesanan Ikan Lele'
        ]);
    }
    public function simpan(Request $request)
    {
    	$stok = new Stok();
    	$stok->ukuran = $request->ukuran;
        $stok->keterangan = $request->keterangan;
    	$stok->harga = $request->harga;
    	$stok->jumlah = $request->jumlah;
    	$stok->save();
    	return redirect()->route('data-stok');
    }
    public function edit($id)
    {
        $stok = Stok::find($id);
        return view('adminEditStok', [
            'stok' => $stok,
            'active' => 'stok',
            'title' => 'Edit Stok',
            'keterangan' => 'Sistem Informasi Pemesanan Ikan Lele'
        ]);
    }
    public function update(Request $request, $id)
    {
        $stok = Stok::find($id);
        $stok->ukuran = $request->ukuran;
        $stok->keterangan = $request->keterangan;
        $stok->harga = $request->harga;
        $stok->jumlah = $request->jumlah;
        $stok->save();
        return redirect()->route('data-stok');
    }

    public function batal()
    {
        return redirect()->route('data-stok');
    }
}
