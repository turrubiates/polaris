<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');

    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');

    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');

    Route::resource('teams', 'TeamController');

    Route::delete('lista-de-eventos/destroy', 'ListaDeEventosController@massDestroy')->name('lista-de-eventos.massDestroy');

    Route::resource('lista-de-eventos', 'ListaDeEventosController');

    Route::delete('provincia/destroy', 'ProvinciasController@massDestroy')->name('provincia.massDestroy');

    Route::resource('provincia', 'ProvinciasController');

    Route::delete('grupos/destroy', 'GruposController@massDestroy')->name('grupos.massDestroy');

    Route::resource('grupos', 'GruposController');

    Route::delete('control-de-cheques/destroy', 'ControlDeChequesController@massDestroy')->name('control-de-cheques.massDestroy');

    Route::resource('control-de-cheques', 'ControlDeChequesController');

    Route::post('control-de-cheques/media', 'ControlDeChequesController@storeMedia')->name('control-de-cheques.storeMedia');

    Route::post('control-de-cheques/parse-csv-import', 'ControlDeChequesController@parseCsvImport')->name('control-de-cheques.parseCsvImport');

    Route::post('control-de-cheques/process-csv-import', 'ControlDeChequesController@processCsvImport')->name('control-de-cheques.processCsvImport');

    Route::delete('control-de-gastos/destroy', 'ControlDeGastosController@massDestroy')->name('control-de-gastos.massDestroy');

    Route::resource('control-de-gastos', 'ControlDeGastosController');

    Route::post('control-de-gastos/media', 'ControlDeGastosController@storeMedia')->name('control-de-gastos.storeMedia');

    Route::post('control-de-gastos/parse-csv-import', 'ControlDeGastosController@parseCsvImport')->name('control-de-gastos.parseCsvImport');

    Route::post('control-de-gastos/process-csv-import', 'ControlDeGastosController@processCsvImport')->name('control-de-gastos.processCsvImport');

    Route::delete('movimientos-bancarios/destroy', 'MovimientosBancariosController@massDestroy')->name('movimientos-bancarios.massDestroy');

    Route::resource('movimientos-bancarios', 'MovimientosBancariosController');

    Route::post('movimientos-bancarios/parse-csv-import', 'MovimientosBancariosController@parseCsvImport')->name('movimientos-bancarios.parseCsvImport');

    Route::post('movimientos-bancarios/process-csv-import', 'MovimientosBancariosController@processCsvImport')->name('movimientos-bancarios.processCsvImport');

    Route::delete('avisos-de-salidas/destroy', 'AvisosDeSalidaController@massDestroy')->name('avisos-de-salidas.massDestroy');

    Route::resource('avisos-de-salidas', 'AvisosDeSalidaController');

    Route::delete('registro-eventos/destroy', 'RegistroEventosController@massDestroy')->name('registro-eventos.massDestroy');

    Route::resource('registro-eventos', 'RegistroEventosController');

    Route::post('registro-eventos/media', 'RegistroEventosController@storeMedia')->name('registro-eventos.storeMedia');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});
