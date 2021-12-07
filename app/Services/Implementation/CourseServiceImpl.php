<?php

namespace App\Services\Implementation;

use App\Models\Course;
use App\Services\Interfaces\CourseServiceInterface;
use Illuminate\Support\Collection;

class CourseServiceImpl implements CourseServiceInterface
{
    private Course $model;

    function __construct(Course $course)
    {
        $this->model = $course;
    }

    /**
     *list all courses
     */
    function getAll() : Collection
    {
        return $this->model->get();
    }

    /**
     *find course
     */
    function find(int $cursoId) : ?Course
    {
        return $this->model->findOrFail($cursoId);
    }

    /**
     *create a new course
     */
    function postCreate(array $c_curso) : ?Course
    {
        return $this->model->create($c_curso);
    }
}
