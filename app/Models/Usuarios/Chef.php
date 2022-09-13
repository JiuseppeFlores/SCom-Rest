<?php

namespace App\Models\Usuarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    use HasFactory;
    protected $table = 'chef';
    protected $primaryKey = 'ci';
    public $incrementing = false;
    public $timestamps = false;
}
