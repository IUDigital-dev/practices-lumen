<?php

namespace App\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CourseValidator
{
    /**
     * @var Request
     */
    private $reques;

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
            "codigoCurso" => "required",
            "nombreCurso" => "required",
            "nombreCurso2" => "required",
            "plantillaId" => "required",
            "horas" => "required",
            "texto1" => "required",
            "texto2" => "required",
            "texto3" => "required",
            "url_encuesta" => "required"
        ];
    }

    private function messages()
    {
        return [];
    }
}
