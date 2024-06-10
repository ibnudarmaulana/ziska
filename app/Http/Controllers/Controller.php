<?php

namespace App\Http\Controllers;

use App\Models\DataMustahiq;
use App\Models\DataMuzaki;
use App\Models\DataUpz;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function admin(){
        $title ='Dashboard';
        $muzaki = DataMuzaki::count();
        $mustahiq = DataMustahiq::count();
        $upz = User::where('role','upz')->count();
        return view('admin.index',compact('title','muzaki','mustahiq','upz'));
    }
    public function upz(){
        $title ='Dashboard';
        $alamat = DataUpz::where('user_id',Auth::user()->user_id)->value('alamat');
        $muzaki = DataMuzaki::where('alamat_muzaki',$alamat)->count();
        $mustahiq = DataMustahiq::where('alamat_mustahiq',$alamat)->count();
        return view('upz.index',compact('title','muzaki','mustahiq'));
    }
}
