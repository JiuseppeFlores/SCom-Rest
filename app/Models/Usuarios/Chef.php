<?php

namespace App\Models\Usuarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido\Pedido;
use Illuminate\Support\Facades\DB;

class Chef extends Model
{
    use HasFactory;
    protected $table = 'chef';
    protected $primaryKey = 'ci';
    public $incrementing = false;
    public $timestamps = false;

    public function pedidos()
    {
        return $this->hasMany(Pedido::class,'ciCajero','ci');
    }

    //Relacion muchos a muchos

    public function solicita(){
        return $this->belongsToMany(DB::table('solicita'),'ciChef','ci');
    }
}
