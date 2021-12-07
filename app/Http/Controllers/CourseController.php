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
    private $courseService;

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

        $this->courseService->postCreate($request->all());
        return response([
            "status" => 201,
            "message" => "Course Created",
        ], 201);
    }

    function all()
    {
        return response($this->courseService->getAll());
    }

    function find($cursoId)
    {
        return response($this->courseService->find($cursoId));
    }
}
