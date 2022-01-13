<?php

use App\Models\Course;
use App\Models\User;

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

$router->group(['prefix' => 'api/v1/'], function () use ($router) {
    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');
    $router->post('refresh', 'AuthController@refresh');
    $router->post('me', 'AuthController@me');
    $router->group([
        'middleware' => 'auth',
    ], function () use ($router) {
        $router->get('users', function () {
            return User::all()->toJson();
        });
    });
});

$router->group(['prefix' => 'course'], function () use ($router) {
    $router->get('/', 'CourseController@all');
    $router->get('/find/{cursoId}', 'CourseController@find');
    $router->post('/create', 'CourseController@create');
});

$router->group(['prefix' => 'template'], function () use ($router) {
    $router->post('/create', 'TemplateController@create');
    $router->get('/', 'TemplateController@all');
});
