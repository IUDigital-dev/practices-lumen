<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model{
    protected $table = "c_curso";

    protected $primaryKey = 'cursoId';

    protected $fillable = ['cursoId','codigoCurso','nombreCurso'];
    // protected $hidden = ['created_at','updated_at','nombreCurso2','plantillasId','horas','texto1','texto2','texto3','url_encuesta'];



    // protected $fillable = [];

    public $timestamps = false;
}

