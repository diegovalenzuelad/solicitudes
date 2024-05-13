<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $fillable = ['solicitud', 'sc', 'ft', 'image', 'units_id'];

    public function units(){
        return $this->belongsTo(Unit::class,);
    }
}
