<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios';

    public function producto(){
        return $this->belongsTo(Producto::class, 'id_producto', 'id');
    }
    public $timestamps = false; // Esto desactiva las marcas de tiempo
}
