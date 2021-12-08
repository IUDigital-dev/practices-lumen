<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Validation\Rules\Unique;
use App\Validator\CourseValidator;


class CourseController extends Controller{     
    
    public function update(Request $request, $cursoId,courseValidator $courseValidator){

        //Validate Data

        // Se puede refactorizar mejor esto.
        $validator = $courseValidator->validate();
        if ($validator->fails()) {
            return response([
                "status" => 422,
                "message" => "Error",
                "error" => $validator->errors()
            ], 422);
        }

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















