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

    function getAll()
    {
    }
    function getFind(int $cursoId)
    {
    }
    function postCreate()
    {
    }
}
