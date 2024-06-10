<?php

namespace App\Http\Controllers;

use App\Models\DataMustahiq;
use App\Models\DataMuzaki;
use App\Models\DataUpz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataMustahiqController extends Controller
{
    protected $mustahiq;
    public function __construct(DataMustahiq $mustahiq)
    {
        $this->mustahiq = $mustahiq;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Kelola Mustahiq';
       if (Auth::user()->role == 'admin') {
        $data = $this->mustahiq->Tampil();
        return view('admin.kelola-mustahiq', compact('title', 'data'));
       } else {
        $data = $this->mustahiq->TampilUpz();
        return view('upz.kelola-mustahiq', compact('title', 'data'));
       }
       
    }
    public function store(Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $alamat = $request->alamat_mustahiq;
        } else {
            $alamat = DataUpz::where('user_id', Auth::user()->user_id)->value('alamat');
        }
        $this->mustahiq->Tambah([
            'nama_mustahiq' => $request->nama_mustahiq,
            'nik' => $request->nik,
            'jk_mustahiq' => $request->jk_mustahiq,
            'no_telp_mustahiq' => $request->no_telp_mustahiq,
            'email_mustahiq' => $request->email_mustahiq,
            'tgl_lahir_mustahiq' => $request->tgl_lahir_mustahiq,
            'status_mustahiq' => $request->status_mustahiq,
            'jml_anggota_keluarga' => $request->jml_anggota_keluarga,
            'alamat_mustahiq' => $alamat
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambah');
    }

    public function update(Request $request, $mustahiq_id)
    {
        if (Auth::user()->role == 'admin') {
            $alamat = $request->alamat_mustahiq;
        } else {
            $alamat = DataUpz::where('user_id', Auth::user()->user_id)->value('alamat');
        }
        $this->mustahiq->Ubah($mustahiq_id, [
            'nama_mustahiq' => $request->nama_mustahiq,
            'nik' => $request->nik,
            'jk_mustahiq' => $request->jk_mustahiq,
            'no_telp_mustahiq' => $request->no_telp_mustahiq,
            'email_mustahiq' => $request->email_mustahiq,
            'tgl_lahir_mustahiq' => $request->tgl_lahir_mustahiq,
            'status_mustahiq' => $request->status_mustahiq,
            'jml_anggota_keluarga' => $request->jml_anggota_keluarga,
            'alamat_mustahiq' => $alamat
        ]);
        if (Auth::user()->role== 'admin') {
            return redirect('admin/kelola-mustahiq')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('upz/kelola-mustahiq')->with('success', 'Data berhasil diubah');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($mustahiq_id)
    {
        $this->mustahiq->Hapus($mustahiq_id);
        if (Auth::user()->role== 'admin') {
            return redirect('admin/kelola-mustahiq')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('upz/kelola-mustahiq')->with('success', 'Data berhasil dihapus');
        }
    }
}
