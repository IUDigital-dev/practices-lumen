<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table = "c_plantilla";
    protected $primaryKey = 'plantillaId';
    protected $fillable = [
        'nombrePlantilla',
        'imgCertificado',
    ];
    public $timestamps = false;
}
