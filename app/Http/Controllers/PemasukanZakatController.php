<?php

namespace App\Http\Controllers;

use App\Models\DataMuzaki;
use App\Models\PemasukanZakat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemasukanZakatController extends Controller
{
    protected $pemasukan;
    protected $muzaki;
    public function __construct(PemasukanZakat $pemasukan, DataMuzaki $muzaki)
    {
        $this->pemasukan = $pemasukan;
        $this->muzaki = $muzaki;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Kelola Pemasukan';
        if (Auth::user()->role == 'admin') {
            $data = $this->pemasukan->Tampil();
            $muzaki = $this->muzaki->Tampil();
            return view('admin.kelola-pemasukan', compact('title', 'data', 'muzaki'));
        } else {
            $data = $this->pemasukan->Tampil();
            $muzaki = $this->muzaki->TampilUpz();
            return view('upz.kelola-pemasukan', compact('title', 'data', 'muzaki'));
        }

    }

    public function store(Request $request)
    {
        $this->pemasukan->Tambah([
            'muzaki_id' => $request->muzaki_id,
            'tgl_pemasukan' => Carbon::now(),
            'jumlah_pemasukan' => $request->jumlah_pemasukan,
            'metode_pembayaran' => $request->metode_pembayaran,
            'ket_pemasukan' => $request->ket_pemasukan
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambah');
    }

    public function update(Request $request, $pemasukan_id)
    {
        $this->pemasukan->Ubah($pemasukan_id, [
            'muzaki_id' => $request->muzaki_id,
            'tgl_pemasukan' => Carbon::now(),
            'jumlah_pemasukan' => $request->jumlah_pemasukan,
            'metode_pembayaran' => $request->metode_pembayaran,
            'ket_pemasukan' => $request->ket_pemasukan
        ]);
        if (Auth::user()->role == 'admin') {
            return redirect('admin/kelola-pemasukan')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('upz/kelola-pemasukan')->with('success', 'Data berhasil diubah');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($pemasukan_id)
    {
        $this->pemasukan->Hapus($pemasukan_id);
        if (Auth::user()->role == 'admin') {
            return redirect('admin/kelola-pemasukan')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('upz/kelola-pemasukan')->with('success', 'Data berhasil dihapus');
        }
    }
}
