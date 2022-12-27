<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sucursal extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre',
        'empresa_id',
        ];
        public function empresa(){
            // return $this->belongsTo(categoria::class);
            return $this->belongsTo(empresa::class, 'empresa_id','id');
        }
        public function productos(){
            return $this->hasMany(Producto::class,'sucursal_id','id');
        }
        public function asignar(){
            return $this->hasMany(AsignarProductoEmpleado::class,'sucursal_id','id');
        }
}
