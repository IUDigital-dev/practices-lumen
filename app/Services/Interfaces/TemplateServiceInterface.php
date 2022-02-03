<?php

namespace App\Services\Interfaces;

use App\Models\Template;
use phpDocumentor\Reflection\Types\Boolean;

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
    function find(int $plantillaId): ?Template;

    /**
     *
     * @param array $c_plantilla
     * @return void
     */
    function create(array $c_plantilla): ?Template;

    /**
     *
     * @param array $e_plantilla
     * @param integer $plantillaId
     * @return void
     */
    function update(int $plantillaIdm, ?string $fileName);

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
