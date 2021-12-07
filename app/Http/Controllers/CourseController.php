<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Services\Implementation\CourseServiceImpl;
use App\Validator\CourseValidator;

class CourseController extends Controller
{
    /**
     * @var CourseServiceImpl
     */
    private $courseService;
    /**
     * @var Request
     */
    private $request;
    /**
     * @var CourseValidator;
     */
    private $validator;

    public function __construct(CourseServiceImpl $courseService, Request $request, CourseValidator $courseValidator)
    {
        $this->courseService = $courseService;
        $this->request = $request;
        $this->validator = $courseValidator;
    }

    function create()
    {
        $response = response("", 201);

        $validator = $this->validator->validate();
        if ($validator->fails()) {
            $response = response([
                "status" => 422,
                "message" => "Error",
                "error" => $validator->errors()
            ], 422);
        } else {
            $this->courseService->postCreate($this->request->all());
        }
        return $response;
    }

    function all()
    {
        return response($this->courseService->getAll());
    }

    function find($cursoId)
    {
        $response = Courses::findOrFail($cursoId);
        return $response;
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
