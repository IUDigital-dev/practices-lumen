<?php

namespace App\Http\Controllers;

use App\Services\Implementation\TemplateServiceImpl;
use App\Validator\TemplateValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TemplateController extends Controller
{
    /**
     *
     * @var Request
     */
    private $request;

    /**
     *
     * @var TemplateServicesImpl
     */
    private $templateService;

    /**
     *
     * @var TemplateValidator
     */
    private $templateValidator;

    public function __construct(Request $request, TemplateServiceImpl $templateService, TemplateValidator $templateValidator)
    {
        $this->request = $request;
        $this->templateService = $templateService;
        $this->templateValidator = $templateValidator;
    }

    function create()
    {
        $validator = $this->templateValidator->validate();

        if ($validator->fails()) {
            return response([
                "status" => 422,
                "message" => "Error",
                "error" => $validator->errors(),
            ], 422);
        }

        if ($this->request->has("imgCertificado") == true) {
            $nameImg = $this->request->file('imgCertificado')->getClientOriginalName();
            if (strlen($nameImg) > 22) {
                return response([
                    "status" => 422,
                    "message" => "The file image name must be no longer than 22 characters.",
                ], 422);
            }
        }

        try {

            $this->templateService->create($this->request->all());

            return response([
                "status" =>  201,
                "message" => "Template Created"
            ], 201);
        } catch (\Exception $exception) {
            return response([
                "status" => 500,
                "message" => $exception->getMessage()
            ], 500);
        }
    }


    function all()
    {
        return response([
            "status" => 200,
            "message" => "All courses",
            "data" => $this->templateService->getAll()
        ], 200);
    }

    function find($plantillaId)
    {
        if ($this->templateService->find($plantillaId) == null) {
            return response([
                "status" => 404,
                "message" => "ID doesn't exist"
            ], 200);
        }
        try {
            return response([
                "status" => 200,
                "message" => "Template with ID {$plantillaId}",
                "data" => $this->templateService->find($plantillaId)
            ], 200);
        } catch (\Exception $exception) {
            return response([
                "status" => 500,
                "message" => $exception->getMessage()
            ], 500);
        }
    }

    function update($plantillaId)
    {

        $validator = Validator::make($this->request->all(), [
            "imgCertificado" => "image:jpg, jpeg, png, bmp, gif, svg, or webp",
        ]);

        if ($this->request->input("nombrePlantilla") == false &&  $this->request->has("imgCertificado") == false) {
            return response([
                "status" => 422,
                "message" => "No data entered",
            ], 422);
        } else {
            if ($validator->fails()) {
                return response([
                    "status" => 422,
                    "message" => "Error",
                    "error" => $validator->errors(),
                ], 422);
            }

            $exist = $this->templateService->find($plantillaId);
            if ($exist == null) {
                return response([
                    "status" => 404,
                    "message" => "Template with ID {$plantillaId} doesn't exist",
                ], 404);
            }

            if ($this->request->has("imgCertificado") == true) {
                $nameImg = $this->request->file('imgCertificado')->getClientOriginalName();
                if (strlen($nameImg) > 22) {
                    return response([
                        "status" => 422,
                        "message" => "The file image name must be no longer than 22 characters.",
                    ], 422);
                }
            }
            $this->templateService->update($this->request->all(), $plantillaId);
            try {
                return response([
                    "status" => 202,
                    "message" => "Template with ID {$plantillaId} update",
                ], 202);
            } catch (\Exception $exception) {
                return response([
                    "status" => 500,
                    "message" => $exception->getMessage()
                ], 500);
            }
        }
    }
}
