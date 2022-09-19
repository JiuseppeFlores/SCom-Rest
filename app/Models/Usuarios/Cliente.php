<?php

namespace App\Models\Usuarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuarios\Cajero;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'cliente';
    protected $primaryKey = 'ci';
    public $incrementing = false;
    public $timestamps = false;

    public function cajero(){
        return $this->belongsTo(Cajero::class,'ciCajeroAdiciona','ci');
    }
    public function facturas()
    {
        return $this->hasMany(Factura::class,'ciCliente','ci');
    }
}
