<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Services\Implementation\CourseServiceImpl;

class CourseController extends Controller
{
    //inyectar nuestra implementación

    /**
     * @var CourseServiceImpl
     */
    private $courseService;
    /**
     * @var Request
     */
    private $request;

    public function __construct(CourseServiceImpl $courseService, Request $request)
    {
        $this->courseService = $courseService;
        $this->request = $request;
    }
}







    // public function all()
    // {
    //     return Courses::all()->toJson();
    // }

    // public function find($cursoId)
    // {
    //     return Courses::findOrFail($cursoId)->toJson();
    // }

    // public function create(Request $request)
    // {

    //     // $this->validate
    //     // $input = $request->all();
    //     // // Courses::create($input);

    //     return response()->json([
    //         'res' => true,
    //         'message' => 'Registro insertado correctamente'
    //     ]);
    // }




    // // $data = new Courses;
    // //  $data->codigoCurso = $request->codigoCurso;
    // //         $data->nombreCurso = $request->nombreCurso;
    // //         $data->nombreCurso2 = $request->nombreCurso2;
    // //         $data->horas = $request->horas;
    // //         $data->plantillaId = $request->plantillaId;
    // //         $data->texto1 = $request->texto1;
    // //         $data->texto2 = $request->texto2;
    // //         $data->texto3 = $request->texto3;
    // //         $data->url_encuesta = $request->url_encuesta;
    // // $data->save();

    // //     return response()->json([
    // //         'res' => true,
    // //         'message' => 'Registro insertado correctamente'
    // //     ]);
