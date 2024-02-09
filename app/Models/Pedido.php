<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedidos';
    public function compra(){
        return $this->belongsTo(Compra::class, 'id_compra', 'id');
    }
    public $timestamps = false; // Esto desactiva las marcas de tiempo
}
