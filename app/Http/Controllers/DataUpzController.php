<?php

namespace App\Http\Controllers;

use App\Models\DataUpz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataUpzController extends Controller
{
    protected $upz;
    protected $user;
    public function __construct(DataUpz $upz, User $user)
    {
        $this->upz = $upz;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Kelola UPZ';
        if (Auth::user()->role == 'admin') {
            $data = $this->user->Tampil();
            return view('admin.kelola-upz', compact('title', 'data'));
        } else {
            $data = $this->upz->TampilUpz();
            return view('upz.data-upz', compact('title', 'data'));
        }

    }
    public function store(Request $request)
    {
        $this->upz->Tambah([
            'user_id'=>Auth::user()->user_id,
            'nama_upz'=>$request->nama_upz,
            'alamat'=>$request->alamat_upz,
            'no_telp_upz'=>$request->no_telp_upz
        ]);
        return redirect()->back()->with('success','Data berhasil ditambah');
    }

    public function update(Request $request, $upz_id)
    {
        $this->upz->Ubah($upz_id, [
            'nama_upz' => $request->nama_upz,
            'alamat' => $request->alamat,
            'no_telp_upz' => $request->no_telp_upz
        ]);
        return redirect('admin/kelola-upz')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataUpz $dataUpz)
    {
        //
    }
}
