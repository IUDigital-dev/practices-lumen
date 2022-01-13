<?php

namespace App\Http\Controllers;

use App\Services\Implementation\TemplateServiceImpl;
use App\Validator\TemplateValidator;
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
}
