<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;

class CoursesController extends Controller
{
    public function all()
    {
        return Courses::all()->toJson();
    }

    public function find($cursoId)
    {
        return Courses::findOrFail($cursoId)->toJson();
    }

    public function createCourse(Request $request)
    {
        $data = new Courses;

        $data->codigoCurso = $request->codigoCurso;
        $data->nombreCurso = $request->nombreCurso;
        $data->nombreCurso2 = $request->nombreCurso2;
        $data->horas = $request->horas;
        $data->plantillaId = $request->plantillaId;
        $data->texto1 = $request->texto1;
        $data->texto2 = $request->texto2;
        $data->texto3 = $request->texto3;
        $data->url_encuesta = $request->url_encuesta;
        $data->save();

        return response()->json([
            'res' => true,
            'message' => 'Registro insertado correctamente'
        ]);
    }



    // $input = $request->all();
    // Courses::create($input);

    // return response()->json([
    //     'res' => true,
    //     'message' => 'Registro insertado correctamente'
    // ]);


}
