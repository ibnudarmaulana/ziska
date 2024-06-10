<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DataMustahiq extends Model
{
    use HasFactory;
    protected $table = 'data_mustahiq';
    protected $primaryKey = 'mustahiq_id';
    public $timestamps = false;
    protected $guarded = [];
    public function distribusi(){
        return $this->hasMany(DistribusiZakat::class,'mustahiq_id');
    }
    public function Tampil()
    {
        return $this->orderBy('mustahiq_id', 'desc')->get();
    }
    public function TampilUpz(){
        $alamat = DataUpz::where('user_id',Auth::user()->user_id)->value('alamat');
        return $this->where('alamat_mustahiq',$alamat)->orderBy('mustahiq_id','desc')->get();
    }
    public function Tambah($data)
    {
        return $this->create($data);
    }
    public function Ubah($mustahiq_id, $data)
    {
        return $this->find($mustahiq_id)->update($data);
    }
    public function Hapus($mustahiq_id)
    {
        return $this->find($mustahiq_id)->delete();
    }

}
