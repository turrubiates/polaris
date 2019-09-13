<?php

Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

    Route::apiResource('teams', 'TeamApiController');

    Route::apiResource('lista-de-eventos', 'ListaDeEventosApiController');

    Route::apiResource('provincia', 'ProvinciasApiController');

    Route::apiResource('grupos', 'GruposApiController');

    Route::apiResource('control-de-cheques', 'ControlDeChequesApiController');

    Route::apiResource('control-de-gastos', 'ControlDeGastosApiController');

    Route::apiResource('movimientos-bancarios', 'MovimientosBancariosApiController');

    Route::apiResource('avisos-de-salidas', 'AvisosDeSalidaApiController');

    Route::apiResource('registro-eventos', 'RegistroEventosApiController');
});
