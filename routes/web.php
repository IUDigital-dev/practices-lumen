<?php

use App\Models\Course;
use Illuminate\Support\Facades\DB;

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

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->post('/access', 'AuthController@login');

    //$router->get('/group', 'GroupController@index');
});

$router->group(['prefix' => 'course'], function () use ($router) {

    $router->get('/all', 'CourseController@all');
    $router->get('/find/{cursoId}', 'CourseController@find');
    $router->post('/create', 'CourseController@create');
});
