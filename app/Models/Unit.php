<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function solicituds()
    {
        return $this->hasMany(Solicitud::class, 'id');
    }
}
