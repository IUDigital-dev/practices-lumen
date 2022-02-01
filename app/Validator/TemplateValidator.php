<?php

namespace App\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TemplateValidator
{
    /**
     *
     * @var Request
     */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function validate()
    {
        return Validator::make($this->request->all(), $this->rules(), $this->messages());
    }

    private function rules()
    {
        return [
            "nombrePlantilla" => "required",
            "imgCertificado" => "required|image:jpg, jpeg, png, bmp, gif, svg, webp",
        ];
    }

    private function messages()
    {
        return [];
    }
}
