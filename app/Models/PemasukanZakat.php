<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PemasukanZakat extends Model
{
    use HasFactory;
    protected $table = 'pemasukan_zakat';
    protected $primaryKey = 'pemasukan_id';
    public $timestamps = false;
    protected $guarded = [];
    public function muzaki()
    {
        return $this->belongsTo(DataMuzaki::class, 'muzaki_id');
    }
    public function Tampil()
    {
        return $this->with('muzaki')->orderBy('pemasukan_id', 'desc')->get();
    }
    public function TampilUpz()
    {
        $alamat = DataUpz::where('user_id', Auth::user()->user_id)->value('alamat');
        return $this->whereHas('muzaki', function ($query) use ($alamat) {
            $query->where('alamat_muzaki', $alamat);
        })->orderBy('pemasukan_id', 'desc')->get();
    }
    public function Tambah($data)
    {
        return $this->create($data);
    }
    public function Ubah($pemasukan_id, $data)
    {
        return $this->find($pemasukan_id)->update($data);
    }
    public function Hapus($pemasukan_id)
    {
        return $this->find($pemasukan_id)->delete();
    }
}
