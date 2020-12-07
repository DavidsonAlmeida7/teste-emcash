<?php

use Illuminate\Http\Request;

/**
 * API Routes
 * 
 * Este arquivo já vem com o padrão prefix "api" nesse arquivo.
 * Sem necessidade de acrescentar no codigo, acrescentar somente na url.
*/

Route::middleware('api')->prefix('poligonos')->group(function () {

    Route::group(['namespace' => 'Api'], function () {

        Route::get('', 'PoligonoController@index');
        Route::post('retangulo', 'PoligonoController@storeRetangulo');
        Route::post('triangulo', 'PoligonoController@storeTriangulo');
        Route::get('total-area-poligonos', 'PoligonoController@totalAreaPoligonos');
        Route::get('show/{poligono}', 'PoligonoController@show');
        Route::put('update/{poligono}', 'PoligonoController@update');
        Route::delete('destroy/{poligono}', 'PoligonoController@destroy');

    });

});