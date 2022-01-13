<?php

namespace App\Services\Implementation;

use App\Models\Template;
use App\Services\Interfaces\TemplateServiceInterface;
use Illuminate\Support\Collection;

class TemplateServiceImpl implements TemplateServiceInterface
{
    /**
     *
     * @var Template
     */
    private $model;

    function __construct(Template $model)
    {
        $this->model = $model;
    }

    /**
     * List all template
     */
    function getAll()
    {
    }

    /**
     * Find template
     */
    function find(int $plantillaId)
    {
    }

    /**
     * create a new template
     */
    function create(array $c_plantilla)
    {
    }

    /**
     * Update template
     */
    function update(array $c_plantilla, int $plantillaId)
    {
    }

    /**
     * Delete template
     */
    function delete(int $plantillaId)
    {
    }

    /**
     * Restore template
     */
    function restore(int $plantillaId)
    {
    }
}
