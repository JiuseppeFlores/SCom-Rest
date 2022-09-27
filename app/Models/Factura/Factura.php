<?php

namespace App\Models\Factura;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuarios\Cliente;
use App\Models\Usuarios\Cajero;
use App\Models\Pedido\Pedido;

class Factura extends Model
{
    use HasFactory;
    protected $table = 'factura';
    protected $primaryKey = 'codfactura';
    public $incrementing = false;
    public $timestamps = false;
   
    public function cajeros(){
        return $this->belongsTo(Cajero::class,'ciCajero','ci');
    }
    public function clientes(){
        return $this->belongsTo(Cliente::class,'ciCliente','ci');
    }
    public function pedidos()
    {
        return $this->hasMany(Factura::class,'codFactura','codFactura');
    }

}
