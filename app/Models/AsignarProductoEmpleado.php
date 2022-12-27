<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignarProductoEmpleado extends Model
{
    use HasFactory;
    protected $fillable=[
        'fecha',
        'coteo',
        'diferencias',
        'producto_id',
        'user_id',
        'sucursal_id',
        'lote_id',
        'empresa_id',
        ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id','id');

    }
    public function producto(){
        return $this->belongsTo(producto::class, 'producto_id','id');
    }
    public function empresa(){
        return $this->belongsTo(empresa::class, 'empresa_id','id');
    }
    public function sucursal(){
        return $this->belongsTo(sucursal::class, 'sucursal_id','id');
    }
}
