<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Kecamatan;
use App\Kabupaten;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KurirController extends Controller
{
	public function index()
	{
		$user = User::where('role', '=', 'kurir')->orderBy('created_at', 'desc')->paginate(5);
		return view('adminDataKurir', [
			'user' => $user,
			'active' => 'kurir',
    		'title' => 'Data Kurir',
    		'keterangan' => 'Sistem Informasi Pemesanan Ikan Lele'
		]);
	}

	public function tambah()
	{
		$kab = Kabupaten::all();
        $kec = Kecamatan::all();
		return view('adminTambahKurir', [
            'kabupaten' => $kab, 
            'kecamatan' => $kec,
            'active' => 'kurir',
    		'title' => 'Tambah Kurir',
    		'keterangan' => 'Sistem Informasi Pemesanan Ikan Lele'
        ]);
	}

	public function simpan(Request $request)
	{
		$kurir = new User();
		$kec=Kecamatan::find($request->kecamatan);
        $kab=Kabupaten::find($request->kabupaten);
		$kurir->nama = $request->nama;
		$kurir->email = $request->email;
		$kurir->password = bcrypt($request->password);
		$kurir->jenisKelamin = $request->jeniskelamin;
		$kurir->alamat = $request->alamat.', kecamatan '.$kec->kecamatan.', kabupaten '.$kab->kabupaten;
		$kurir->nohp = $request->nohp;
		$kurir->role = 'kurir';
		$kurir->save();
		return redirect()->route('data-kurir');
	}

	public function detail($id)
    {
    	$user = User::find($id);
    	return view('adminDetailKurir', [
    		'user' => $user,
    		'active' => 'kurir',
    		'title' => 'Detail Kurir',
    		'keterangan' => 'Sistem Informasi Pemesanan Ikan Lele'
    	]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $kab = Kabupaten::all();
        $kec = Kecamatan::all();
        return view('adminEditKurir', [
            'user' => $user,
            'kabupaten' => $kab, 
            'kecamatan' => $kec,
            'active' => 'kurir',
    		'title' => 'Ubah Data Kurir',
    		'keterangan' => 'Sistem Informasi Pemesanan Ikan Lele'
        ]);
    }

    public function update(Request $request, $id)
    {
    	$user=User::find($id);
    	$kec=Kecamatan::find($request->kecamatan);
        $kab=Kabupaten::find($request->kabupaten);
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->jenisKelamin = $request->jeniskelamin;
        $user->alamat = $request->alamat.', kecamatan '.$kec->kecamatan.', kabupaten '.$kab->kabupaten;
        $user->nohp = $request->nohp;
        $user->role = $request->role;
        $user->save();
        return redirect()->route('detail-kurir', $id);
    }

    public function batal()
    {
    	return redirect()->route('data-kurir');
    }
}
