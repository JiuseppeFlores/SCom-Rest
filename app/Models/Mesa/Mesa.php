<?php

namespace App\Models\Mesa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;
    protected $table = 'mesa';
    protected $primaryKey = 'nroMesa';
    public $timestamps = false;
}
