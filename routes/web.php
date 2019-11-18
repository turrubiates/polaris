<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController', ['except' => ['destroy']]);

    // Teams
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // Provincia
    Route::delete('provincia/destroy', 'ProvinciasController@massDestroy')->name('provincia.massDestroy');
    Route::resource('provincia', 'ProvinciasController');

    // Grupos
    Route::delete('grupos/destroy', 'GruposController@massDestroy')->name('grupos.massDestroy');
    Route::resource('grupos', 'GruposController');

    // Regnals
    Route::delete('regnals/destroy', 'RegnalController@massDestroy')->name('regnals.massDestroy');
    Route::post('regnals/parse-csv-import', 'RegnalController@parseCsvImport')->name('regnals.parseCsvImport');
    Route::post('regnals/process-csv-import', 'RegnalController@processCsvImport')->name('regnals.processCsvImport');
    Route::resource('regnals', 'RegnalController');

    // Lista De Eventos
    Route::delete('lista-de-eventos/destroy', 'ListaDeEventosController@massDestroy')->name('lista-de-eventos.massDestroy');
    Route::resource('lista-de-eventos', 'ListaDeEventosController');

    // Registro Eventos
    Route::delete('registro-eventos/destroy', 'RegistroEventosController@massDestroy')->name('registro-eventos.massDestroy');
    Route::post('registro-eventos/media', 'RegistroEventosController@storeMedia')->name('registro-eventos.storeMedia');
    Route::resource('registro-eventos', 'RegistroEventosController');

    // Ficha Medicas
    Route::post('ficha-medicas/parse-csv-import', 'FichaMedicaController@parseCsvImport')->name('ficha-medicas.parseCsvImport');
    Route::post('ficha-medicas/process-csv-import', 'FichaMedicaController@processCsvImport')->name('ficha-medicas.processCsvImport');
    Route::resource('ficha-medicas', 'FichaMedicaController', ['except' => ['destroy']]);

    // Control De Cheques
    Route::delete('control-de-cheques/destroy', 'ControlDeChequesController@massDestroy')->name('control-de-cheques.massDestroy');
    Route::post('control-de-cheques/media', 'ControlDeChequesController@storeMedia')->name('control-de-cheques.storeMedia');
    Route::resource('control-de-cheques', 'ControlDeChequesController');

    // Movimientos Bancarios
    Route::delete('movimientos-bancarios/destroy', 'MovimientosBancariosController@massDestroy')->name('movimientos-bancarios.massDestroy');
    Route::post('movimientos-bancarios/parse-csv-import', 'MovimientosBancariosController@parseCsvImport')->name('movimientos-bancarios.parseCsvImport');
    Route::post('movimientos-bancarios/process-csv-import', 'MovimientosBancariosController@processCsvImport')->name('movimientos-bancarios.processCsvImport');
    Route::resource('movimientos-bancarios', 'MovimientosBancariosController');

    // Control De Gastos
    Route::delete('control-de-gastos/destroy', 'ControlDeGastosController@massDestroy')->name('control-de-gastos.massDestroy');
    Route::post('control-de-gastos/media', 'ControlDeGastosController@storeMedia')->name('control-de-gastos.storeMedia');
    Route::resource('control-de-gastos', 'ControlDeGastosController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Presupuesto Anuals
    Route::delete('presupuesto-anuals/destroy', 'PresupuestoAnualController@massDestroy')->name('presupuesto-anuals.massDestroy');
    Route::resource('presupuesto-anuals', 'PresupuestoAnualController');

    // Actas Ceps
    Route::delete('actas-ceps/destroy', 'ActasCepController@massDestroy')->name('actas-ceps.massDestroy');
    Route::post('actas-ceps/media', 'ActasCepController@storeMedia')->name('actas-ceps.storeMedia');
    Route::resource('actas-ceps', 'ActasCepController');

    // Acuerdos Ceps
    Route::delete('acuerdos-ceps/destroy', 'AcuerdosCepController@massDestroy')->name('acuerdos-ceps.massDestroy');
    Route::resource('acuerdos-ceps', 'AcuerdosCepController');

    // Etiquetas Acuerdos De Provincia
    Route::delete('etiquetas-acuerdos-de-provincia/destroy', 'EtiquetasAcuerdosDeProvinciaController@massDestroy')->name('etiquetas-acuerdos-de-provincia.massDestroy');
    Route::resource('etiquetas-acuerdos-de-provincia', 'EtiquetasAcuerdosDeProvinciaController');

    // Actas De Cops
    Route::delete('actas-de-cops/destroy', 'ActasDeCopController@massDestroy')->name('actas-de-cops.massDestroy');
    Route::post('actas-de-cops/media', 'ActasDeCopController@storeMedia')->name('actas-de-cops.storeMedia');
    Route::resource('actas-de-cops', 'ActasDeCopController');

    // Acuerdos Cops
    Route::delete('acuerdos-cops/destroy', 'AcuerdosCopController@massDestroy')->name('acuerdos-cops.massDestroy');
    Route::resource('acuerdos-cops', 'AcuerdosCopController');

    // Actas Cogs
    Route::delete('actas-cogs/destroy', 'ActasCogController@massDestroy')->name('actas-cogs.massDestroy');
    Route::post('actas-cogs/media', 'ActasCogController@storeMedia')->name('actas-cogs.storeMedia');
    Route::resource('actas-cogs', 'ActasCogController');

    // Acuerdos Cogs
    Route::delete('acuerdos-cogs/destroy', 'AcuerdosCogController@massDestroy')->name('acuerdos-cogs.massDestroy');
    Route::resource('acuerdos-cogs', 'AcuerdosCogController');

    // Solicitud De Cambio De Grupos
    Route::delete('solicitud-de-cambio-de-grupos/destroy', 'SolicitudDeCambioDeGrupoController@massDestroy')->name('solicitud-de-cambio-de-grupos.massDestroy');
    Route::resource('solicitud-de-cambio-de-grupos', 'SolicitudDeCambioDeGrupoController');

    // Guia De Acms
    Route::delete('guia-de-acms/destroy', 'GuiaDeAcmController@massDestroy')->name('guia-de-acms.massDestroy');
    Route::resource('guia-de-acms', 'GuiaDeAcmController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});
