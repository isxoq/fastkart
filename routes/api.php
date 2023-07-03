<?php

use \Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {

});


Route::post("send-zayavka", [\App\Http\Controllers\Api\TelegramController::class, "sendZayavka"]);
