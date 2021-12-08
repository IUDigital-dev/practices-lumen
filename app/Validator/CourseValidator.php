<?php

namespace App\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;




class CourseValidator
{




    private $request;

    public function __construct(Request $request)

    {
        $this->request = $request; 
    }


    public function validate()
    {
return Validator::make($this->request->all(),$this->rules(), $this->messages());
    }

    private function rules(){
        return [
            'codigoCurso' => 'required|unique:c_curso,codigoCurso',
            'nombreCurso' => 'required',
            'nombreCurso2' => 'required',
            'plantillaId' => 'required|exists:c_plantilla,plantillaId',
            'horas' => 'required',
            'texto1' => 'required',
            'texto2' => 'required',
            'texto3' => 'required',
            'url_encuesta'=> 'required' 
        ];

    }
    private function messages(){

        return[];
    }
}



?>