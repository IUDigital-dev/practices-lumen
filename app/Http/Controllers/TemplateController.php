<?php

namespace App\Http\Controllers;

use App\Services\Implementation\TemplateServiceImpl;
use App\Validator\TemplateValidator;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
}
