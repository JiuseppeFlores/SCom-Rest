<?php

namespace App\Models\Pedido;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuarios\Camarero;
use App\Models\Factura\Factura;
use App\Models\Usuarios\Chef;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedido';
    protected $primaryKey = 'idpedido';
    
    public $timestamps = false;


public function camareros(){
    return $this->belongsTo(Camarero::class,'ciCamarero','ci');
}

public function facturas(){
    return $this->belongsTo(Factura::class,'codfactura','codfactura');
}

public function chefs(){
    return $this->belongsTo(Chef::class,'ciChef','ci');
}
}
