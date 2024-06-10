<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    protected $fillable = [
        'role',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function dataupz()
    {
        return $this->hasOne(DataUpz::class, 'user_id');
    }
    public function Tampil()
    {
        return $this->with('dataupz')->where('role', 'upz')->orderBy('user_id', 'desc')->get();
    }
    public function Tambah($data)
    {
        return $this->create($data);
    }
    public function Ubah($user_id, $data)
    {
        return $this->find($user_id)->update($data);
    }
    public function Hapus($user_id){
        return $this->find($user_id)->delete();
    }
}
