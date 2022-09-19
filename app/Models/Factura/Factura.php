<?php

namespace App\Models\Factura;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuarios\Cliente;
use App\Models\Usuarios\Cajero;

class Factura extends Model
{
    use HasFactory;
    protected $table = 'factura';
    protected $primaryKey = 'codFactura';
    public $incrementing = false;
    public $timestamps = false;
   
    public function cajeros(){
        return $this->belongsTo(Cajero::class,'ciCajero','ci');
    }
    public function clientes(){
        return $this->belongsTo(Cliente::class,'ciCliente','ci');
    }

}
