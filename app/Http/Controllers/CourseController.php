<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Implementation\CourseServiceImpl;
use App\Validator\CourseValidator;

class CourseController extends Controller
{
    /**
     * @var CourseServiceImpl
     */
    private CourseServiceImpl $courseService;

    public function __construct(CourseServiceImpl $courseService)
    {
        $this->courseService = $courseService;
    }

    function create(Request $request, CourseValidator $courseValidator)
    {

        $validator = $courseValidator->validate();
        if ($validator->fails()) {
            return response([
                "status" => 422,
                "message" => "Error",
                "error" => $validator->errors()
            ], 422);
        }

        try {
            $this->courseService->postCreate($request->all());
            return response([
                "status" => 201,
                "message" => "Course Created",
            ], 201);

        } catch (\Exception $exception) {
            return response([
                "status" => 500,
                "message" => $exception->getMessage(),
            ], 500);
        }
    }

    function all()
    {
        return response([
            "status" => 200,
            "message" => "All courses",
            "data" => $this->courseService->getAll()
        ], 200);
    }

    function find($cursoId)
    {
        return response([
            "status" => 200,
            "message" => "Course with ID {$cursoId}",
            "data" => $this->courseService->find($cursoId)
        ], 200);
    }
}
