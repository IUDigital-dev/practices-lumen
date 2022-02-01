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

        $template = $this->model->where('plantillaId', $plantillaId)->first();

        if ($this->request->has("imgCertificado") == null) {
            $template->nombrePlantilla = $this->request->nombrePlantilla;
            $template->save();
        } else if ($c_plantilla['nombrePlantilla'] == null) {
            $urlImg = base_path('public/imgCertificate/') . $template->imgCertificado;
            if (file_exists($urlImg)) {
                unlink($urlImg);
            }
            $nameImg = $plantillaId . "_" . $this->request->file('imgCertificado')->getClientOriginalName();
            $folder = './imgCertificate/';
            $this->request->file('imgCertificado')->move($folder, $nameImg);

            $c_plantilla['imgCertificado'] = $nameImg;
            $template->imgCertificado = $nameImg;
            $template->save();
        } else {

            $template = $this->model->where('plantillaId', $plantillaId)->first();
            $urlImg = base_path('public/imgCertificate/') . $template->imgCertificado;
            if (file_exists($urlImg)) {
                unlink($urlImg);
            }
            $nameImg = $plantillaId . "_" . $this->request->file('imgCertificado')->getClientOriginalName();
            $folder = './imgCertificate/';
            $this->request->file('imgCertificado')->move($folder, $nameImg);
            $c_plantilla['imgCertificado'] = $nameImg;
            return $this->model->where('plantillaId', $plantillaId)
                ->first()
                ->fill($c_plantilla)
                ->save();
        }
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
