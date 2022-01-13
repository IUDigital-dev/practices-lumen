<?php

namespace App\Services\Interfaces;

interface TemplateServiceInterface
{
    /**
     *
     * @return void
     */
    function getAll();

    /**
     *
     * @param integer $plantillaId
     * @return void
     */
    function find(int $plantillaId);

    /**
     *
     * @param array $c_plantilla
     * @return void
     */
    function create(array $c_plantilla);

    /**
     *
     * @param array $e_plantilla
     * @param integer $plantillaId
     * @return void
     */
    function update(array $e_plantilla, int $plantillaId);

    /**
     *
     * @param integer $plantillaId
     * @return boolean
     */
    function delete(int $plantillaId);

    /**
     *
     * @param integer $plantillaId
     * @return boolean
     */
    function restore(int $plantillaId);
}
