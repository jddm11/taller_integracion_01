<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Http\Request;

Route::get('/', function (Request $request) {

    return view('welcome');

});

Route::post('/validarFirma', function (Request $request) {

    $hash  = $request->input('hash');

    $value = $request->input('value');

    $result = hash('sha256', $value);

    if(strtoupper($result) == strtoupper($hash))
    {
        return \Illuminate\Http\Response::create(array('mensaje'=>$value, 'valido' =>true),200);
    }else
    {
        return \Illuminate\Http\Response::create(array('mensaje'=>$value, 'valido' =>false),400);
    }

});

Route::get('/status', function (Request $request) {

    return \Illuminate\Http\Response::create('',201);
});


Route::get('/texto', function (Request $request) {

    $result = file_get_contents('https://s3.amazonaws.com/files.principal/texto.txt');

    $hash = hash('sha256', $result);

    return \Illuminate\Http\Response::create(array('text' => $result,'hash' => strtoupper($hash)),200);
});




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
