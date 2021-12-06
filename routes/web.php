<?php

use App\Models\ListCourses;
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

$router->get('/course', function () use ($router) {
    return $router->app->version();
});


$router->get('/list', 'CoursesController@all');
$router->get('/list/{cursoId}', 'CoursesController@find');
$router->post('/create', 'CoursesController@createCourse');


// $app->group(['prefix' => 'admin'], function () use ($app) {
//     $app->get('users', function () {
//         // Matches The "/admin/users" URL
//     });
//     $app->get('users', function () {
//         // Matches The "/admin/users" URL
//     });
// });
