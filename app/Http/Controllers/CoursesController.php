<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;

class CoursesController extends Controller{

    public function index()
    {
        return Courses::all();
    }


    public function search($cursoId){
        return Courses::findOrfail($cursoId);

    }


    // public function updateCourses(Request $request,$cursoId){
    //     $course = Courses::find($cursoId);
    //     $course->codigoCurso=$request->codigoCurso;
    //     $course->nombreCurso=$request->nombreCurso;
    //     $course->texto1=$request->texto1;
    //     $course->save();

    //     return response()->json($course);
    // }


    public function updateCourses(int $cursoId)
{
    $response = response("",202);
    $this->Courses->updateCourses($this->request->all(),$cursoId);
    return $response;
}

    // public function destroyCourses($cursoId)
    //  {
    //     $course = Courses::find($cursoId);
    //     $course->delete();
    
    //     return response()->json('La categoria fue eliminada');
    //  }
}















