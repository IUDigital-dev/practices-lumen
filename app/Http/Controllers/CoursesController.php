<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;

class CoursesController extends Controller
{
    public function listCourses()
    {
        return Courses::all();
    }

    public function listOneCourse($cursoId)
    {
        // $dataCourse = new ListCourses;
        // $listOneCourse = $dataCourse->find($cursoId);
        // return response()->json($listOneCourse);
        return Courses::findOrFail($cursoId);
    }
}
