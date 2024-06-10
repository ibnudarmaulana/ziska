<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DataMuzaki extends Model
{
    use HasFactory;
    protected $table ='data_muzaki';
    protected $primaryKey = 'muzaki_id';
    public $timestamps = false;
    protected $guarded=[];
    public function pemasukan(){
        return $this->hasMany(PemasukanZakat::class,'muzaki_id');
    }
    public function Tampil(){
        return $this->orderBy('muzaki_id','desc')->get();
    }
    public function TampilUpz(){
        $alamat = DataUpz::where('user_id',Auth::user()->user_id)->value('alamat');
        return $this->where('alamat_muzaki',$alamat)->orderBy('muzaki_id','desc')->get();
    }
    public function Tambah($data){
        return $this->create($data);
    }
    public function Ubah($muzaki_id,$data){
        return $this->find($muzaki_id)->update($data);
    }
    public function Hapus($muzaki_id){
        return $this->find($muzaki_id)->delete();
    }

}
