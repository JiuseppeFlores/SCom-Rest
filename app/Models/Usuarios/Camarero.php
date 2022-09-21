<?php

namespace App\Models\Usuarios;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido\Pedido;

class Camarero extends Model
{
    use HasFactory;
    protected $table = 'camarero';
    protected $primaryKey = 'ci';
    public $incrementing = false;
    public $timestamps = false;
    public function pedidos()
    {
        return $this->hasMany(Pedido::class,'ciCamarero','ci');
    }
}

