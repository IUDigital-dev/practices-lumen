<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListCourses;

class ListCoursesController extends Controller
{
    public function listCourses()
    {
        return listCourses::all();
    }

    public function listOneCourse($cursoId)
    {
        // $dataCourse = new ListCourses;
        // $listOneCourse = $dataCourse->find($cursoId);
        // return response()->json($listOneCourse);
        return ListCourses::findOrFail($cursoId);
    }
}
