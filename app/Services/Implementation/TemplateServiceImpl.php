<?php

namespace App\Services\Implementation;

use App\Models\Template;
use App\Services\Interfaces\TemplateServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TemplateServiceImpl implements TemplateServiceInterface
{
    /**
     *
     * @var Template
     */
    private $model;

    function __construct(Template $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }

    /**
     * List all template
     */
    function getAll(): Collection
    {
        return $this->model->get();
    }

    /**
     * Find template
     */
    function find(int $plantillaId): ?Template
    {
        return $this->model->find($plantillaId);
    }


    /**
     * create a new template
     */
    function create(array $c_plantilla)
    {
        $newId =  $this->model->create($c_plantilla);
        $plantillaId = $newId['plantillaId'];

        $nameImg = $plantillaId . "_" . $this->request->file('imgCertificado')->getClientOriginalName();
        $folder = './imgCertificate/';
        $this->request->file('imgCertificado')->move($folder, $nameImg);
        $c_plantilla['imgCertificado'] = $nameImg;
        return $this->model->where('plantillaId', $plantillaId)
            ->first()
            ->fill($c_plantilla)
            ->save();
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
