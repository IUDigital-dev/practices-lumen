<?php

namespace App\Services\Interfaces;

interface CourseServiceInterface
{
    /**
     * @return array Course
     */
    function getAll();

    /**
     * @param int $cursoId
     * @return Course
     */
    function find(int $cursoId);

    /**
     * @param array $user
     * @return void
     */
    function postCreate(array $c_curso);
}
