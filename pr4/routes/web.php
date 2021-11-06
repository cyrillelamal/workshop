<?php

use App\Http\Requests\SphereRequest;
use App\Models\Sphere;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return [
        'foo' => 'Hello, world!'
    ];
});

Route::get('/foo', function() {
    return [
        'bar' => 'I am the second endpoint!',
    ];
});

Route::post('/sphere', function(SphereRequest $request) {
    return new Sphere($request->validated());
});
