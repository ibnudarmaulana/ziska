<?php

namespace App\Http\Controllers;

use App\Models\DataMuzaki;
use App\Models\DataUpz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataMuzakiController extends Controller
{
    protected $muzaki;
    public function __construct(DataMuzaki $muzaki)
    {
        $this->muzaki = $muzaki;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Kelola Muzaki';
        if (Auth::user()->role == 'admin') {
            $data = $this->muzaki->Tampil();
            return view('admin.kelola-muzaki', compact('title', 'data'));
        } else {
            $data = $this->muzaki->TampilUpz();
        return view('upz.kelola-muzaki', compact('title', 'data'));
        }

    }
    public function store(Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $alamat = $request->alamat_muzaki;
        } else {
            $alamat = DataUpz::where('user_id', Auth::user()->user_id)->value('alamat');
        }
        
        $this->muzaki->Tambah([
            'nama_muzaki' => $request->nama_muzaki,
            'nik' => $request->nik,
            'alamat_muzaki' => $alamat,
            'jk_muzaki' => $request->jk_muzaki,
            'no_telp_muzaki' => $request->no_telp_muzaki,
            'email_muzaki' => $request->email_muzaki,
            'tgl_lahir_muzaki' => $request->tgl_lahir_muzaki
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambah');
    }

    public function update(Request $request, $muzaki_id)
    {
        if (Auth::user()->role == 'admin') {
            $alamat = $request->alamat_muzaki;
        } else {
            $alamat = DataUpz::where('user_id', Auth::user()->user_id)->value('alamat');
        }
        $this->muzaki->Ubah($muzaki_id, [
            'nama_muzaki' => $request->nama_muzaki,
            'nik' => $request->nik,
            'alamat_muzaki' => $alamat,
            'jk_muzaki' => $request->jk_muzaki,
            'no_telp_muzaki' => $request->no_telp_muzaki,
            'email_muzaki' => $request->email_muzaki,
            'tgl_lahir_muzaki' => $request->tgl_lahir_muzaki
        ]);
        if (Auth::user()->role == 'admin') {
            return redirect('admin/kelola-muzaki')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('upz/kelola-muzaki')->with('success', 'Data berhasil diubah');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($muzaki_id)
    {
        $this->muzaki->Hapus($muzaki_id);
        if (Auth::user()->role == 'admin') {
            return redirect('admin/kelola-muzaki')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('upz/kelola-muzaki')->with('success', 'Data berhasil dihapus');
        }
    }
}
