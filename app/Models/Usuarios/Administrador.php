<?php

namespace App\Models\Usuarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;
    protected $table = 'administrador';
    protected $primaryKey = 'ci';
    public $incrementing = false;
    public $timestamps = false;
}
