<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prueba;

class PruebaController extends Controller{
    public function prueba()
    {
        foreach (\App\Models\Prueba::all() as $Prueba) { 
            echo "$Prueba->nombreCurso <br />";
            
            // dd(\App\Models\Prueba::all());
        }
    }

}