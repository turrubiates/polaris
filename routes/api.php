<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Provincia
    Route::apiResource('provincia', 'ProvinciasApiController');

    // Grupos
    Route::apiResource('grupos', 'GruposApiController');

    // Regnals
    Route::apiResource('regnals', 'RegnalApiController');

    // Presupuesto Anuals
    Route::apiResource('presupuesto-anuals', 'PresupuestoAnualApiController');
});
