<?php

namespace App\Models\Producto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class platillo extends Model
{
    use HasFactory;
    protected $table = 'platillo';
    protected $primaryKey = 'idproducto';
    public $incrementing = false;
    public $timestamps = false;
}