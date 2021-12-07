<?php

namespace App\Services\Implementation;

use App\Models\Courses;
use App\Services\Interfaces\CourseServiceInterface;

class CourseServiceImpl implements CourseServiceInterface
{
    private $model;

    function __construct()
    {
        $this->model = new Courses();
    }

    /**
     *list all courses
     */
    function getAll()
    {
        return $this->model->get();
    }

    /**
     *find course
     */
    function find(int $cursoId)
    {
        return $this->model->findOrFail($cursoId);
    }

    /**
     *create a new course
     */
    function postCreate(array $c_curso)
    {
        $this->model->create($c_curso);
    }
}
