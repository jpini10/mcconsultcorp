<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
    protected $fillable=[
        'nombre',
        ];
        public function sucursal(){
            return $this->hasMany(sucursal::class);
        }
        public function productos(){
            return $this->hasMany(Producto::class,'empresa_id','id');
        }
        public function asignar(){
            return $this->hasMany(AsignarProductoEmpleado::class,'empresa_id','id');
        }
}
