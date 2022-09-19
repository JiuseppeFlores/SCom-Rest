<?php

namespace App\Models\Usuarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuarios\Cliente;

class Cajero extends Model
{
    use HasFactory;
    protected $table = 'cajero';
    protected $primaryKey = 'ci';
    public $incrementing = false;
    public $timestamps = false;

    public function clientes()
    {
        return $this->hasMany(Cliente::class,'ciCajeroAdiciona','ci');
    }
    public function facturas()
    {
        return $this->hasMany(Factura::class,'ciCajero','ci');
    }


}
