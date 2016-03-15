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

Route::post('/validarFirma', function (Request $request) {

    $hash  = $request->input('hash');

    $value = $request->input('value');

    $result = hash('sha256', $value);

    if($result == $hash )
    {
        return \Illuminate\Http\Response::create('true',200);
    }else
    {
        return \Illuminate\Http\Response::create('false',200);
    }


     //$_POST['ppasscode']);
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
