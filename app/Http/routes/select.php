<?php

/*
 |--------------------------------------------------------------------------
 | Select Routes
 |--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'list', 'namespace' => 'SelectList'], function ()
{
	
	/*=====================================================================
	 | Empresas
	  ====================================================================*/
	
		// Lista todas las Empresas
		Route::get('/empresas',  ['uses' => 'Empresas@index']);
		
		// A partir de un empresa selecciona sus centros asociados
		// Route::post('/empresas', ['uses' => 'Empresas@centros']);
                Route::resource('/empresas/idEmpresa', 'Empresas@centros');
                
	
	
	/*=====================================================================
	 | Usuarios
	  ====================================================================*/

		// Lista todos los usuarios
		Route::get('/usuarios',  ['uses' => 'Usuarios@index']);


	/*=====================================================================
	 | Programas
	 ====================================================================*/
		
		// Lista todos los programas
		Route::get('/programas',  ['uses' => 'Programas@index']);
});

