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
    function create(array $c_plantilla): ?Template
    {
        $fileName = \App\Helpers\Helpers::getFileName($this->request->file('imgCertificado')->getClientOriginalName());
        $folder = './imgCertificate/';
        $this->request->file('imgCertificado')->move($folder, $fileName);
        $c_plantilla['imgCertificado'] = $fileName;
        return $this->model->create($c_plantilla);
    }

    /**
     * Update template
     */
    function update(int $plantillaId, ?string $fileName = null)
    {

        $template = $this->model->find($plantillaId);

        if ($this->request->has("imgCertificado") == null) {
            $template->nombrePlantilla = $this->request->nombrePlantilla;
            return $template->save();
        }
        unlink(base_path('public/imgCertificate/') . $template->imgCertificado);

        $folder = './imgCertificate/';
        $this->request->file('imgCertificado')->move($folder, $fileName);
        $template->nombrePlantilla = $this->request->nombrePlantilla;
        $template->imgCertificado = $fileName;
        return  $template->save();
    }

    /**
     * Delete template
     */
    function delete(int $plantillaId)
    {
        $template = $this->model->where('plantillaId', $plantillaId)->first();
        $urlImg = base_path('public/imgCertificate/') . $template->imgCertificado;
        unlink($urlImg);
        $template->delete();
    }

    /**
     * Restore template
     */
    function restore(int $plantillaId)
    {
    }
}
