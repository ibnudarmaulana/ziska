<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DataUpz extends Model
{
    use HasFactory;
    protected $table = 'data_upz';
    protected $primaryKey = 'upz_id';
    public $timestamps = false;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function Tampil()
    {
        return $this->with('user')->orderBy('upz_id', 'desc')->get();
    }
    public function TampilUpz()
    {
        return $this->with('user')->where('user_id', Auth::user()->user_id)->first();
    }
    public function Tambah($data){
        return $this->create($data);
    }
    public function Ubah($upz_id,$data){
        return $this->find($upz_id)->update($data);
    }
    public function Hapus($user_id){
        return $this->where('user_id',$user_id)->delete();
    }
}
