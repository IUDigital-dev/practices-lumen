<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Validation\Rules\Unique;

class CourseController extends Controller{

    public function update(Request $request, $cursoId){

        //Validate Data

        // Se puede refactorizar mejor esto.
        $this->validate($request,[
            'codigoCurso' => 'required',
            'nombreCurso' => 'required',
            'nombreCurso2' => 'required',
            'plantillaId' => 'required|exists:c_plantilla,plantillaId',
            'horas' => 'required',
            'texto1' => 'required',
            'url_encuesta'=> 'required'
        ]);
        try {
            Course::findOrFail($cursoId)->update($request->all());
            return response([
                "status" => 201,
                "message" => "Course updated with ID {$cursoId}",
            ], 201);

        } catch (\Exception $exception) {
            return response([
                "status" => 500,
                "message" => "Error",
                "error" => $exception->getMessage()
            ], 500);
        }
    }

    public function delete($cursoId){
        $course = Course::findOrFail($cursoId);
        $course->delete();
        try {
            return response([
                "status" => 201,
                "message" => "Course deleted with ID {$cursoId}",
            ], 201);
        } catch (\Exception $exception) {
            return response([
                "status" => 500,
                "message" => $exception->getMessage()
            ], 500);
        }
    }
}















