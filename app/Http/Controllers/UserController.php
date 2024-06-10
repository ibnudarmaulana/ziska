<?php

namespace App\Http\Controllers;

use App\Models\DataUpz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $user;
    protected $upz;
    public function __construct(User $user, DataUpz $upz)
    {
        $this->user = $user;
        $this->upz = $upz;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Kelola Pengguna';
        $data = $this->user->Tampil();
        return view('admin.kelola-pengguna', compact('data', 'title'));
    }
    public function store(Request $request)
    {
        $this->user->Tambah([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);
        return redirect('admin/kelola-upz')->with('success', 'Data berhasil ditambah');
    }

 
    public function update(Request $request, $user_id)
    {
        $this->user->Ubah($user_id,[
            'password'=>Hash::make($request->password)
        ]);
        return redirect('admin/kelola-upz')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id)
    {
        $this->user->Hapus($user_id);
        $this->upz->Hapus($user_id);
        return redirect('admin/kelola-upz')->with('success','Data berhasil dihapus');
    }
    public function masuk()
    {
        return view('auth.masuk');
    }
    public function prosesMasuk(Request $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            if (Auth::user()->role == 'admin') {
                return redirect('admin/dashboard')->with('success','Anda berhasil masuk');
            } else {
                $profil = DataUpz::where('user_id', Auth::user()->user_id)->first();
                if (!$profil) {
                    return redirect('upz/data-upz')->with('profil','Lengkapi profilmu!');
                } else {
                    return redirect('upz/dashboard')->with('success','Anda berhasil masuk');
                }
                
            }

        } else {
            return redirect()->back()->with('error', 'Akun tidak terdaftar');
        }

    }
    public function keluar(){
        Auth::logout();
        return redirect('/');
    }
}
