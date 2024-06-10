<?php

namespace App\Http\Controllers;

use App\Models\DataMustahiq;
use App\Models\DistribusiZakat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DistribusiZakatController extends Controller
{
    protected $distribusi;
    protected $mustahiq;
    public function __construct(DistribusiZakat $distribusi, DataMustahiq $mustahiq)
    {
        $this->distribusi = $distribusi;
        $this->mustahiq = $mustahiq;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Kelola Distribusi';
        if (Auth::user()->role == 'admin') {
            $mustahiq = $this->mustahiq->Tampil();
            $data = $this->distribusi->Tampil();
            return view('admin.kelola-distribusi', compact('title', 'data', 'mustahiq'));
        } else {
            $mustahiq = $this->mustahiq->TampilUpz();
            $data = $this->distribusi->TampilUpz();
            return view('admin.kelola-distribusi', compact('title', 'data', 'mustahiq'));
        }

    }

    public function store(Request $request)
    {
        $this->distribusi->Tambah([
            'mustahiq_id' => $request->mustahiq_id,
            'status_asnaf' => $request->status_asnaf,
            'tgl_distribusi' => Carbon::now(),
            'jumlah_distribusi' => $request->jumlah_distribusi,
            'metode_pembayaran' => $request->metode_pembayaran,
            'ket_distribusi' => $request->ket_distribusi
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambah');
    }

    public function update(Request $request, $distribusi_id)
    {
        $this->distribusi->Ubah($distribusi_id, [
            'status_asnaf' => $request->status_asnaf,
            'tgl_distribusi' => Carbon::now(),
            'jumlah_distribusi' => $request->jumlah_distribusi,
            'metode_pembayaran' => $request->metode_pembayaran,
            'ket_distribusi' => $request->ket_distribusi
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
    public function destroy($distribusi_id)
    {
        $this->distribusi->Hapus($distribusi_id);
        if (Auth::user()->role == 'admin') {
            return redirect('admin/kelola-pemasukan')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('upz/kelola-pemasukan')->with('success', 'Data berhasil dihapus');
        }
    }
}
