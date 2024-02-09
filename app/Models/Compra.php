<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $table = 'compras';
    
    public function producto(){
        return $this->belongsTo(Producto::class, 'id_producto', 'id');
    }

    public function pedido(){
        return $this->belongsTo(Pedido::class, 'id_pedido', 'id');
    }
}
