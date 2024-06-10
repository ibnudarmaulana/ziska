<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DistribusiZakat extends Model
{
    use HasFactory;
    protected $table = 'distribusi_zakat';
    protected $primaryKey = 'distribusi_id';
    public $timestamps = false;
    protected $guarded = [];
    public function mustahiq()
    {
        return $this->belongsTo(DataMustahiq::class, 'mustahiq_id');
    }
    public function Tampil()
    {
        return $this->with('mustahiq')->orderBy('distribusi_id', 'desc')->get();
    }
    public function TampilUpz()
    {
        $alamat = DataUpz::where('user_id', Auth::user()->user_id)->value('alamat');
        return $this->whereHas('mustahiq', function ($query) use ($alamat) {
            $query->where('alamat_mustahiq', $alamat);
        })->orderBy('distribusi_id', 'desc')->get();
    }
    public function Tambah($data)
    {
        return $this->create($data);
    }
    public function Ubah($distribusi_id, $data)
    {
        return $this->find($distribusi_id)->update($data);
    }
    public function Hapus($distribusi_id)
    {
        return $this->find($distribusi_id)->delete();
    }
}
