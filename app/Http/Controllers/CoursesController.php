<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use Illuminate\Validation\Rules\Unique;

class CoursesController extends Controller{

    public function index()
    {
        return Courses::all();
    }


    public function search($cursoId){
        return Courses::findOrfail($cursoId);

    }


    public function updateCourses(Request $request,$cursoId){

        //Validate Data
        $this->validate($request,[
            'cursoId' => 'required|unique:c_curso,cursoId',
            'codigoCurso' => 'required',
            'nombreCurso' => 'required',
            'nombreCurso2' => 'required',
            'plantillaId' => 'required|unique:c_plantilla,plantillaId',
            'horas' => 'required',
            'texto1' => 'required',
            'url_encuesta'=> 'required'
        ]);

        $course = Courses::find($cursoId);
        $course->codigoCurso=$request->codigoCurso;
        $course->nombreCurso=$request->nombreCurso;
        $course->nombreCurso2=$request->nombreCurso2;
        $course->plantillaId=$request->plantillaId;
        $course->horas=$request->horas;
        $course->texto1=$request->texto1;
        $course->texto2=$request->texto2;
        $course->texto3=$request->texto3;
        $course->url_encuesta=$request->url_encuesta;

        $course->save();

        return response()->json($course);
    }
    




    public function destroyCourses($cursoId){
        $course = Courses::find($cursoId);
        $course->delete();
    
        return response()->json('Deleted successfully');
    }
}















