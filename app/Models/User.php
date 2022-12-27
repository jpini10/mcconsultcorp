<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use HasFactory, Notifiable,HasRoles;

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];
     public function asignar(){
        return $this->hasMany(AsignarProductoEmpleado::class,'user_id','id');
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];
    // public function productos(){
    //     return $this->hasMany(Producto::class,'user_id','id');
    // }
  
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
