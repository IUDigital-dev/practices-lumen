<?php

use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Router;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix' => 'api/v1'], function () use ($router){
    $router->post('/access', 'AuthController@login');

    //$router->get('/group', 'GroupController@index');
});


// $router->post('/categories', 'CategoriesController@createCategories');
$router->group(['prefix' => 'courses'], function () use ($router){
    $router->put('/{cursoId}/update','CourseController@update');
    $router->delete('/{cursoId}/delete','CourseController@delete');
});





