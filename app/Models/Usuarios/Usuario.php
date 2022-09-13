<?php

namespace App\Models\Usuarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'usuario';
    protected $primaryKey = 'ci';
    public $incrementing = false;
    public $timestamps = false;
}
