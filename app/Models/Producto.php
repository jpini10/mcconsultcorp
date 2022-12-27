<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'item',
        'codigo',
        'material',
        'um',
        'clasvalor',
        'lote',
        'almacen',
        'ubicacion',
        'stock',
        'condicion',
        'empresa_id',
        'sucursal_id',
        ];
        public function empresa(){
            // return $this->belongsTo(categoria::class);
            return $this->belongsTo(empresa::class, 'empresa_id','id');
        }
        public function sucursal(){
            // return $this->belongsTo(categoria::class);
            return $this->belongsTo(sucursal::class, 'sucursal_id','id');
        }
        public function asignar(){
            return $this->hasMany(AsignarProductoEmpleado::class,'producto_id','id');
        }
       
}
