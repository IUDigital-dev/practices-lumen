<?php

use App\Models\Courses;
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
$router->get('/courses', 'CoursesController@index');
$router->get('/courses/{cursoId}', 'CoursesController@search');
$router->put('/courses/{cursoId}','CoursesController@updateCourses');
$router->delete('/courses/{cursoId}','CoursesController@destroydelete');






