<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = "c_curso";
    protected $primaryKey = 'cursoId';
    protected $fillable = ['codigoCurso', 'nombreCurso', 'nombreCurso2', 'plantillaId', 'horas', 'texto1', 'texto2', 'texto3', 'url_encuesta'];
    public $timestamps = false;

    // public $timestamps = false;
}
